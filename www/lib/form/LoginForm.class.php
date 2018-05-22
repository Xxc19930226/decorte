<?php

class LoginForm extends BaseForm
{
    public function configure()
    {
        // メールアドレス
        $this->setWidget('mail', new sfWidgetFormInputText());
        $this->setValidator(
            'mail', new sfValidatorString(
                array('trim' => true, 'required' => false)));

        // パスワード
        $this->setWidget('password', new sfWidgetFormInputPassword());
        $this->getWidget('password')->setOption('always_render_empty', false);
        $this->setValidator(
            'password', new sfValidatorString(
                array('trim' => true, 'required' => false)));

        $this->widgetSchema->setNameFormat($this->getName() . '[%s]');
    }

    public function getName()
    {
        return 'login';
    }
}
