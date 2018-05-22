<?php

/**
 * CampaignEnquete filter form base class.
 *
 * @package    cosmedecorte
 * @subpackage filter
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseCampaignEnqueteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'member_id'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'q01'        => new sfWidgetFormChoice(array('choices' => array('' => '', '知っていた' => '知っていた', '知っていて使用したこともある' => '知っていて使用したこともある', '知らなかった' => '知らなかった'))),
      'q02'        => new sfWidgetFormFilterInput(),
      'q03'        => new sfWidgetFormChoice(array('choices' => array('' => '', 'クチコミをよくするほうだ' => 'クチコミをよくするほうだ', 'クチコミはしない' => 'クチコミはしない'))),
      'q04'        => new sfWidgetFormFilterInput(),
      'q05'        => new sfWidgetFormChoice(array('choices' => array('' => '', '普通肌' => '普通肌', '乾燥肌' => '乾燥肌', '脂性肌' => '脂性肌', '混合肌' => '混合肌', '敏感肌' => '敏感肌', 'アトピー' => 'アトピー'))),
      'q06'        => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'member_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'q01'        => new sfValidatorChoice(array('required' => false, 'choices' => array('知っていた' => '知っていた', '知っていて使用したこともある' => '知っていて使用したこともある', '知らなかった' => '知らなかった'))),
      'q02'        => new sfValidatorPass(array('required' => false)),
      'q03'        => new sfValidatorChoice(array('required' => false, 'choices' => array('クチコミをよくするほうだ' => 'クチコミをよくするほうだ', 'クチコミはしない' => 'クチコミはしない'))),
      'q04'        => new sfValidatorPass(array('required' => false)),
      'q05'        => new sfValidatorChoice(array('required' => false, 'choices' => array('普通肌' => '普通肌', '乾燥肌' => '乾燥肌', '脂性肌' => '脂性肌', '混合肌' => '混合肌', '敏感肌' => '敏感肌', 'アトピー' => 'アトピー'))),
      'q06'        => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('campaign_enquete_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampaignEnquete';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'member_id'  => 'Number',
      'q01'        => 'Enum',
      'q02'        => 'Text',
      'q03'        => 'Enum',
      'q04'        => 'Text',
      'q05'        => 'Enum',
      'q06'        => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
