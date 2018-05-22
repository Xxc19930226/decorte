<?php

class ReplyForm extends BaseForm
{
    public function configure()
    {
        // 返信メール本文(上部)
        $this->setWidget('mailtext', new sfWidgetFormTextarea());
        $this->setValidator(
            'mailtext', new sfValidatorString(
                array('trim' => true, 'max_length' => 500),
                array('required'   => '必須入力です。',
                      'max_length' =>
                      '%max_length%文字以内で入力してください。')));

        // 返信メール本文(下部)
        $this->setWidget('mailtext2', new sfWidgetFormTextarea());
        $this->setValidator(
            'mailtext2', new sfValidatorString(
                array('required' => false, 'trim' => true,
                      'max_length' => 1000),
                array('max_length' =>
                      '%max_length%文字以内で入力してください。')));

        $this->widgetSchema->setNameFormat($this->getName() . '[%s]');
    }

    public function getName()
    {
        return 'reply';
    }
}
