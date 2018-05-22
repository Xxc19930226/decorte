<?php

/**
 * ProductAccessLog form base class.
 *
 * @method ProductAccessLog getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseProductAccessLogForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'member_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => true)),
      'age'           => new sfWidgetFormInputText(),
      'prefecture'    => new sfWidgetFormChoice(array('choices' => array('北海道' => '北海道', '青森県' => '青森県', '岩手県' => '岩手県', '宮城県' => '宮城県', '秋田県' => '秋田県', '山形県' => '山形県', '福島県' => '福島県', '茨城県' => '茨城県', '栃木県' => '栃木県', '群馬県' => '群馬県', '埼玉県' => '埼玉県', '千葉県' => '千葉県', '東京都' => '東京都', '神奈川県' => '神奈川県', '新潟県' => '新潟県', '富山県' => '富山県', '石川県' => '石川県', '福井県' => '福井県', '山梨県' => '山梨県', '長野県' => '長野県', '岐阜県' => '岐阜県', '静岡県' => '静岡県', '愛知県' => '愛知県', '三重県' => '三重県', '滋賀県' => '滋賀県', '京都府' => '京都府', '大阪府' => '大阪府', '兵庫県' => '兵庫県', '奈良県' => '奈良県', '和歌山県' => '和歌山県', '鳥取県' => '鳥取県', '島根県' => '島根県', '岡山県' => '岡山県', '広島県' => '広島県', '山口県' => '山口県', '徳島県' => '徳島県', '香川県' => '香川県', '愛媛県' => '愛媛県', '高知県' => '高知県', '福岡県' => '福岡県', '佐賀県' => '佐賀県', '長崎県' => '長崎県', '熊本県' => '熊本県', '大分県' => '大分県', '宮崎県' => '宮崎県', '鹿児島県' => '鹿児島県', '沖縄県' => '沖縄県'))),
      'login_flag'    => new sfWidgetFormInputCheckbox(),
      'product_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Product'), 'add_empty' => false)),
      'search_log_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SearchLog'), 'add_empty' => true)),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'member_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'required' => false)),
      'age'           => new sfValidatorInteger(array('required' => false)),
      'prefecture'    => new sfValidatorChoice(array('choices' => array(0 => '北海道', 1 => '青森県', 2 => '岩手県', 3 => '宮城県', 4 => '秋田県', 5 => '山形県', 6 => '福島県', 7 => '茨城県', 8 => '栃木県', 9 => '群馬県', 10 => '埼玉県', 11 => '千葉県', 12 => '東京都', 13 => '神奈川県', 14 => '新潟県', 15 => '富山県', 16 => '石川県', 17 => '福井県', 18 => '山梨県', 19 => '長野県', 20 => '岐阜県', 21 => '静岡県', 22 => '愛知県', 23 => '三重県', 24 => '滋賀県', 25 => '京都府', 26 => '大阪府', 27 => '兵庫県', 28 => '奈良県', 29 => '和歌山県', 30 => '鳥取県', 31 => '島根県', 32 => '岡山県', 33 => '広島県', 34 => '山口県', 35 => '徳島県', 36 => '香川県', 37 => '愛媛県', 38 => '高知県', 39 => '福岡県', 40 => '佐賀県', 41 => '長崎県', 42 => '熊本県', 43 => '大分県', 44 => '宮崎県', 45 => '鹿児島県', 46 => '沖縄県'), 'required' => false)),
      'login_flag'    => new sfValidatorBoolean(),
      'product_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Product'))),
      'search_log_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SearchLog'), 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('product_access_log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductAccessLog';
  }

}
