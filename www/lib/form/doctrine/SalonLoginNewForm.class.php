<?php

/**
 * SalonLoginNewForm form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class SalonLoginNewForm extends AdminUserForm
{
    protected static $display_list = array(1 => '管理者',
                                           2 => '店舗スタッフ');

    protected static $credentials_list = array(1 => 'salonadmin',
                                               2 => 'salonstaff');

    public function configure()
    {
        $this->setWidget('user_name', new sfWidgetFormInputText());
        $this->setValidator(
             'user_name', new sfValidatorRegex(
                   array('trim' => true, 'max_length' => 16,
                         'pattern' => '/^[a-zA-Z0-9-_]*$/'),
                   array('required' => '必須入力項目です。',
                         'invalid' => '半角英数字で入力してください。',
                         'max_length' =>
                         '%max_length%文字以内で入力してください。')));
        $fields[] = 'user_name';

        $this->setWidget('password', new sfWidgetFormInputText());
        $this->setValidator(
             'password', new sfValidatorRegex(
                   array('trim' => true,
                         'max_length' => 20,
                         'min_length' => 4,
                         'pattern' => '/^[a-zA-Z0-9]*$/'),
                   array('required' => '必須入力項目です。',
                         'invalid' => '半角英数字で入力してください。',
                         'max_length' =>
                         '%max_length%文字以内で入力してください。',
                         'min_length' =>
                         '%min_length%文字以上で入力してください。')));
        $fields[] = 'password';

        $this->setWidget('credentials', new sfWidgetFormChoice(
                array('choices' => self::$display_list,
                      'renderer_options' => array('formatter'
                                         => array($this, 'formatter')),
                      'multiple' => false,
                      'expanded' => true )));
        $this->setValidator(
            'credentials', new sfValidatorChoice(
                array('choices' => array_keys(self::$display_list),
                      'multiple' => true,),
                array('required' => '必須選択項目です。')));
        $fields[] = 'credentials';

        $this->getValidator('shop_id')->
            setMessage('required', '必須選択項目です。')->
            setMessage('invalid', '不正な値です。');
        $fields[] = 'shop_id';

        // sfValidatorDoctrineUniqueどうも効いていないよう…
        $this->validatorSchema->setPostValidator(
            new sfValidatorDoctrineUnique(
                 array('model' => 'AdminUser',
                       'column' => array('user_name')),
                 array('invalid' => 'ユーザ名は既に登録されています。')));

        $this->useFields($fields);
    }

    public function formatter($widget, $inputs) {
        $rows = array();
        foreach ($inputs as $key=>$input) {
            $rows[] = $widget->renderContentTag('span', $input['label'],
                 array('class' => 'seiretufont')).$input['input'].
                 $widget->getOption('label_separator');
        }
        return implode($rows, $widget->getOption('separator'));
    }


    public function getCredString($value) {
        foreach($value as $val) {
            $ret[] =  self::$credentials_list[$val];
        }
        return $ret;
    }

    public function bind(
        array $taintedValues = null, array $taintedFiles = null)
    {
        if ($taintedValues && isset($taintedValues['credentials'])) {
            $a = array_flip(self::$display_list);
            if ($taintedValues['credentials'] == $a['店舗スタッフ']) {
                $this->getValidator('shop_id')->setOption('required', true);
            }
        }

        return parent::bind($taintedValues, $taintedFiles);
    }
}
