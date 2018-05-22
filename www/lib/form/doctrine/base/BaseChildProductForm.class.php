<?php

/**
 * ChildProduct form base class.
 *
 * @method ChildProduct getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseChildProductForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'parent_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parent'), 'add_empty' => false)),
      'sub_number'       => new sfWidgetFormInputText(),
      'name'             => new sfWidgetFormInputText(),
      'capacity'         => new sfWidgetFormInputText(),
      'price'            => new sfWidgetFormInputText(),
      'slug'             => new sfWidgetFormInputText(),
      'cn_shop_link_url' => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'parent_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Parent'))),
      'sub_number'       => new sfValidatorInteger(),
      'name'             => new sfValidatorString(array('max_length' => 255)),
      'capacity'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'price'            => new sfValidatorInteger(),
      'slug'             => new sfValidatorString(array('max_length' => 255)),
      'cn_shop_link_url' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ChildProduct', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('child_product[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ChildProduct';
  }

}
