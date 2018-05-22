<?php

/**
 * FaqSubCategory filter form base class.
 *
 * @package    cosmedecorte
 * @subpackage filter
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseFaqSubCategoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => true)),
      'title1'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title2'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'priority'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'details_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'FaqDetail')),
    ));

    $this->setValidators(array(
      'category_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Category'), 'column' => 'id')),
      'title1'       => new sfValidatorPass(array('required' => false)),
      'title2'       => new sfValidatorPass(array('required' => false)),
      'priority'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'details_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'FaqDetail', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('faq_sub_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addDetailsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.FaqSubCategoryDetail FaqSubCategoryDetail')
      ->andWhereIn('FaqSubCategoryDetail.faq_detail_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'FaqSubCategory';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'category_id'  => 'ForeignKey',
      'title1'       => 'Text',
      'title2'       => 'Text',
      'priority'     => 'Number',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
      'details_list' => 'ManyKey',
    );
  }
}
