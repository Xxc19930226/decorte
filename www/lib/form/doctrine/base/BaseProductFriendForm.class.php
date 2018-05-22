<?php

/**
 * ProductFriend form base class.
 *
 * @method ProductFriend getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseProductFriendForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'product_id1'    => new sfWidgetFormInputHidden(),
      'product_id2'    => new sfWidgetFormInputHidden(),
      'relation_count' => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'product_id1'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('product_id1')), 'empty_value' => $this->getObject()->get('product_id1'), 'required' => false)),
      'product_id2'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('product_id2')), 'empty_value' => $this->getObject()->get('product_id2'), 'required' => false)),
      'relation_count' => new sfValidatorInteger(),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('product_friend[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductFriend';
  }

}
