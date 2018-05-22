<?php

/**
 * MailGroupLogicTerm filter form base class.
 *
 * @package    cosmedecorte
 * @subpackage filter
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseMailGroupLogicTermFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'logic_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Logic'), 'add_empty' => true)),
      'operator'    => new sfWidgetFormChoice(array('choices' => array('' => '', 'EQUAL' => 'EQUAL', 'NOT EQUAL' => 'NOT EQUAL', 'GREATER_THAN' => 'GREATER_THAN', 'GREATER_EQUAL' => 'GREATER_EQUAL', 'LESS_THAN' => 'LESS_THAN', 'LESS_EQUAL' => 'LESS_EQUAL', 'LIKE' => 'LIKE'))),
      'column_name' => new sfWidgetFormChoice(array('choices' => array('' => '', 'mail_pc' => 'mail_pc', 'mail_mobile' => 'mail_mobile', 'mail_pc_flag' => 'mail_pc_flag', 'mail_mobile_flag' => 'mail_mobile_flag', 'mail_html_flag' => 'mail_html_flag', 'sex' => 'sex', 'prefecture' => 'prefecture', 'birthday' => 'birthday'))),
      'value'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'logic_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Logic'), 'column' => 'id')),
      'operator'    => new sfValidatorChoice(array('required' => false, 'choices' => array('EQUAL' => 'EQUAL', 'NOT EQUAL' => 'NOT EQUAL', 'GREATER_THAN' => 'GREATER_THAN', 'GREATER_EQUAL' => 'GREATER_EQUAL', 'LESS_THAN' => 'LESS_THAN', 'LESS_EQUAL' => 'LESS_EQUAL', 'LIKE' => 'LIKE'))),
      'column_name' => new sfValidatorChoice(array('required' => false, 'choices' => array('mail_pc' => 'mail_pc', 'mail_mobile' => 'mail_mobile', 'mail_pc_flag' => 'mail_pc_flag', 'mail_mobile_flag' => 'mail_mobile_flag', 'mail_html_flag' => 'mail_html_flag', 'sex' => 'sex', 'prefecture' => 'prefecture', 'birthday' => 'birthday'))),
      'value'       => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('mail_group_logic_term_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MailGroupLogicTerm';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'logic_id'    => 'ForeignKey',
      'operator'    => 'Enum',
      'column_name' => 'Enum',
      'value'       => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
