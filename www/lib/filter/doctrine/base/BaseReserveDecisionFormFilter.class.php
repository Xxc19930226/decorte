<?php

/**
 * ReserveDecision filter form base class.
 *
 * @package    cosmedecorte
 * @subpackage filter
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseReserveDecisionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'salon_reserve_id'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'other_date1'       => new sfWidgetFormFilterInput(),
      'other_date2'       => new sfWidgetFormFilterInput(),
      'hope_flag1'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'hope_flag2'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'hope_flag3'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'other_flag1'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'hope_start_time1'  => new sfWidgetFormFilterInput(),
      'hope_start_time2'  => new sfWidgetFormFilterInput(),
      'hope_start_time3'  => new sfWidgetFormFilterInput(),
      'other_start_time1' => new sfWidgetFormFilterInput(),
      'other_start_time2' => new sfWidgetFormFilterInput(),
      'registrant'        => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'salon_reserve_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'other_date1'       => new sfValidatorPass(array('required' => false)),
      'other_date2'       => new sfValidatorPass(array('required' => false)),
      'hope_flag1'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'hope_flag2'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'hope_flag3'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'other_flag1'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'hope_start_time1'  => new sfValidatorPass(array('required' => false)),
      'hope_start_time2'  => new sfValidatorPass(array('required' => false)),
      'hope_start_time3'  => new sfValidatorPass(array('required' => false)),
      'other_start_time1' => new sfValidatorPass(array('required' => false)),
      'other_start_time2' => new sfValidatorPass(array('required' => false)),
      'registrant'        => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('reserve_decision_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ReserveDecision';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'salon_reserve_id'  => 'Number',
      'other_date1'       => 'Text',
      'other_date2'       => 'Text',
      'hope_flag1'        => 'Boolean',
      'hope_flag2'        => 'Boolean',
      'hope_flag3'        => 'Boolean',
      'other_flag1'       => 'Boolean',
      'hope_start_time1'  => 'Text',
      'hope_start_time2'  => 'Text',
      'hope_start_time3'  => 'Text',
      'other_start_time1' => 'Text',
      'other_start_time2' => 'Text',
      'registrant'        => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
