<?php
/**
 * 全角ひらがなバリデータクラス
 *
 * @package    cosmedecorte
 * @subpackage validator
 * @author     BROADTECH INC.
 * @version    $Id$
 */
class brValidatorJapaneseString extends sfValidatorString {
    protected function configure($options = array(), $messages = array()) {
        parent::configure($options, $messages);
        $this->addOption('fullwidth_hiragana');
        $this->addOption('z2h_space');
        $this->addOption('merge_space');
        $this->addMessage('fullwidth_hiragana',
                          '"%value%" is not full width hiragana.');
    }

    protected function doClean($value) {
        $value = parent::doClean($value);
        $clean = (string)$value;

        if ($this->hasOption('fullwidth_hiragana')) {
            $euc_clean = mb_convert_encoding($clean, 'EUC-JP',
                                             $this->getCharset());

            if (!preg_match("/^(\xA4[\xA1-\xF3]|\xA5[\xA1-\xF6]|\xA1\xBC|\xA1\xA6|\xA1\xA1|\x20|\x8E[\xA6-\xDF])+$/", $euc_clean)) {
                throw new sfValidatorError($this, 'fullwidth_hiragana',
                                           array('value' => $value));
            }
        }

        if ($this->getOption('trim') == true) {
            $utf8_clean =
                mb_convert_encoding($clean, 'UTF-8', $this->getCharset());
            $utf8_clean =
                preg_replace('/^[\s　]*(.*?)[\s　]*$/u', '\1', $utf8_clean);
            $clean =
                mb_convert_encoding($utf8_clean, $this->getCharset(), 'UTF-8');
        }

        if ($this->getOption('z2h_space') == true) {
            $utf8_clean =
                mb_convert_encoding($clean, 'UTF-8', $this->getCharset());
            $utf8_clean = preg_replace('/[　]/u', ' ', $utf8_clean);
            $clean =
                mb_convert_encoding($utf8_clean, $this->getCharset(), 'UTF-8');
        }

        if ($this->getOption('merge_space') == true) {
            $clean = preg_replace('/\s+/', ' ', $clean);
        }

        return $clean;
    }
}
