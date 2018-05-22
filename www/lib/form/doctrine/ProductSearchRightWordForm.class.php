<?php

/**
 * ProductSearchRightWord form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class ProductSearchRightWordForm extends BaseProductSearchRightWordForm
{
    public function configure()
    {
        // 正規の単語
        $this->setValidator('word', new brValidatorJapaneseString());
        $this->getValidator('word')->setOption('trim', true);

        // 誤った単語
        $this->setWidget('wrong_words_string', new sfWidgetFormTextArea());
        $this->setValidator(
            'wrong_words_string', new brValidatorJapaneseString());
        $this->getValidator(
            'wrong_words_string')->setOption('trim', true);
        $this->getValidator(
            'wrong_words_string')->setOption('z2h_space', true);
        $this->getValidator(
            'wrong_words_string')->setOption('merge_space', true);
        $this->setDefault(
            'wrong_words_string', $this->getObject()->getWrongWordsString());

        $this->useFields(array('word', 'wrong_words_string'));

        $this->validatorSchema->setPostValidator(
            new sfValidatorCallback(
                array('callback' => array($this, 'validatorCallback'))));

        $this->resetToDefaultMessages();
    }

    public function validatorCallback(sfValidatorBase $validator, $values)
    {
        $wrong_words = explode(' ', $values['wrong_words_string']);
        $unique_validator = new sfValidatorDoctrineUnique(
            array('model' => 'ProductSearchWrongWord',
                  'primary_key' => 'right_word_id',
                  'column' => array('word')));

        foreach ($wrong_words as $wrong_word) {
            try {
                $v = array('right_word_id' => $this->getObject()->getId(),
                           'word' => $wrong_word);
                $unique_validator->clean($v);
            } catch (sfValidatorError $e) {
                $error = new sfValidatorError(
                    $validator,
                    '「' . $wrong_word . '」は既に登録されています。');
                throw new sfValidatorErrorSchema(
                    $validator, array('wrong_words_string' => $error));
            }
        }

        return $values;
    }

    public function updateWrongWordsStringColumn($value)
    {
        $wrong_words = explode(' ', $value);
        $new_wrong_words = array();
        foreach ($wrong_words as $wrong_word) {
            if (array_key_exists($wrong_word, $new_wrong_words)) {
                continue;
            }

            $new_wrong_words[$wrong_word] = true;
        }
        $wrong_words = array_keys($new_wrong_words);

        $this->getObject()->getWrongWords()->clear();
        foreach ($wrong_words as $wrong_word) {
            $wrong_word_obj = new ProductSearchWrongWord();
            $wrong_word_obj->setWord($wrong_word);
            $wrong_word_obj->setRightWord($this->getObject());
            $this->getObject()->getWrongWords()->add($wrong_word_obj);
        }
    }
}
