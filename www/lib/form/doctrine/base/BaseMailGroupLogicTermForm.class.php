<?php

/**
 * MailGroupLogicTerm form base class.
 *
 * @method MailGroupLogicTerm getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseMailGroupLogicTermForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'logic_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Logic'), 'add_empty' => false)),
      'operator'    => new sfWidgetFormChoice(array('choices' => array('EQUAL' => 'EQUAL', 'NOT EQUAL' => 'NOT EQUAL', 'GREATER_THAN' => 'GREATER_THAN', 'GREATER_EQUAL' => 'GREATER_EQUAL', 'LESS_THAN' => 'LESS_THAN', 'LESS_EQUAL' => 'LESS_EQUAL', 'LIKE' => 'LIKE'))),
      'column_name' => new sfWidgetFormChoice(array('choices' => array('mail_pc' => 'mail_pc', 'mail_mobile' => 'mail_mobile', 'mail_pc_flag' => 'mail_pc_flag', 'mail_mobile_flag' => 'mail_mobile_flag', 'mail_html_flag' => 'mail_html_flag', 'sex' => 'sex', 'prefecture' => 'prefecture', 'birthday' => 'birthday'))),
      'value'       => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'logic_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Logic'))),
      'operator'    => new sfValidatorChoice(array('choices' => array(0 => 'EQUAL', 1 => 'NOT EQUAL', 2 => 'GREATER_THAN', 3 => 'GREATER_EQUAL', 4 => 'LESS_THAN', 5 => 'LESS_EQUAL', 6 => 'LIKE'))),
      'column_name' => new sfValidatorChoice(array('choices' => array(0 => 'mail_pc', 1 => 'mail_mobile', 2 => 'mail_pc_flag', 3 => 'mail_mobile_flag', 4 => 'mail_html_flag', 5 => 'sex', 6 => 'prefecture', 7 => 'birthday'))),
      'value'       => new sfValidatorString(array('max_length' => 255)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('mail_group_logic_term[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MailGroupLogicTerm';
  }

}
