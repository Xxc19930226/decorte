<?php

/**
 * SalonReserve filter form base class.
 *
 * @package    cosmedecorte
 * @subpackage filter
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseSalonReserveFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'shop_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Shop'), 'add_empty' => true)),
      'visit'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'members_card_id' => new sfWidgetFormFilterInput(),
      'name_sei'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name_mei'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name_sei_kana'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name_mei_kana'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'age'             => new sfWidgetFormFilterInput(),
      'address'         => new sfWidgetFormFilterInput(),
      'tel'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'           => new sfWidgetFormFilterInput(),
      'hope_date1'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hope_date2'      => new sfWidgetFormFilterInput(),
      'hope_date3'      => new sfWidgetFormFilterInput(),
      'hope_time1'      => new sfWidgetFormChoice(array('choices' => array('' => '', '---' => '---', '11:00～13:00' => '11:00～13:00', '13:00～16:00' => '13:00～16:00', '16:00～18:00' => '16:00～18:00', '午前' => '午前', '午後' => '午後', '夕方' => '夕方', '何時でも可' => '何時でも可'))),
      'hope_time2'      => new sfWidgetFormChoice(array('choices' => array('' => '', '---' => '---', '11:00～13:00' => '11:00～13:00', '13:00～16:00' => '13:00～16:00', '16:00～18:00' => '16:00～18:00', '午前' => '午前', '午後' => '午後', '夕方' => '夕方', '何時でも可' => '何時でも可'))),
      'hope_time3'      => new sfWidgetFormChoice(array('choices' => array('' => '', '---' => '---', '11:00～13:00' => '11:00～13:00', '13:00～16:00' => '13:00～16:00', '16:00～18:00' => '16:00～18:00', '午前' => '午前', '午後' => '午後', '夕方' => '夕方', '何時でも可' => '何時でも可'))),
      'menu'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'know'            => new sfWidgetFormChoice(array('choices' => array('' => '', '---' => '---', 'コスメデコルテHP' => 'コスメデコルテHP', '知人・友達の紹介' => '知人・友達の紹介', '家族の紹介' => '家族の紹介', '検索サイト(Yahoo/Google)' => '検索サイト(Yahoo/Google)', 'その他の検索サイト' => 'その他の検索サイト', '雑誌・フリーペーパー' => '雑誌・フリーペーパー', '以前から知っていた' => '以前から知っていた', 'その他' => 'その他'))),
      'request'         => new sfWidgetFormFilterInput(),
      'reply'           => new sfWidgetFormChoice(array('choices' => array('' => '', '返信済' => '返信済', '未返信' => '未返信'))),
      'delete_flag'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'shop_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Shop'), 'column' => 'id')),
      'visit'           => new sfValidatorPass(array('required' => false)),
      'members_card_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'name_sei'        => new sfValidatorPass(array('required' => false)),
      'name_mei'        => new sfValidatorPass(array('required' => false)),
      'name_sei_kana'   => new sfValidatorPass(array('required' => false)),
      'name_mei_kana'   => new sfValidatorPass(array('required' => false)),
      'age'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'address'         => new sfValidatorPass(array('required' => false)),
      'tel'             => new sfValidatorPass(array('required' => false)),
      'email'           => new sfValidatorPass(array('required' => false)),
      'hope_date1'      => new sfValidatorPass(array('required' => false)),
      'hope_date2'      => new sfValidatorPass(array('required' => false)),
      'hope_date3'      => new sfValidatorPass(array('required' => false)),
      'hope_time1'      => new sfValidatorChoice(array('required' => false, 'choices' => array('---' => '---', '11:00～13:00' => '11:00～13:00', '13:00～16:00' => '13:00～16:00', '16:00～18:00' => '16:00～18:00', '午前' => '午前', '午後' => '午後', '夕方' => '夕方', '何時でも可' => '何時でも可'))),
      'hope_time2'      => new sfValidatorChoice(array('required' => false, 'choices' => array('---' => '---', '11:00～13:00' => '11:00～13:00', '13:00～16:00' => '13:00～16:00', '16:00～18:00' => '16:00～18:00', '午前' => '午前', '午後' => '午後', '夕方' => '夕方', '何時でも可' => '何時でも可'))),
      'hope_time3'      => new sfValidatorChoice(array('required' => false, 'choices' => array('---' => '---', '11:00～13:00' => '11:00～13:00', '13:00～16:00' => '13:00～16:00', '16:00～18:00' => '16:00～18:00', '午前' => '午前', '午後' => '午後', '夕方' => '夕方', '何時でも可' => '何時でも可'))),
      'menu'            => new sfValidatorPass(array('required' => false)),
      'know'            => new sfValidatorChoice(array('required' => false, 'choices' => array('---' => '---', 'コスメデコルテHP' => 'コスメデコルテHP', '知人・友達の紹介' => '知人・友達の紹介', '家族の紹介' => '家族の紹介', '検索サイト(Yahoo/Google)' => '検索サイト(Yahoo/Google)', 'その他の検索サイト' => 'その他の検索サイト', '雑誌・フリーペーパー' => '雑誌・フリーペーパー', '以前から知っていた' => '以前から知っていた', 'その他' => 'その他'))),
      'request'         => new sfValidatorPass(array('required' => false)),
      'reply'           => new sfValidatorChoice(array('required' => false, 'choices' => array('返信済' => '返信済', '未返信' => '未返信'))),
      'delete_flag'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('salon_reserve_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SalonReserve';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'shop_id'         => 'ForeignKey',
      'visit'           => 'Text',
      'members_card_id' => 'Number',
      'name_sei'        => 'Text',
      'name_mei'        => 'Text',
      'name_sei_kana'   => 'Text',
      'name_mei_kana'   => 'Text',
      'age'             => 'Number',
      'address'         => 'Text',
      'tel'             => 'Text',
      'email'           => 'Text',
      'hope_date1'      => 'Text',
      'hope_date2'      => 'Text',
      'hope_date3'      => 'Text',
      'hope_time1'      => 'Enum',
      'hope_time2'      => 'Enum',
      'hope_time3'      => 'Enum',
      'menu'            => 'Text',
      'know'            => 'Enum',
      'request'         => 'Text',
      'reply'           => 'Enum',
      'delete_flag'     => 'Boolean',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
