<?php

/**
 * SalonShop form base class.
 *
 * @method SalonShop getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseSalonShopForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'name'              => new sfWidgetFormInputText(),
      'email'             => new sfWidgetFormInputText(),
      'mail_subject1'     => new sfWidgetFormInputText(),
      'mail_subject1_mb'  => new sfWidgetFormInputText(),
      'mail_subject2'     => new sfWidgetFormInputText(),
      'mail_subject3'     => new sfWidgetFormInputText(),
      'mail_body1'        => new sfWidgetFormInputText(),
      'mail_body1_mb'     => new sfWidgetFormInputText(),
      'mail_body_top2'    => new sfWidgetFormInputText(),
      'mail_body_bottom2' => new sfWidgetFormInputText(),
      'mail_body_top3'    => new sfWidgetFormInputText(),
      'mail_body_bottom3' => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 50)),
      'email'             => new sfValidatorString(array('max_length' => 255)),
      'mail_subject1'     => new sfValidatorString(array('max_length' => 100)),
      'mail_subject1_mb'  => new sfValidatorString(array('max_length' => 100)),
      'mail_subject2'     => new sfValidatorString(array('max_length' => 100)),
      'mail_subject3'     => new sfValidatorString(array('max_length' => 100)),
      'mail_body1'        => new sfValidatorPass(),
      'mail_body1_mb'     => new sfValidatorPass(),
      'mail_body_top2'    => new sfValidatorPass(),
      'mail_body_bottom2' => new sfValidatorPass(),
      'mail_body_top3'    => new sfValidatorPass(),
      'mail_body_bottom3' => new sfValidatorPass(),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('salon_shop[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SalonShop';
  }

}
