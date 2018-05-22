<?php

/**
 * AdminUser form base class.
 *
 * @method AdminUser getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseAdminUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_name'   => new sfWidgetFormInputHidden(),
      'password'    => new sfWidgetFormInputText(),
      'credentials' => new sfWidgetFormInputText(),
      'shop_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Shop'), 'add_empty' => true)),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'user_name'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('user_name')), 'empty_value' => $this->getObject()->get('user_name'), 'required' => false)),
      'password'    => new sfValidatorString(array('max_length' => 64)),
      'credentials' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'shop_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Shop'), 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('admin_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdminUser';
  }

}
