<?php

/**
 * ReserveDecision form base class.
 *
 * @method ReserveDecision getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseReserveDecisionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'salon_reserve_id'  => new sfWidgetFormInputText(),
      'other_date1'       => new sfWidgetFormInputText(),
      'other_date2'       => new sfWidgetFormInputText(),
      'hope_flag1'        => new sfWidgetFormInputCheckbox(),
      'hope_flag2'        => new sfWidgetFormInputCheckbox(),
      'hope_flag3'        => new sfWidgetFormInputCheckbox(),
      'other_flag1'       => new sfWidgetFormInputCheckbox(),
      'hope_start_time1'  => new sfWidgetFormInputText(),
      'hope_start_time2'  => new sfWidgetFormInputText(),
      'hope_start_time3'  => new sfWidgetFormInputText(),
      'other_start_time1' => new sfWidgetFormInputText(),
      'other_start_time2' => new sfWidgetFormInputText(),
      'registrant'        => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'salon_reserve_id'  => new sfValidatorInteger(),
      'other_date1'       => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'other_date2'       => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'hope_flag1'        => new sfValidatorBoolean(array('required' => false)),
      'hope_flag2'        => new sfValidatorBoolean(array('required' => false)),
      'hope_flag3'        => new sfValidatorBoolean(array('required' => false)),
      'other_flag1'       => new sfValidatorBoolean(array('required' => false)),
      'hope_start_time1'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'hope_start_time2'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'hope_start_time3'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'other_start_time1' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'other_start_time2' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'registrant'        => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ReserveDecision', 'column' => array('salon_reserve_id')))
    );

    $this->widgetSchema->setNameFormat('reserve_decision[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ReserveDecision';
  }

}
