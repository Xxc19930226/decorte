<?php

/**
 * Contact form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class ContactForm extends BaseForm
{
    protected static $tel_list = array(1 => '自宅',
                                       2 => '携帯',
                                       3 => '会社');

    protected static $sex_list = array(1 => '女性',
                                       2 => '男性');

    protected static $prefecture_list = array(0=>'-----',
        1=>'北海道',2=>'青森県',3=>'岩手県',4=>'宮城県',5=>'秋田県',
        6=>'山形県',7=>'福島県',8=>'茨城県',9=>'栃木県',10=>'群馬県',
        11=>'埼玉県',12=>'千葉県',13=>'東京都',14=>'神奈川県',15=>'新潟県',
        16=>'富山県',17=>'石川県',18=>'福井県',19=>'山梨県',20=>'長野県',
        21=>'岐阜県',22=>'静岡県',23=>'愛知県',24=>'三重県',25=>'滋賀県',
        26=>'京都府',27=>'大阪府',28=>'兵庫県',29=>'奈良県',30=>'和歌山県',
        31=>'鳥取県',32=>'島根県',33=>'岡山県',34=>'広島県',35=>'山口県',
        36=>'徳島県',37=>'香川県',38=>'愛媛県',39=>'高知県',40=>'福岡県',
        41=>'佐賀県',42=>'長崎県',43=>'熊本県',44=>'大分県',45=>'宮崎県',
        46=>'鹿児島県',47=>'沖縄県'
    );


    public function configure()
    {
        // 商品名
        $this->setWidget('articles_name', new sfWidgetFormInputText());
        $this->setValidator(
            'articles_name', new sfValidatorString(
                     array('trim' => true)));

        // 内容
        $this->setWidget('content', new sfWidgetFormTextarea());
        $this->setValidator(
            'content', new sfValidatorString(
                     array('trim' => true, 'max_length' => 1000)));
        // 名前（姓）
        $this->setWidget('name_sei', new sfWidgetFormInputText());
        $this->setValidator(
            'name_sei', new sfValidatorString(array('trim' => true )));

        // 名前（名）
        $this->setWidget('name_mei', new sfWidgetFormInputText());
        $this->setValidator(
            'name_mei', new sfValidatorString(array('trim' => true )));

        // ふりがな（せい）
        $this->setWidget('name_sei_kana', new sfWidgetFormInputText());
        $this->setValidator(
            'name_sei_kana', new brValidatorJapaneseString(
                  array('fullwidth_hiragana' => true),
                  array('fullwidth_hiragana' => '全角ひらがなで入力してください。')));

        // ふりがな（めい）
        $this->setWidget('name_mei_kana', new sfWidgetFormInputText());
        $this->setValidator(
            'name_mei_kana', new brValidatorJapaneseString(
                  array('fullwidth_hiragana' => true),
                  array('fullwidth_hiragana' => '全角ひらがなで入力してください。')));

        // メールアドレス
        $this->setWidget('email', new sfWidgetFormInputText());
        $this->setValidator(
            'email', new sfValidatorEmail(
                array('trim' => true),
                array('required' => '必須入力項目です。',
                      'invalid' => '形式に誤りがあります。')));

        // メールアドレス(確認)
        $this->setWidget('email2', new sfWidgetFormInputText());
        $this->setValidator(
            'email2', new sfValidatorString(array('trim' => true)));

        // 郵便番号
        $this->setWidget('zip_code', new sfWidgetFormInputText());

        // 都道府県
        $this->setWidget('prefecture', new sfWidgetFormSelect(
                      array('choices' => self::$prefecture_list)));

        //市区町村・番地
        $this->setWidget('address1', new sfWidgetFormInputText());
        $this->setValidator(
            'address1', new sfValidatorString(array('trim' => true)));

        // アパート・マンション名・号室
        $this->setWidget('address2', new sfWidgetFormInputText());
        $this->setValidator(
            'address2', new sfValidatorString(
                      array('trim' => true, 'required' => false)));

        // 電話番号
        $this->setWidget('tel_type', new sfWidgetFormSelectRadio(
                      array('choices' => self::$tel_list,
                            'formatter' => array($this, 'formatRadio'))));
        $this->setWidget('tel', new sfWidgetFormInputText());

        // 性別
        $this->setWidget('sex', new sfWidgetFormSelectRadio(
                      array('choices' => self::$sex_list,
                            'formatter' => array($this, 'formatRadio'))));
        $this->setValidator(
            'sex', new sfValidatorChoice(
                array('choices' => array_keys(self::$sex_list),
                      'required' => false)));

        // 年齢
        $this->setWidget('age', new sfWidgetFormInputText());

        // エラーメッセージ出力
        $this->resetToDefaultMessages();

        // バリデーションエラーメッセージ出力いかに集める
        $this->setValidator(
            'tel_type', new sfValidatorChoice(
                array('choices' => array_keys(self::$tel_list)),
                array('required' => '必須選択項目です。')));

        $this->setValidator(
            'prefecture', new sfValidatorAnd(
                 array(new sfValidatorChoice(
                          array('choices' =>
                          array_keys(self::$prefecture_list))),
                       new sfValidatorNumber(
                          array('min' => 1),
                          array('min' => '必須選択項目です。')))));

        $this->setValidator(
            'age', new sfValidatorAnd(
                 array(new sfValidatorString(
                          array('trim' => true)),
                       new sfValidatorNumber(
                          array('min' => 9 ),
                          array('min' => '一桁以上で入力してください。',
                                'invalid' => '不正な値です。' ))),
            array('trim' => true, 'required' => false)));

        $this->setValidator(
            'tel', new sfValidatorRegex(
                array('pattern' => '/^[0-9]{2,5}[\-]?[0-9]{1,4}[\-]?[0-9]{4}$/'),
                array('required' => '必須入力項目です。',
                      'invalid'  =>
                      '半角数字10桁か11桁でご入力ください。')));

        $this->setValidator(
            'zip_code', new sfValidatorRegex(
                array('pattern' => '/^[0-9]{3}[\-]?[0-9]{4}$/'),
                array('required' => '必須入力項目です。',
                      'invalid' =>
                      '半角数字7桁でご入力ください。')));

        $this->validatorSchema->setPostValidator(
            new brValidatorSchemaCompare(
                'email', sfValidatorSchemaCompare::IDENTICAL, 'email2',
                 array(),
                 array('invalid' =>
                       'メールアドレスとメールアドレス（確認）が異なります。')));

        $this->widgetSchema->setNameFormat($this->getName() . '[%s]');
    }

    public function getName()
    {
        return 'contact';
    }

    public function getPrefectureString($value) {
        foreach(self::$prefecture_list as $key => $pre) {
            if ($value==$pre)
                return $key;
        }
        return null;
    }

    public function getSexString($value) {
        foreach(self::$sex_list as $key => $sex) {
            if ($value==$sex)
                return $key;
        }
        return null;
    }

    public function getSex($value) {
        return mb_convert_encoding(
            self::$sex_list[$value],
            sfConfig::get('sf_charset'), 'UTF-8');
    }

    public function getTelType($value) {
        return mb_convert_encoding(
            self::$tel_list[$value],
            sfConfig::get('sf_charset'), 'UTF-8');
    }

    public function getPrefecture($value) {
        return mb_convert_encoding(
            self::$prefecture_list[$value],
            sfConfig::get('sf_charset'), 'UTF-8');
    }

}
