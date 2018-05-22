<?php

/**
 * Member filter form base class.
 *
 * @package    cosmedecorte
 * @subpackage filter
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseMemberFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name_sei'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name_mei'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name_sei_kana'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name_mei_kana'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail_pc'                   => new sfWidgetFormFilterInput(),
      'mail_pc_flag'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'mail_mobile'               => new sfWidgetFormFilterInput(),
      'mail_mobile_flag'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'mail_html_flag'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'mail_block_flag'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'password'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sex'                       => new sfWidgetFormChoice(array('choices' => array('' => '', '女性' => '女性', '男性' => '男性'))),
      'zip_code'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'prefecture'                => new sfWidgetFormChoice(array('choices' => array('' => '', '北海道' => '北海道', '青森県' => '青森県', '岩手県' => '岩手県', '宮城県' => '宮城県', '秋田県' => '秋田県', '山形県' => '山形県', '福島県' => '福島県', '茨城県' => '茨城県', '栃木県' => '栃木県', '群馬県' => '群馬県', '埼玉県' => '埼玉県', '千葉県' => '千葉県', '東京都' => '東京都', '神奈川県' => '神奈川県', '新潟県' => '新潟県', '富山県' => '富山県', '石川県' => '石川県', '福井県' => '福井県', '山梨県' => '山梨県', '長野県' => '長野県', '岐阜県' => '岐阜県', '静岡県' => '静岡県', '愛知県' => '愛知県', '三重県' => '三重県', '滋賀県' => '滋賀県', '京都府' => '京都府', '大阪府' => '大阪府', '兵庫県' => '兵庫県', '奈良県' => '奈良県', '和歌山県' => '和歌山県', '鳥取県' => '鳥取県', '島根県' => '島根県', '岡山県' => '岡山県', '広島県' => '広島県', '山口県' => '山口県', '徳島県' => '徳島県', '香川県' => '香川県', '愛媛県' => '愛媛県', '高知県' => '高知県', '福岡県' => '福岡県', '佐賀県' => '佐賀県', '長崎県' => '長崎県', '熊本県' => '熊本県', '大分県' => '大分県', '宮崎県' => '宮崎県', '鹿児島県' => '鹿児島県', '沖縄県' => '沖縄県', '日本国外' => '日本国外'))),
      'address1'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address2'                  => new sfWidgetFormFilterInput(),
      'job'                       => new sfWidgetFormChoice(array('choices' => array('' => '', '会社員' => '会社員', '公務員' => '公務員', 'パート・アルバイト' => 'パート・アルバイト', '主婦' => '主婦', '学生' => '学生', 'その他' => 'その他'))),
      'tel'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nick_name'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'birthday'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'ua'                        => new sfWidgetFormChoice(array('choices' => array('' => '', 'pc' => 'pc', 'mb' => 'mb', 'sp' => 'sp'))),
      'mobile_device_id'          => new sfWidgetFormFilterInput(),
      'temp_flag'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'mail_pc_approval_flag'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'mail_mobile_approval_flag' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'view_products_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Product')),
      'favorite_products_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Product')),
      'favorite_shops_list'       => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Shop')),
    ));

    $this->setValidators(array(
      'name_sei'                  => new sfValidatorPass(array('required' => false)),
      'name_mei'                  => new sfValidatorPass(array('required' => false)),
      'name_sei_kana'             => new sfValidatorPass(array('required' => false)),
      'name_mei_kana'             => new sfValidatorPass(array('required' => false)),
      'mail_pc'                   => new sfValidatorPass(array('required' => false)),
      'mail_pc_flag'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'mail_mobile'               => new sfValidatorPass(array('required' => false)),
      'mail_mobile_flag'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'mail_html_flag'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'mail_block_flag'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'password'                  => new sfValidatorPass(array('required' => false)),
      'sex'                       => new sfValidatorChoice(array('required' => false, 'choices' => array('女性' => '女性', '男性' => '男性'))),
      'zip_code'                  => new sfValidatorPass(array('required' => false)),
      'prefecture'                => new sfValidatorChoice(array('required' => false, 'choices' => array('北海道' => '北海道', '青森県' => '青森県', '岩手県' => '岩手県', '宮城県' => '宮城県', '秋田県' => '秋田県', '山形県' => '山形県', '福島県' => '福島県', '茨城県' => '茨城県', '栃木県' => '栃木県', '群馬県' => '群馬県', '埼玉県' => '埼玉県', '千葉県' => '千葉県', '東京都' => '東京都', '神奈川県' => '神奈川県', '新潟県' => '新潟県', '富山県' => '富山県', '石川県' => '石川県', '福井県' => '福井県', '山梨県' => '山梨県', '長野県' => '長野県', '岐阜県' => '岐阜県', '静岡県' => '静岡県', '愛知県' => '愛知県', '三重県' => '三重県', '滋賀県' => '滋賀県', '京都府' => '京都府', '大阪府' => '大阪府', '兵庫県' => '兵庫県', '奈良県' => '奈良県', '和歌山県' => '和歌山県', '鳥取県' => '鳥取県', '島根県' => '島根県', '岡山県' => '岡山県', '広島県' => '広島県', '山口県' => '山口県', '徳島県' => '徳島県', '香川県' => '香川県', '愛媛県' => '愛媛県', '高知県' => '高知県', '福岡県' => '福岡県', '佐賀県' => '佐賀県', '長崎県' => '長崎県', '熊本県' => '熊本県', '大分県' => '大分県', '宮崎県' => '宮崎県', '鹿児島県' => '鹿児島県', '沖縄県' => '沖縄県', '日本国外' => '日本国外'))),
      'address1'                  => new sfValidatorPass(array('required' => false)),
      'address2'                  => new sfValidatorPass(array('required' => false)),
      'job'                       => new sfValidatorChoice(array('required' => false, 'choices' => array('会社員' => '会社員', '公務員' => '公務員', 'パート・アルバイト' => 'パート・アルバイト', '主婦' => '主婦', '学生' => '学生', 'その他' => 'その他'))),
      'tel'                       => new sfValidatorPass(array('required' => false)),
      'nick_name'                 => new sfValidatorPass(array('required' => false)),
      'birthday'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'ua'                        => new sfValidatorChoice(array('required' => false, 'choices' => array('pc' => 'pc', 'mb' => 'mb', 'sp' => 'sp'))),
      'mobile_device_id'          => new sfValidatorPass(array('required' => false)),
      'temp_flag'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'mail_pc_approval_flag'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'mail_mobile_approval_flag' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'view_products_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Product', 'required' => false)),
      'favorite_products_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Product', 'required' => false)),
      'favorite_shops_list'       => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Shop', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('member_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addViewProductsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ProductView ProductView')
      ->andWhereIn('ProductView.product_id', $values)
    ;
  }

  public function addFavoriteProductsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ProductFavorite ProductFavorite')
      ->andWhereIn('ProductFavorite.product_id', $values)
    ;
  }

  public function addFavoriteShopsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ShopFavorite ShopFavorite')
      ->andWhereIn('ShopFavorite.shop_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Member';
  }

  public function getFields()
  {
    return array(
      'id'                        => 'Number',
      'name_sei'                  => 'Text',
      'name_mei'                  => 'Text',
      'name_sei_kana'             => 'Text',
      'name_mei_kana'             => 'Text',
      'mail_pc'                   => 'Text',
      'mail_pc_flag'              => 'Boolean',
      'mail_mobile'               => 'Text',
      'mail_mobile_flag'          => 'Boolean',
      'mail_html_flag'            => 'Boolean',
      'mail_block_flag'           => 'Boolean',
      'password'                  => 'Text',
      'sex'                       => 'Enum',
      'zip_code'                  => 'Text',
      'prefecture'                => 'Enum',
      'address1'                  => 'Text',
      'address2'                  => 'Text',
      'job'                       => 'Enum',
      'tel'                       => 'Text',
      'nick_name'                 => 'Text',
      'birthday'                  => 'Date',
      'ua'                        => 'Enum',
      'mobile_device_id'          => 'Text',
      'temp_flag'                 => 'Boolean',
      'mail_pc_approval_flag'     => 'Boolean',
      'mail_mobile_approval_flag' => 'Boolean',
      'created_at'                => 'Date',
      'updated_at'                => 'Date',
      'view_products_list'        => 'ManyKey',
      'favorite_products_list'    => 'ManyKey',
      'favorite_shops_list'       => 'ManyKey',
    );
  }
}
