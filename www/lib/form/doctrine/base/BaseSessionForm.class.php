<?php

/**
 * Session form base class.
 *
 * @method Session getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseSessionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sess_id'   => new sfWidgetFormInputHidden(),
      'sess_data' => new sfWidgetFormInputText(),
      'sess_time' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'sess_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('sess_id')), 'empty_value' => $this->getObject()->get('sess_id'), 'required' => false)),
      'sess_data' => new sfValidatorPass(),
      'sess_time' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('session[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Session';
  }

}
