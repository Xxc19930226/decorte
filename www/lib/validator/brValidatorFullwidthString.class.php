<?php

class brValidatorFullwidthString extends sfValidatorString {
    protected function configure($options = array(), $messages = array()) {
        parent::configure($options, $messages);

        $this->addOption('fullwidth');

        $this->addMessage('fullwidth',
                          '"%value%" is not full width.');
    }

    protected function doClean($value) {
        parent::doClean($value);

        $clean = (string)$value;

        if ($this->hasOption('fullwidth')) {
            $euc_clean = mb_convert_encoding($clean, 'EUC-JP',
                                             $this->getCharset());
            if (!preg_match("/^([\xA1-\xFE])+$/",
                      $euc_clean)) {
                throw new sfValidatorError($this, 'fullwidth',
                                           array('value' => $value));
            }
        }

        return $clean;
    }
}
