<?php

/**
 * FaqDetailRelation form base class.
 *
 * @method FaqDetailRelation getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseFaqDetailRelationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'source_id'      => new sfWidgetFormInputHidden(),
      'destination_id' => new sfWidgetFormInputHidden(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'source_id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('source_id')), 'empty_value' => $this->getObject()->get('source_id'), 'required' => false)),
      'destination_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('destination_id')), 'empty_value' => $this->getObject()->get('destination_id'), 'required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('faq_detail_relation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FaqDetailRelation';
  }

}
