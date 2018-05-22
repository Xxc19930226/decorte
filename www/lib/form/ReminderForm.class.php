<?php

class ReminderForm extends BaseForm
{
    public function configure()
    {
        $this->setWidget('mail', new sfWidgetFormInputText());
        $this->setValidator(
            'mail', new sfValidatorEmail(
                array('trim' => true),
                array('required' => '必須入力項目です。',
                      'invalid' => '形式に誤りがあります。')));


        $this->validatorSchema->setPostValidator( 
            new brValidatorReminderMail(
                      array('model' => 'Member',
                            'column' => array('mail_pc','mail_mobile')),
                      array('invalid' =>
                            'このメールアドレスは登録されていません。')));

        $this->widgetSchema->setNameFormat($this->getName() . '[%s]');
    }

    public function getName()
    {
        return 'reminder';
    }
}
