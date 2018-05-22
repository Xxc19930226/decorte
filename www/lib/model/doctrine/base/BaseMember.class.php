<?php

/**
 * BaseMember
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name_sei
 * @property string $name_mei
 * @property string $name_sei_kana
 * @property string $name_mei_kana
 * @property string $mail_pc
 * @property boolean $mail_pc_flag
 * @property string $mail_mobile
 * @property boolean $mail_mobile_flag
 * @property boolean $mail_html_flag
 * @property boolean $mail_block_flag
 * @property string $password
 * @property enum $sex
 * @property string $zip_code
 * @property enum $prefecture
 * @property string $address1
 * @property string $address2
 * @property enum $job
 * @property string $tel
 * @property string $nick_name
 * @property date $birthday
 * @property enum $ua
 * @property string $mobile_device_id
 * @property boolean $temp_flag
 * @property boolean $mail_pc_approval_flag
 * @property boolean $mail_mobile_approval_flag
 * @property Doctrine_Collection $ViewProducts
 * @property Doctrine_Collection $FavoriteProducts
 * @property Doctrine_Collection $FavoriteShops
 * @property Doctrine_Collection $Attestations
 * @property Doctrine_Collection $ProductAccessLogs
 * @property Doctrine_Collection $ProductSearchLogs
 * 
 * @method integer             getId()                        Returns the current record's "id" value
 * @method string              getNameSei()                   Returns the current record's "name_sei" value
 * @method string              getNameMei()                   Returns the current record's "name_mei" value
 * @method string              getNameSeiKana()               Returns the current record's "name_sei_kana" value
 * @method string              getNameMeiKana()               Returns the current record's "name_mei_kana" value
 * @method string              getMailPc()                    Returns the current record's "mail_pc" value
 * @method boolean             getMailPcFlag()                Returns the current record's "mail_pc_flag" value
 * @method string              getMailMobile()                Returns the current record's "mail_mobile" value
 * @method boolean             getMailMobileFlag()            Returns the current record's "mail_mobile_flag" value
 * @method boolean             getMailHtmlFlag()              Returns the current record's "mail_html_flag" value
 * @method boolean             getMailBlockFlag()             Returns the current record's "mail_block_flag" value
 * @method string              getPassword()                  Returns the current record's "password" value
 * @method enum                getSex()                       Returns the current record's "sex" value
 * @method string              getZipCode()                   Returns the current record's "zip_code" value
 * @method enum                getPrefecture()                Returns the current record's "prefecture" value
 * @method string              getAddress1()                  Returns the current record's "address1" value
 * @method string              getAddress2()                  Returns the current record's "address2" value
 * @method enum                getJob()                       Returns the current record's "job" value
 * @method string              getTel()                       Returns the current record's "tel" value
 * @method string              getNickName()                  Returns the current record's "nick_name" value
 * @method date                getBirthday()                  Returns the current record's "birthday" value
 * @method enum                getUa()                        Returns the current record's "ua" value
 * @method string              getMobileDeviceId()            Returns the current record's "mobile_device_id" value
 * @method boolean             getTempFlag()                  Returns the current record's "temp_flag" value
 * @method boolean             getMailPcApprovalFlag()        Returns the current record's "mail_pc_approval_flag" value
 * @method boolean             getMailMobileApprovalFlag()    Returns the current record's "mail_mobile_approval_flag" value
 * @method Doctrine_Collection getViewProducts()              Returns the current record's "ViewProducts" collection
 * @method Doctrine_Collection getFavoriteProducts()          Returns the current record's "FavoriteProducts" collection
 * @method Doctrine_Collection getFavoriteShops()             Returns the current record's "FavoriteShops" collection
 * @method Doctrine_Collection getAttestations()              Returns the current record's "Attestations" collection
 * @method Doctrine_Collection getProductAccessLogs()         Returns the current record's "ProductAccessLogs" collection
 * @method Doctrine_Collection getProductSearchLogs()         Returns the current record's "ProductSearchLogs" collection
 * @method Member              setId()                        Sets the current record's "id" value
 * @method Member              setNameSei()                   Sets the current record's "name_sei" value
 * @method Member              setNameMei()                   Sets the current record's "name_mei" value
 * @method Member              setNameSeiKana()               Sets the current record's "name_sei_kana" value
 * @method Member              setNameMeiKana()               Sets the current record's "name_mei_kana" value
 * @method Member              setMailPc()                    Sets the current record's "mail_pc" value
 * @method Member              setMailPcFlag()                Sets the current record's "mail_pc_flag" value
 * @method Member              setMailMobile()                Sets the current record's "mail_mobile" value
 * @method Member              setMailMobileFlag()            Sets the current record's "mail_mobile_flag" value
 * @method Member              setMailHtmlFlag()              Sets the current record's "mail_html_flag" value
 * @method Member              setMailBlockFlag()             Sets the current record's "mail_block_flag" value
 * @method Member              setPassword()                  Sets the current record's "password" value
 * @method Member              setSex()                       Sets the current record's "sex" value
 * @method Member              setZipCode()                   Sets the current record's "zip_code" value
 * @method Member              setPrefecture()                Sets the current record's "prefecture" value
 * @method Member              setAddress1()                  Sets the current record's "address1" value
 * @method Member              setAddress2()                  Sets the current record's "address2" value
 * @method Member              setJob()                       Sets the current record's "job" value
 * @method Member              setTel()                       Sets the current record's "tel" value
 * @method Member              setNickName()                  Sets the current record's "nick_name" value
 * @method Member              setBirthday()                  Sets the current record's "birthday" value
 * @method Member              setUa()                        Sets the current record's "ua" value
 * @method Member              setMobileDeviceId()            Sets the current record's "mobile_device_id" value
 * @method Member              setTempFlag()                  Sets the current record's "temp_flag" value
 * @method Member              setMailPcApprovalFlag()        Sets the current record's "mail_pc_approval_flag" value
 * @method Member              setMailMobileApprovalFlag()    Sets the current record's "mail_mobile_approval_flag" value
 * @method Member              setViewProducts()              Sets the current record's "ViewProducts" collection
 * @method Member              setFavoriteProducts()          Sets the current record's "FavoriteProducts" collection
 * @method Member              setFavoriteShops()             Sets the current record's "FavoriteShops" collection
 * @method Member              setAttestations()              Sets the current record's "Attestations" collection
 * @method Member              setProductAccessLogs()         Sets the current record's "ProductAccessLogs" collection
 * @method Member              setProductSearchLogs()         Sets the current record's "ProductSearchLogs" collection
 * 
 * @package    cosmedecorte
 * @subpackage model
 * @author     BROADTECH INC.
 * @version    SVN: $Id: Builder.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseMember extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('member');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('name_sei', 'string', 20, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('name_mei', 'string', 20, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('name_sei_kana', 'string', 20, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('name_mei_kana', 'string', 20, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('mail_pc', 'string', 255, array(
             'type' => 'string',
             'email' => true,
             'length' => 255,
             ));
        $this->hasColumn('mail_pc_flag', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             ));
        $this->hasColumn('mail_mobile', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('mail_mobile_flag', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             ));
        $this->hasColumn('mail_html_flag', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             ));
        $this->hasColumn('mail_block_flag', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             ));
        $this->hasColumn('password', 'string', 20, array(
             'type' => 'string',
             'notnull' => true,
             'minlength' => 6,
             'length' => 20,
             ));
        $this->hasColumn('sex', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => '女性',
              1 => '男性',
             ),
             'notnull' => true,
             ));
        $this->hasColumn('zip_code', 'string', 8, array(
             'type' => 'string',
             'notnull' => true,
             'regexp' => '/^[0-9]{3}[\\-]?[0-9]{4}$/',
             'length' => 8,
             ));
        $this->hasColumn('prefecture', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => '北海道',
              1 => '青森県',
              2 => '岩手県',
              3 => '宮城県',
              4 => '秋田県',
              5 => '山形県',
              6 => '福島県',
              7 => '茨城県',
              8 => '栃木県',
              9 => '群馬県',
              10 => '埼玉県',
              11 => '千葉県',
              12 => '東京都',
              13 => '神奈川県',
              14 => '新潟県',
              15 => '富山県',
              16 => '石川県',
              17 => '福井県',
              18 => '山梨県',
              19 => '長野県',
              20 => '岐阜県',
              21 => '静岡県',
              22 => '愛知県',
              23 => '三重県',
              24 => '滋賀県',
              25 => '京都府',
              26 => '大阪府',
              27 => '兵庫県',
              28 => '奈良県',
              29 => '和歌山県',
              30 => '鳥取県',
              31 => '島根県',
              32 => '岡山県',
              33 => '広島県',
              34 => '山口県',
              35 => '徳島県',
              36 => '香川県',
              37 => '愛媛県',
              38 => '高知県',
              39 => '福岡県',
              40 => '佐賀県',
              41 => '長崎県',
              42 => '熊本県',
              43 => '大分県',
              44 => '宮崎県',
              45 => '鹿児島県',
              46 => '沖縄県',
              47 => '日本国外',
             ),
             'notnull' => true,
             ));
        $this->hasColumn('address1', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('address2', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('job', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => '会社員',
              1 => '公務員',
              2 => 'パート・アルバイト',
              3 => '主婦',
              4 => '学生',
              5 => 'その他',
             ),
             'notnull' => true,
             ));
        $this->hasColumn('tel', 'string', 13, array(
             'type' => 'string',
             'notnull' => true,
             'regexp' => '/^[0-9]{2,5}[\\-]?[0-9]{1,4}[\\-]?[0-9]{4}$/',
             'length' => 13,
             ));
        $this->hasColumn('nick_name', 'string', 20, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('birthday', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('ua', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'pc',
              1 => 'mb',
              2 => 'sp',
             ),
             ));
        $this->hasColumn('mobile_device_id', 'string', 64, array(
             'type' => 'string',
             'length' => 64,
             ));
        $this->hasColumn('temp_flag', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             ));
        $this->hasColumn('mail_pc_approval_flag', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             ));
        $this->hasColumn('mail_mobile_approval_flag', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             ));


        $this->index('mail_pc', array(
             'fields' => 
             array(
              0 => 'mail_pc',
             ),
             ));
        $this->index('mail_mobile', array(
             'fields' => 
             array(
              0 => 'mail_mobile',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Product as ViewProducts', array(
             'refClass' => 'ProductView',
             'local' => 'member_id',
             'foreign' => 'product_id'));

        $this->hasMany('Product as FavoriteProducts', array(
             'refClass' => 'ProductFavorite',
             'local' => 'member_id',
             'foreign' => 'product_id'));

        $this->hasMany('Shop as FavoriteShops', array(
             'refClass' => 'ShopFavorite',
             'local' => 'member_id',
             'foreign' => 'shop_id'));

        $this->hasMany('Attestation as Attestations', array(
             'local' => 'id',
             'foreign' => 'member_id'));

        $this->hasMany('ProductAccessLog as ProductAccessLogs', array(
             'local' => 'id',
             'foreign' => 'member_id'));

        $this->hasMany('ProductSearchLog as ProductSearchLogs', array(
             'local' => 'id',
             'foreign' => 'member_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}