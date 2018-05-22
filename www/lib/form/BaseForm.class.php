<?php

/**
 * Base project form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: BaseForm.class.php 1364 2016-01-20 10:34:38Z oda $
 */
class BaseForm extends sfFormSymfony
{
    public function setup()
    {
        $this->resetToDefaultMessages();
    }

    protected function resetToDefaultMessage(sfValidatorBase $validator = null)
    {
        if (!$validator) {
            return;
        }

        $validator->setMessage('required', '必須入力項目です。');
        if ($validator instanceof sfValidatorDoctrineUnique) {
            $validator->setMessage('invalid', '既に登録されています。');
        } else {
            $validator->setMessage('invalid', '不正な値です。');
        }
        if ($validator->getOption('min_length')) {
            $validator->setMessage(
                'min_length', '%min_length%文字以上で入力してください。');
        }
        if ($validator->getOption('max_length')) {
            $validator->setMessage(
                'max_length', '%max_length%文字以内で入力してください。');
        }
    }

    public function resetToDefaultMessages()
    {
        foreach ($this->validatorSchema->getFields() as $validator) {
            $this->resetToDefaultMessage($validator);
        }

        $this->resetToDefaultMessage(
            $this->validatorSchema->getPostValidator());
    }

    public function formatRadio($widget, $inputs)
    {
        foreach ((array)$inputs as $input) {
            $radio_list[] = $input['input'].
                            $widget->getOption('label_separator').
                            $input['label'];
        }
        return implode($widget->getOption('label_separator'), $radio_list);
    }
}
