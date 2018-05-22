<?php

/**
 * ExistingMobile filter form base class.
 *
 * @package    cosmedecorte
 * @subpackage filter
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseExistingMobileFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'mail_mobile'     => new sfWidgetFormFilterInput(),
      'prefecture'      => new sfWidgetFormChoice(array('choices' => array('' => '', '北海道' => '北海道', '青森県' => '青森県', '岩手県' => '岩手県', '宮城県' => '宮城県', '秋田県' => '秋田県', '山形県' => '山形県', '福島県' => '福島県', '茨城県' => '茨城県', '栃木県' => '栃木県', '群馬県' => '群馬県', '埼玉県' => '埼玉県', '千葉県' => '千葉県', '東京都' => '東京都', '神奈川県' => '神奈川県', '新潟県' => '新潟県', '富山県' => '富山県', '石川県' => '石川県', '>福井県' => '>福井県', '山梨県' => '山梨県', '長野県' => '長野県', '岐阜県' => '岐阜県', '静岡県' => '静岡県', '愛知県' => '愛知県', '三重県' => '三重県', '滋賀県' => '滋賀県', '京都府' => '京都府', '大阪府' => '大阪府', '兵庫県' => '兵庫県', '奈良県' => '奈良県', '和歌山県' => '和歌山県', '鳥取県' => '鳥取県', '島根県' => '島根県', '岡山県' => '岡山県', '広島県' => '広島県', '山口県' => '山口県', '徳島県' => '徳島県', '香川県' => '香川県', '愛媛県' => '愛媛県', '高知県' => '高知県', '福岡県' => '福岡県', '佐賀県' => '佐賀県', '長崎県' => '長崎県', '熊本県' => '熊本県', '大分県' => '大分県', '宮崎県' => '宮崎県', '鹿児島県' => '鹿児島県', '沖縄県' => '沖縄県', '日本国外' => '日本国外'))),
      'mail_block_flag' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'mail_mobile'     => new sfValidatorPass(array('required' => false)),
      'prefecture'      => new sfValidatorChoice(array('required' => false, 'choices' => array('北海道' => '北海道', '青森県' => '青森県', '岩手県' => '岩手県', '宮城県' => '宮城県', '秋田県' => '秋田県', '山形県' => '山形県', '福島県' => '福島県', '茨城県' => '茨城県', '栃木県' => '栃木県', '群馬県' => '群馬県', '埼玉県' => '埼玉県', '千葉県' => '千葉県', '東京都' => '東京都', '神奈川県' => '神奈川県', '新潟県' => '新潟県', '富山県' => '富山県', '石川県' => '石川県', '>福井県' => '>福井県', '山梨県' => '山梨県', '長野県' => '長野県', '岐阜県' => '岐阜県', '静岡県' => '静岡県', '愛知県' => '愛知県', '三重県' => '三重県', '滋賀県' => '滋賀県', '京都府' => '京都府', '大阪府' => '大阪府', '兵庫県' => '兵庫県', '奈良県' => '奈良県', '和歌山県' => '和歌山県', '鳥取県' => '鳥取県', '島根県' => '島根県', '岡山県' => '岡山県', '広島県' => '広島県', '山口県' => '山口県', '徳島県' => '徳島県', '香川県' => '香川県', '愛媛県' => '愛媛県', '高知県' => '高知県', '福岡県' => '福岡県', '佐賀県' => '佐賀県', '長崎県' => '長崎県', '熊本県' => '熊本県', '大分県' => '大分県', '宮崎県' => '宮崎県', '鹿児島県' => '鹿児島県', '沖縄県' => '沖縄県', '日本国外' => '日本国外'))),
      'mail_block_flag' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('existing_mobile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExistingMobile';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'mail_mobile'     => 'Text',
      'prefecture'      => 'Enum',
      'mail_block_flag' => 'Boolean',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
