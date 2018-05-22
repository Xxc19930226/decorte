<?php

/**
 * SalonLoginCredentForm form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class SalonLoginCredentForm extends AdminUserForm
{
    protected static $display_list = array(1 => '管理者',
                                           2 => '店舗スタッフ');

    protected static $credentials_list = array(1 => 'salonadmin',
                                               2 => 'salonstaff');

    public function configure()
    {
        $this->setWidget('password', new sfWidgetFormInputHidden());
        $this->getValidator('password')->setOption('required', false);
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

}
