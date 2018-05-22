<?php

class ReminderPwForm extends BaseForm
{
    public function configure()
    {
        $this->setWidget('password', new sfWidgetFormInputPassword());
        $this->getWidget('password')->
            setLabel('新しいパスワード')->
            setOption('always_render_empty', false);
        $this->setValidators(
           array('password' => new sfValidatorAnd(
                  array(new sfValidatorString(
                        array('min_length' => 6),
                        array('min_length' =>
                              '新しいパスワードは%min_length%文字以上' .
                              'で入力してください。')),
                            new sfValidatorRegex(
                                array('pattern' => '/^[0-9a-zA-Z]+$/'),
                                array('invalid' =>
                                      '新しいパスワードは半角英数字' .
                                      'で入力してください。'))),
                      array('required' => true, 'trim' => true),
                      array('required' => '新しいパスワードを入力してください。'))));

        $this->setWidget('password2', new sfWidgetFormInputPassword());
        $this->getWidget('password2')->
            setLabel('新しいパスワード（確認）')->
            setOption('always_render_empty', false);
        $this->setValidator('password2', new sfValidatorString(
                                array('trim' => true),
                                array('required' =>
                                      '新しいパスワード（確認）を入力してください。')));

        $this->validatorSchema->setPostValidator( 
            new brValidatorSchemaCompare(
                'password', sfValidatorSchemaCompare::IDENTICAL, 'password2',
                 array(),
                 array('invalid' =>
                       '新しいパスワードと新しいパスワード(確認)が異なります。')));

        $this->widgetSchema->setNameFormat($this->getName() . '[%s]');
    }

    public function getName()
    {
        return 'reminderPw';
    }
}
