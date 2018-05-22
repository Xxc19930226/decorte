<?php

/**
 * SalonReserve form base class.
 *
 * @method SalonReserve getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseSalonReserveForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'shop_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Shop'), 'add_empty' => false)),
      'visit'           => new sfWidgetFormInputText(),
      'members_card_id' => new sfWidgetFormInputText(),
      'name_sei'        => new sfWidgetFormInputText(),
      'name_mei'        => new sfWidgetFormInputText(),
      'name_sei_kana'   => new sfWidgetFormInputText(),
      'name_mei_kana'   => new sfWidgetFormInputText(),
      'age'             => new sfWidgetFormInputText(),
      'address'         => new sfWidgetFormInputText(),
      'tel'             => new sfWidgetFormInputText(),
      'email'           => new sfWidgetFormInputText(),
      'hope_date1'      => new sfWidgetFormInputText(),
      'hope_date2'      => new sfWidgetFormInputText(),
      'hope_date3'      => new sfWidgetFormInputText(),
      'hope_time1'      => new sfWidgetFormChoice(array('choices' => array('---' => '---', '11:00～13:00' => '11:00～13:00', '13:00～16:00' => '13:00～16:00', '16:00～18:00' => '16:00～18:00', '午前' => '午前', '午後' => '午後', '夕方' => '夕方', '何時でも可' => '何時でも可'))),
      'hope_time2'      => new sfWidgetFormChoice(array('choices' => array('---' => '---', '11:00～13:00' => '11:00～13:00', '13:00～16:00' => '13:00～16:00', '16:00～18:00' => '16:00～18:00', '午前' => '午前', '午後' => '午後', '夕方' => '夕方', '何時でも可' => '何時でも可'))),
      'hope_time3'      => new sfWidgetFormChoice(array('choices' => array('---' => '---', '11:00～13:00' => '11:00～13:00', '13:00～16:00' => '13:00～16:00', '16:00～18:00' => '16:00～18:00', '午前' => '午前', '午後' => '午後', '夕方' => '夕方', '何時でも可' => '何時でも可'))),
      'menu'            => new sfWidgetFormInputText(),
      'know'            => new sfWidgetFormChoice(array('choices' => array('---' => '---', 'コスメデコルテHP' => 'コスメデコルテHP', '知人・友達の紹介' => '知人・友達の紹介', '家族の紹介' => '家族の紹介', '検索サイト(Yahoo/Google)' => '検索サイト(Yahoo/Google)', 'その他の検索サイト' => 'その他の検索サイト', '雑誌・フリーペーパー' => '雑誌・フリーペーパー', '以前から知っていた' => '以前から知っていた', 'その他' => 'その他'))),
      'request'         => new sfWidgetFormTextarea(),
      'reply'           => new sfWidgetFormChoice(array('choices' => array('返信済' => '返信済', '未返信' => '未返信'))),
      'delete_flag'     => new sfWidgetFormInputCheckbox(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'shop_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Shop'))),
      'visit'           => new sfValidatorString(array('max_length' => 50)),
      'members_card_id' => new sfValidatorInteger(array('required' => false)),
      'name_sei'        => new sfValidatorString(array('max_length' => 20)),
      'name_mei'        => new sfValidatorString(array('max_length' => 20)),
      'name_sei_kana'   => new sfValidatorString(array('max_length' => 20)),
      'name_mei_kana'   => new sfValidatorString(array('max_length' => 20)),
      'age'             => new sfValidatorInteger(array('required' => false)),
      'address'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tel'             => new sfValidatorRegex(array('max_length' => 13, 'pattern' => '/^[0-9]{2,5}[\-]?[0-9]{1,4}[\-]?[0-9]{4}$/')),
      'email'           => new sfValidatorEmail(array('max_length' => 255, 'required' => false)),
      'hope_date1'      => new sfValidatorString(array('max_length' => 20)),
      'hope_date2'      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'hope_date3'      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'hope_time1'      => new sfValidatorChoice(array('choices' => array(0 => '---', 1 => '11:00～13:00', 2 => '13:00～16:00', 3 => '16:00～18:00', 4 => '午前', 5 => '午後', 6 => '夕方', 7 => '何時でも可'))),
      'hope_time2'      => new sfValidatorChoice(array('choices' => array(0 => '---', 1 => '11:00～13:00', 2 => '13:00～16:00', 3 => '16:00～18:00', 4 => '午前', 5 => '午後', 6 => '夕方', 7 => '何時でも可'), 'required' => false)),
      'hope_time3'      => new sfValidatorChoice(array('choices' => array(0 => '---', 1 => '11:00～13:00', 2 => '13:00～16:00', 3 => '16:00～18:00', 4 => '午前', 5 => '午後', 6 => '夕方', 7 => '何時でも可'), 'required' => false)),
      'menu'            => new sfValidatorString(array('max_length' => 100)),
      'know'            => new sfValidatorChoice(array('choices' => array(0 => '---', 1 => 'コスメデコルテHP', 2 => '知人・友達の紹介', 3 => '家族の紹介', 4 => '検索サイト(Yahoo/Google)', 5 => 'その他の検索サイト', 6 => '雑誌・フリーペーパー', 7 => '以前から知っていた', 8 => 'その他'), 'required' => false)),
      'request'         => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'reply'           => new sfValidatorChoice(array('choices' => array(0 => '返信済', 1 => '未返信'), 'required' => false)),
      'delete_flag'     => new sfValidatorBoolean(),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('salon_reserve[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SalonReserve';
  }

}
