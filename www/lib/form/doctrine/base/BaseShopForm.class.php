<?php

/**
 * Shop form base class.
 *
 * @method Shop getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseShopForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'name'                  => new sfWidgetFormInputText(),
      'zip_code'              => new sfWidgetFormInputText(),
      'prefecture'            => new sfWidgetFormInputText(),
      'address'               => new sfWidgetFormInputText(),
      'tel'                   => new sfWidgetFormInputText(),
      'fax'                   => new sfWidgetFormInputText(),
      'url1'                  => new sfWidgetFormInputText(),
      'url2'                  => new sfWidgetFormInputText(),
      'aq_flag'               => new sfWidgetFormInputCheckbox(),
      'maquiexpert_flag'      => new sfWidgetFormInputCheckbox(),
      'salon_flag'            => new sfWidgetFormInputCheckbox(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
      'favorite_members_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Member')),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                  => new sfValidatorString(array('max_length' => 255)),
      'zip_code'              => new sfValidatorString(array('max_length' => 8)),
      'prefecture'            => new sfValidatorString(array('max_length' => 4)),
      'address'               => new sfValidatorString(array('max_length' => 255)),
      'tel'                   => new sfValidatorString(array('max_length' => 13)),
      'fax'                   => new sfValidatorString(array('max_length' => 13, 'required' => false)),
      'url1'                  => new sfValidatorString(array('max_length' => 255)),
      'url2'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'aq_flag'               => new sfValidatorBoolean(),
      'maquiexpert_flag'      => new sfValidatorBoolean(),
      'salon_flag'            => new sfValidatorBoolean(),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
      'favorite_members_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Member', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('shop[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Shop';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['favorite_members_list']))
    {
      $this->setDefault('favorite_members_list', $this->object->FavoriteMembers->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveFavoriteMembersList($con);

    parent::doSave($con);
  }

  public function saveFavoriteMembersList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['favorite_members_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->FavoriteMembers->getPrimaryKeys();
    $values = $this->getValue('favorite_members_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('FavoriteMembers', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('FavoriteMembers', array_values($link));
    }
  }

}
