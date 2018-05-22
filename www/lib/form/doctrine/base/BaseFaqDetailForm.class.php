<?php

/**
 * FaqDetail form base class.
 *
 * @method FaqDetail getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseFaqDetailForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'question'             => new sfWidgetFormTextarea(),
      'answer'               => new sfWidgetFormTextarea(),
      'priority'             => new sfWidgetFormInputText(),
      'popular_flag'         => new sfWidgetFormInputCheckbox(),
      'search_index'         => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'related_details_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'FaqDetail')),
      'sub_categories_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'FaqSubCategory')),
      'contents_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'FaqContent')),
      'faq_detail_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'FaqDetail')),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'question'             => new sfValidatorString(array('max_length' => 1024)),
      'answer'               => new sfValidatorString(array('max_length' => 4096)),
      'priority'             => new sfValidatorInteger(),
      'popular_flag'         => new sfValidatorBoolean(),
      'search_index'         => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
      'related_details_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'FaqDetail', 'required' => false)),
      'sub_categories_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'FaqSubCategory', 'required' => false)),
      'contents_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'FaqContent', 'required' => false)),
      'faq_detail_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'FaqDetail', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('faq_detail[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FaqDetail';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['related_details_list']))
    {
      $this->setDefault('related_details_list', $this->object->RelatedDetails->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['sub_categories_list']))
    {
      $this->setDefault('sub_categories_list', $this->object->SubCategories->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['contents_list']))
    {
      $this->setDefault('contents_list', $this->object->Contents->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['faq_detail_list']))
    {
      $this->setDefault('faq_detail_list', $this->object->FaqDetail->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveRelatedDetailsList($con);
    $this->saveSubCategoriesList($con);
    $this->saveContentsList($con);
    $this->saveFaqDetailList($con);

    parent::doSave($con);
  }

  public function saveRelatedDetailsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['related_details_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->RelatedDetails->getPrimaryKeys();
    $values = $this->getValue('related_details_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('RelatedDetails', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('RelatedDetails', array_values($link));
    }
  }

  public function saveSubCategoriesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['sub_categories_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->SubCategories->getPrimaryKeys();
    $values = $this->getValue('sub_categories_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('SubCategories', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('SubCategories', array_values($link));
    }
  }

  public function saveContentsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['contents_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Contents->getPrimaryKeys();
    $values = $this->getValue('contents_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Contents', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Contents', array_values($link));
    }
  }

  public function saveFaqDetailList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['faq_detail_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->FaqDetail->getPrimaryKeys();
    $values = $this->getValue('faq_detail_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('FaqDetail', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('FaqDetail', array_values($link));
    }
  }

}
