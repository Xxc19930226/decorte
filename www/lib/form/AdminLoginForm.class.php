<?php

class AdminLoginForm extends BaseForm
{
    protected $admin_user;

    public function configure()
    {
        // ユーザ名
        $this->setWidget('user_name', new sfWidgetFormInputText());
        $this->setValidator(
            'user_name', new sfValidatorString(
                array('trim' => true, 'required' => false)));

        // パスワード
        $this->setWidget('password', new sfWidgetFormInputPassword());
        $this->getWidget('password')->setOption('always_render_empty', false);
        $this->setValidator(
            'password', new sfValidatorString(
                array('trim' => true, 'required' => false)));

        $this->validatorSchema->setPostValidator(
            new sfValidatorCallback(
                array('callback' => array($this, 'checkUserAndPassword'))));

        $this->widgetSchema->setNameFormat($this->getName() . '[%s]');
    }

    public function getName()
    {
        return 'admin_login';
    }

    public function getUserName()
    {
        if (!$this->admin_user) {
            return array();
        }

        return $this->admin_user->getUserName();
    }

    public function getUserCredentials()
    {
        if (!$this->admin_user) {
            return array();
        }

        return explode(',', $this->admin_user->getCredentials());
    }

    public function getShop()
    {
        if (!$this->admin_user) {
            return array();
        }

        return $this->admin_user->getShop();
    }

    public function checkUserAndPassword(sfValidatorBase $validator, $values)
    {
        $admin_user =
            AdminUserTable::getInstance()->
            findOneByUserName($values['user_name']);

        if (!$admin_user) {
            throw new sfValidatorError($validator, 'invalid');
        }

        if (!$admin_user->checkPassword($values['password'])) {
            throw new sfValidatorError($validator, 'invalid');
        }

        $this->admin_user = $admin_user;
        return $values;
    }
}
