<?php

/**
 * FaqSubCategoryDetail form base class.
 *
 * @method FaqSubCategoryDetail getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseFaqSubCategoryDetailForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'faq_sub_category_id' => new sfWidgetFormInputHidden(),
      'faq_detail_id'       => new sfWidgetFormInputHidden(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'faq_sub_category_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('faq_sub_category_id')), 'empty_value' => $this->getObject()->get('faq_sub_category_id'), 'required' => false)),
      'faq_detail_id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('faq_detail_id')), 'empty_value' => $this->getObject()->get('faq_detail_id'), 'required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('faq_sub_category_detail[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FaqSubCategoryDetail';
  }

}
