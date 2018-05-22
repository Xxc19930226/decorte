<?php

/**
 * FaqDetailRelated form base class.
 *
 * @method FaqDetailRelated getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseFaqDetailRelatedForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'faq_detail_id1' => new sfWidgetFormInputHidden(),
      'faq_detail_id2' => new sfWidgetFormInputHidden(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'faq_detail_id1' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('faq_detail_id1')), 'empty_value' => $this->getObject()->get('faq_detail_id1'), 'required' => false)),
      'faq_detail_id2' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('faq_detail_id2')), 'empty_value' => $this->getObject()->get('faq_detail_id2'), 'required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('faq_detail_related[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FaqDetailRelated';
  }

}
