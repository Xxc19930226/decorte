<?php

/**
 * RedirectUrl form base class.
 *
 * @method RedirectUrl getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseRedirectUrlForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'source'         => new sfWidgetFormInputText(),
      'destination'    => new sfWidgetFormInputText(),
      'destination_sp' => new sfWidgetFormInputText(),
      'destination_mb' => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'source'         => new sfValidatorString(array('max_length' => 255)),
      'destination'    => new sfValidatorString(array('max_length' => 255)),
      'destination_sp' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'destination_mb' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'RedirectUrl', 'column' => array('source')))
    );

    $this->widgetSchema->setNameFormat('redirect_url[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RedirectUrl';
  }

}
