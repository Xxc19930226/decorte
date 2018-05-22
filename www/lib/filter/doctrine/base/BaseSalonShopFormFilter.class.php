<?php

/**
 * SalonShop filter form base class.
 *
 * @package    cosmedecorte
 * @subpackage filter
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseSalonShopFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail_subject1'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail_subject1_mb'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail_subject2'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail_subject3'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail_body1'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail_body1_mb'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail_body_top2'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail_body_bottom2' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail_body_top3'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail_body_bottom3' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'              => new sfValidatorPass(array('required' => false)),
      'email'             => new sfValidatorPass(array('required' => false)),
      'mail_subject1'     => new sfValidatorPass(array('required' => false)),
      'mail_subject1_mb'  => new sfValidatorPass(array('required' => false)),
      'mail_subject2'     => new sfValidatorPass(array('required' => false)),
      'mail_subject3'     => new sfValidatorPass(array('required' => false)),
      'mail_body1'        => new sfValidatorPass(array('required' => false)),
      'mail_body1_mb'     => new sfValidatorPass(array('required' => false)),
      'mail_body_top2'    => new sfValidatorPass(array('required' => false)),
      'mail_body_bottom2' => new sfValidatorPass(array('required' => false)),
      'mail_body_top3'    => new sfValidatorPass(array('required' => false)),
      'mail_body_bottom3' => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('salon_shop_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SalonShop';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'name'              => 'Text',
      'email'             => 'Text',
      'mail_subject1'     => 'Text',
      'mail_subject1_mb'  => 'Text',
      'mail_subject2'     => 'Text',
      'mail_subject3'     => 'Text',
      'mail_body1'        => 'Text',
      'mail_body1_mb'     => 'Text',
      'mail_body_top2'    => 'Text',
      'mail_body_bottom2' => 'Text',
      'mail_body_top3'    => 'Text',
      'mail_body_bottom3' => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
