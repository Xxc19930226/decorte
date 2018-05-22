<?php

/**
 * Member form base class.
 *
 * @method Member getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseMemberForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                        => new sfWidgetFormInputHidden(),
      'name_sei'                  => new sfWidgetFormInputText(),
      'name_mei'                  => new sfWidgetFormInputText(),
      'name_sei_kana'             => new sfWidgetFormInputText(),
      'name_mei_kana'             => new sfWidgetFormInputText(),
      'mail_pc'                   => new sfWidgetFormInputText(),
      'mail_pc_flag'              => new sfWidgetFormInputCheckbox(),
      'mail_mobile'               => new sfWidgetFormInputText(),
      'mail_mobile_flag'          => new sfWidgetFormInputCheckbox(),
      'mail_html_flag'            => new sfWidgetFormInputCheckbox(),
      'mail_block_flag'           => new sfWidgetFormInputCheckbox(),
      'password'                  => new sfWidgetFormInputText(),
      'sex'                       => new sfWidgetFormChoice(array('choices' => array('女性' => '女性', '男性' => '男性'))),
      'zip_code'                  => new sfWidgetFormInputText(),
      'prefecture'                => new sfWidgetFormChoice(array('choices' => array('北海道' => '北海道', '青森県' => '青森県', '岩手県' => '岩手県', '宮城県' => '宮城県', '秋田県' => '秋田県', '山形県' => '山形県', '福島県' => '福島県', '茨城県' => '茨城県', '栃木県' => '栃木県', '群馬県' => '群馬県', '埼玉県' => '埼玉県', '千葉県' => '千葉県', '東京都' => '東京都', '神奈川県' => '神奈川県', '新潟県' => '新潟県', '富山県' => '富山県', '石川県' => '石川県', '福井県' => '福井県', '山梨県' => '山梨県', '長野県' => '長野県', '岐阜県' => '岐阜県', '静岡県' => '静岡県', '愛知県' => '愛知県', '三重県' => '三重県', '滋賀県' => '滋賀県', '京都府' => '京都府', '大阪府' => '大阪府', '兵庫県' => '兵庫県', '奈良県' => '奈良県', '和歌山県' => '和歌山県', '鳥取県' => '鳥取県', '島根県' => '島根県', '岡山県' => '岡山県', '広島県' => '広島県', '山口県' => '山口県', '徳島県' => '徳島県', '香川県' => '香川県', '愛媛県' => '愛媛県', '高知県' => '高知県', '福岡県' => '福岡県', '佐賀県' => '佐賀県', '長崎県' => '長崎県', '熊本県' => '熊本県', '大分県' => '大分県', '宮崎県' => '宮崎県', '鹿児島県' => '鹿児島県', '沖縄県' => '沖縄県', '日本国外' => '日本国外'))),
      'address1'                  => new sfWidgetFormInputText(),
      'address2'                  => new sfWidgetFormInputText(),
      'job'                       => new sfWidgetFormChoice(array('choices' => array('会社員' => '会社員', '公務員' => '公務員', 'パート・アルバイト' => 'パート・アルバイト', '主婦' => '主婦', '学生' => '学生', 'その他' => 'その他'))),
      'tel'                       => new sfWidgetFormInputText(),
      'nick_name'                 => new sfWidgetFormInputText(),
      'birthday'                  => new sfWidgetFormDate(),
      'ua'                        => new sfWidgetFormChoice(array('choices' => array('pc' => 'pc', 'mb' => 'mb', 'sp' => 'sp'))),
      'mobile_device_id'          => new sfWidgetFormInputText(),
      'temp_flag'                 => new sfWidgetFormInputCheckbox(),
      'mail_pc_approval_flag'     => new sfWidgetFormInputCheckbox(),
      'mail_mobile_approval_flag' => new sfWidgetFormInputCheckbox(),
      'created_at'                => new sfWidgetFormDateTime(),
      'updated_at'                => new sfWidgetFormDateTime(),
      'view_products_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Product')),
      'favorite_products_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Product')),
      'favorite_shops_list'       => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Shop')),
    ));

    $this->setValidators(array(
      'id'                        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name_sei'                  => new sfValidatorString(array('max_length' => 20)),
      'name_mei'                  => new sfValidatorString(array('max_length' => 20)),
      'name_sei_kana'             => new sfValidatorString(array('max_length' => 20)),
      'name_mei_kana'             => new sfValidatorString(array('max_length' => 20)),
      'mail_pc'                   => new sfValidatorEmail(array('max_length' => 255, 'required' => false)),
      'mail_pc_flag'              => new sfValidatorBoolean(),
      'mail_mobile'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mail_mobile_flag'          => new sfValidatorBoolean(),
      'mail_html_flag'            => new sfValidatorBoolean(),
      'mail_block_flag'           => new sfValidatorBoolean(),
      'password'                  => new sfValidatorString(array('max_length' => 20, 'min_length' => 6)),
      'sex'                       => new sfValidatorChoice(array('choices' => array(0 => '女性', 1 => '男性'))),
      'zip_code'                  => new sfValidatorRegex(array('max_length' => 8, 'pattern' => '/^[0-9]{3}[\-]?[0-9]{4}$/')),
      'prefecture'                => new sfValidatorChoice(array('choices' => array(0 => '北海道', 1 => '青森県', 2 => '岩手県', 3 => '宮城県', 4 => '秋田県', 5 => '山形県', 6 => '福島県', 7 => '茨城県', 8 => '栃木県', 9 => '群馬県', 10 => '埼玉県', 11 => '千葉県', 12 => '東京都', 13 => '神奈川県', 14 => '新潟県', 15 => '富山県', 16 => '石川県', 17 => '福井県', 18 => '山梨県', 19 => '長野県', 20 => '岐阜県', 21 => '静岡県', 22 => '愛知県', 23 => '三重県', 24 => '滋賀県', 25 => '京都府', 26 => '大阪府', 27 => '兵庫県', 28 => '奈良県', 29 => '和歌山県', 30 => '鳥取県', 31 => '島根県', 32 => '岡山県', 33 => '広島県', 34 => '山口県', 35 => '徳島県', 36 => '香川県', 37 => '愛媛県', 38 => '高知県', 39 => '福岡県', 40 => '佐賀県', 41 => '長崎県', 42 => '熊本県', 43 => '大分県', 44 => '宮崎県', 45 => '鹿児島県', 46 => '沖縄県', 47 => '日本国外'))),
      'address1'                  => new sfValidatorString(array('max_length' => 255)),
      'address2'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'job'                       => new sfValidatorChoice(array('choices' => array(0 => '会社員', 1 => '公務員', 2 => 'パート・アルバイト', 3 => '主婦', 4 => '学生', 5 => 'その他'))),
      'tel'                       => new sfValidatorRegex(array('max_length' => 13, 'pattern' => '/^[0-9]{2,5}[\-]?[0-9]{1,4}[\-]?[0-9]{4}$/')),
      'nick_name'                 => new sfValidatorString(array('max_length' => 20)),
      'birthday'                  => new sfValidatorDate(),
      'ua'                        => new sfValidatorChoice(array('choices' => array(0 => 'pc', 1 => 'mb', 2 => 'sp'), 'required' => false)),
      'mobile_device_id'          => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'temp_flag'                 => new sfValidatorBoolean(),
      'mail_pc_approval_flag'     => new sfValidatorBoolean(),
      'mail_mobile_approval_flag' => new sfValidatorBoolean(),
      'created_at'                => new sfValidatorDateTime(),
      'updated_at'                => new sfValidatorDateTime(),
      'view_products_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Product', 'required' => false)),
      'favorite_products_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Product', 'required' => false)),
      'favorite_shops_list'       => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Shop', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('member[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Member';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['view_products_list']))
    {
      $this->setDefault('view_products_list', $this->object->ViewProducts->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['favorite_products_list']))
    {
      $this->setDefault('favorite_products_list', $this->object->FavoriteProducts->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['favorite_shops_list']))
    {
      $this->setDefault('favorite_shops_list', $this->object->FavoriteShops->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveViewProductsList($con);
    $this->saveFavoriteProductsList($con);
    $this->saveFavoriteShopsList($con);

    parent::doSave($con);
  }

  public function saveViewProductsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['view_products_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->ViewProducts->getPrimaryKeys();
    $values = $this->getValue('view_products_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('ViewProducts', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('ViewProducts', array_values($link));
    }
  }

  public function saveFavoriteProductsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['favorite_products_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->FavoriteProducts->getPrimaryKeys();
    $values = $this->getValue('favorite_products_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('FavoriteProducts', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('FavoriteProducts', array_values($link));
    }
  }

  public function saveFavoriteShopsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['favorite_shops_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->FavoriteShops->getPrimaryKeys();
    $values = $this->getValue('favorite_shops_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('FavoriteShops', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('FavoriteShops', array_values($link));
    }
  }

}
