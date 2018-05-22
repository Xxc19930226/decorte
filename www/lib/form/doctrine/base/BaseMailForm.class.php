<?php

/**
 * Mail form base class.
 *
 * @method Mail getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseMailForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'subject'      => new sfWidgetFormInputText(),
      'body'         => new sfWidgetFormInputText(),
      'author_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Author'), 'add_empty' => false)),
      'group_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Group'), 'add_empty' => false)),
      'delivered_at' => new sfWidgetFormDateTime(),
      'address_type' => new sfWidgetFormChoice(array('choices' => array('PC' => 'PC', '携帯' => '携帯'))),
      'status'       => new sfWidgetFormChoice(array('choices' => array('未送信' => '未送信', '送信中' => '送信中', '送信済み' => '送信済み', '送信エラー' => '送信エラー'))),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'subject'      => new sfValidatorString(array('max_length' => 255)),
      'body'         => new sfValidatorPass(),
      'author_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Author'))),
      'group_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Group'))),
      'delivered_at' => new sfValidatorDateTime(),
      'address_type' => new sfValidatorChoice(array('choices' => array(0 => 'PC', 1 => '携帯'))),
      'status'       => new sfValidatorChoice(array('choices' => array(0 => '未送信', 1 => '送信中', 2 => '送信済み', 3 => '送信エラー'))),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('mail[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Mail';
  }

}
