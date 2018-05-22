<?php

/**
 * ShopFavorite form base class.
 *
 * @method ShopFavorite getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseShopFavoriteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'member_id'  => new sfWidgetFormInputHidden(),
      'shop_id'    => new sfWidgetFormInputHidden(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'member_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('member_id')), 'empty_value' => $this->getObject()->get('member_id'), 'required' => false)),
      'shop_id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('shop_id')), 'empty_value' => $this->getObject()->get('shop_id'), 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('shop_favorite[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShopFavorite';
  }

}
