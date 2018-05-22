<?php

/**
 * CampaignEnquete form base class.
 *
 * @method CampaignEnquete getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseCampaignEnqueteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'member_id'  => new sfWidgetFormInputText(),
      'q01'        => new sfWidgetFormChoice(array('choices' => array('知っていた' => '知っていた', '知っていて使用したこともある' => '知っていて使用したこともある', '知らなかった' => '知らなかった'))),
      'q02'        => new sfWidgetFormInputText(),
      'q03'        => new sfWidgetFormChoice(array('choices' => array('クチコミをよくするほうだ' => 'クチコミをよくするほうだ', 'クチコミはしない' => 'クチコミはしない'))),
      'q04'        => new sfWidgetFormInputText(),
      'q05'        => new sfWidgetFormChoice(array('choices' => array('普通肌' => '普通肌', '乾燥肌' => '乾燥肌', '脂性肌' => '脂性肌', '混合肌' => '混合肌', '敏感肌' => '敏感肌', 'アトピー' => 'アトピー'))),
      'q06'        => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'member_id'  => new sfValidatorInteger(),
      'q01'        => new sfValidatorChoice(array('choices' => array(0 => '知っていた', 1 => '知っていて使用したこともある', 2 => '知らなかった'))),
      'q02'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'q03'        => new sfValidatorChoice(array('choices' => array(0 => 'クチコミをよくするほうだ', 1 => 'クチコミはしない'))),
      'q04'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'q05'        => new sfValidatorChoice(array('choices' => array(0 => '普通肌', 1 => '乾燥肌', 2 => '脂性肌', 3 => '混合肌', 4 => '敏感肌', 5 => 'アトピー'))),
      'q06'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('campaign_enquete[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampaignEnquete';
  }

}
