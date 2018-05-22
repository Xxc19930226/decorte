<?php

/**
 * ChildProduct filter form base class.
 *
 * @package    cosmedecorte
 * @subpackage filter
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseChildProductFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'parent_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parent'), 'add_empty' => true)),
      'sub_number'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'capacity'         => new sfWidgetFormFilterInput(),
      'price'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'slug'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cn_shop_link_url' => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'parent_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Parent'), 'column' => 'id')),
      'sub_number'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'name'             => new sfValidatorPass(array('required' => false)),
      'capacity'         => new sfValidatorPass(array('required' => false)),
      'price'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'slug'             => new sfValidatorPass(array('required' => false)),
      'cn_shop_link_url' => new sfValidatorPass(array('required' => false)),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('child_product_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ChildProduct';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'parent_id'        => 'ForeignKey',
      'sub_number'       => 'Number',
      'name'             => 'Text',
      'capacity'         => 'Text',
      'price'            => 'Number',
      'slug'             => 'Text',
      'cn_shop_link_url' => 'Text',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}
