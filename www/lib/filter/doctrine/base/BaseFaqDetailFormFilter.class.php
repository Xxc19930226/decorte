<?php

/**
 * FaqDetail filter form base class.
 *
 * @package    cosmedecorte
 * @subpackage filter
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseFaqDetailFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'question'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'answer'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'priority'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'popular_flag'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'search_index'         => new sfWidgetFormFilterInput(),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'related_details_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'FaqDetail')),
      'sub_categories_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'FaqSubCategory')),
      'contents_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'FaqContent')),
      'faq_detail_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'FaqDetail')),
    ));

    $this->setValidators(array(
      'question'             => new sfValidatorPass(array('required' => false)),
      'answer'               => new sfValidatorPass(array('required' => false)),
      'priority'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'popular_flag'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'search_index'         => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'related_details_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'FaqDetail', 'required' => false)),
      'sub_categories_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'FaqSubCategory', 'required' => false)),
      'contents_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'FaqContent', 'required' => false)),
      'faq_detail_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'FaqDetail', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('faq_detail_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addRelatedDetailsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.FaqDetailRelated FaqDetailRelated')
      ->andWhereIn('FaqDetailRelated.faq_detail_id2', $values)
    ;
  }

  public function addSubCategoriesListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('FaqSubCategoryDetail.faq_sub_category_id', $values)
    ;
  }

  public function addContentsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.FaqContentDetail FaqContentDetail')
      ->andWhereIn('FaqContentDetail.faq_content_id', $values)
    ;
  }

  public function addFaqDetailListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.FaqDetailRelated FaqDetailRelated')
      ->andWhereIn('FaqDetailRelated.faq_detail_id1', $values)
    ;
  }

  public function getModelName()
  {
    return 'FaqDetail';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'question'             => 'Text',
      'answer'               => 'Text',
      'priority'             => 'Number',
      'popular_flag'         => 'Boolean',
      'search_index'         => 'Text',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
      'related_details_list' => 'ManyKey',
      'sub_categories_list'  => 'ManyKey',
      'contents_list'        => 'ManyKey',
      'faq_detail_list'      => 'ManyKey',
    );
  }
}
