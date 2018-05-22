<?php

/**
 * Line filter form base class.
 *
 * @package    cosmedecorte
 * @subpackage filter
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseLineFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name_en'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'skincare_system_flag' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'major_flag'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'priority'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'slug'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'search_index'         => new sfWidgetFormFilterInput(),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'                 => new sfValidatorPass(array('required' => false)),
      'name_en'              => new sfValidatorPass(array('required' => false)),
      'skincare_system_flag' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'major_flag'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'priority'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'slug'                 => new sfValidatorPass(array('required' => false)),
      'search_index'         => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('line_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Line';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'name'                 => 'Text',
      'name_en'              => 'Text',
      'skincare_system_flag' => 'Boolean',
      'major_flag'           => 'Boolean',
      'priority'             => 'Number',
      'slug'                 => 'Text',
      'search_index'         => 'Text',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
    );
  }
}
