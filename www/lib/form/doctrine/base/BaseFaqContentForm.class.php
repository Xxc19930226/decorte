<?php

/**
 * FaqContent form base class.
 *
 * @method FaqContent getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseFaqContentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'title1'       => new sfWidgetFormInputText(),
      'title2'       => new sfWidgetFormInputText(),
      'title3'       => new sfWidgetFormInputText(),
      'priority'     => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
      'details_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'FaqDetail')),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title1'       => new sfValidatorString(array('max_length' => 255)),
      'title2'       => new sfValidatorString(array('max_length' => 255)),
      'title3'       => new sfValidatorString(array('max_length' => 255)),
      'priority'     => new sfValidatorInteger(),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
      'details_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'FaqDetail', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('faq_content[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FaqContent';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['details_list']))
    {
      $this->setDefault('details_list', $this->object->Details->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveDetailsList($con);

    parent::doSave($con);
  }

  public function saveDetailsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['details_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Details->getPrimaryKeys();
    $values = $this->getValue('details_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Details', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Details', array_values($link));
    }
  }

}
