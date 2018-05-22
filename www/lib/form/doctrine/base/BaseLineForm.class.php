<?php

/**
 * Line form base class.
 *
 * @method Line getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseLineForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'name'                 => new sfWidgetFormInputText(),
      'name_en'              => new sfWidgetFormInputText(),
      'skincare_system_flag' => new sfWidgetFormInputCheckbox(),
      'major_flag'           => new sfWidgetFormInputCheckbox(),
      'priority'             => new sfWidgetFormInputText(),
      'slug'                 => new sfWidgetFormInputText(),
      'search_index'         => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                 => new sfValidatorString(array('max_length' => 255)),
      'name_en'              => new sfValidatorString(array('max_length' => 255)),
      'skincare_system_flag' => new sfValidatorBoolean(),
      'major_flag'           => new sfValidatorBoolean(),
      'priority'             => new sfValidatorInteger(),
      'slug'                 => new sfValidatorString(array('max_length' => 255)),
      'search_index'         => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Line', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('line[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Line';
  }

}
