<?php

/**
 * SalonLoginPassword form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class SalonLoginPasswordForm extends AdminUserForm
{
    public function configure()
    {

        $this->setValidator(
             'password', new sfValidatorRegex(
                   array('trim' => true,
                         'max_length' => 20,
                         'min_length' => 4,
                         'pattern' => '/^[a-zA-Z0-9]*$/'),
                   array('required' => '必須入力項目です。',
                         'invalid' => '半角英数字で入力してください。',
                         'max_length' => '%max_length%文字以内で入力してください。',
                         'min_length' => '%min_length%文字以上で入力してください。')));
        $fields[] = 'password';

        $this->setWidget('credentials', new sfWidgetFormInputHidden());
        $this->getValidator('credentials')->setOption('required', false);
        $fields[] = 'credentials';

        $this->useFields($fields);
    }
}
