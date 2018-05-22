<?php

/**
 * SalonReserve form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class SalonReserveForm extends BaseSalonReserveForm
{
    protected $shop = null;

    public function months()
    {
        $start_date = null;

        $omote_sando_flg = false;
        if ($this->shop &&
            mb_convert_encoding(
                $this->shop->getName(),
                'UTF-8', sfConfig::get('sf_charset')) == '表参道店') {
            $omote_sando_flg = true;
        }

        $base_timestamp = date('Y-m-d');
        if ($start_date) {
            $start_date = strtotime($start_date);
            $end_date = strtotime('+60 day', $start_date);
        } else {
            $start_date = strtotime('+2 day', strtotime($base_timestamp));
            $end_date = strtotime('+63 day', strtotime($base_timestamp));
        }
        $smonth = date('m', $start_date);
        $sday = date('d', $start_date);
        $emonth = date('m', $end_date);
        $eday = date('d', $end_date);
        $year = date('Y', $start_date);
        $week = array('日', '月', '火', '水', '木', '金', '土');

        if ($smonth > $emonth) {
            for($i=$smonth; $i <= 12; $i++) {
                $months["$i"] = $i;
                $years["$i"] = $year;
            }
            if ($i == 13) {
                for($i = 1; $i <= $emonth; $i++) {
                    $months["$i"] = $i;
                    $years["$i"] = $year+1;
                }
            }
        } else {
            for ($i = $smonth; $i <= $emonth; $i++) {
                $months["$i"] = $i;
                $years["$i"] = $year;
            }
        }
        $lastday = array(0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $year = date("Y");
        if (($year %4 == 0 && $year %100 != 0) || $year %400 == 0) {
            $lastday[2] = 29;
        }
        $date[0] = "---";
        if ($this->shop) {
            foreach ($months as $key => $month) {
                $num = (int)$month;
                $start = 1;
                $end = $lastday[$num];

                if ($smonth == $month) {
                    $start = (int)$sday;
                }
                if ($emonth == $month) {
                    $end = (int)$eday;
                }

                for ($i = $start; $i <= $end; $i++) {
                    $y = $years["$key"];
                    $m = sprintf('%02d', $month);
                    $d = sprintf('%02d', $i);

                    $ymd = $y . $m . $d;
                    if ($omote_sando_flg) {
                        if (preg_match('/1231$/', $ymd) ||
                            preg_match('/010[1-4]$/', $ymd)) {
                            continue;
                        }
                    } else {
                        if (preg_match('/0101$/', $ymd)) {
                            continue;
                        }
                    }

                    $date["$y$m$d"] = $y . "年" . $m . "月" . $d . "日";
                    $date["$y$m$d"] .= "（" .
                        $week[date(
                            "w", mktime(0, 0, 0, $month, $i, $years["$key"]))] .
                        "）";
                }
            }
        }
        return $date;
    }

    public function getDateMbString($value)
    {
        $months = $this->months();
        if ($value > 0) {
            return mb_convert_encoding(
                $months[$value], sfConfig::get('sf_charset'), 'UTF-8');
        } else {
            return '';
        }
    }

    public function getDateString($value)
    {
        $months = $this->months();
        if ($value > 0) {
            return $months[$value];
        } else {
            return '';
        }
    }

    public function getMenuMbString($value)
    {
        $menu = SalonShopMenuTable::getInstance()->find($value);
        if ($menu) {
            return $menu->getMbName();
        } else {
            return '';
        }
    }

    public function getMenuString($value)
    {
        $menu = SalonShopMenuTable::getInstance()->find($value);
        if ($menu) {
            return $menu->getName();
        } else {
            return '';
        }
    }

    protected function resetHopeDate()
    {
        $months = $this->months();

        // 第1希望日
        $this->getWidget('hope_date1')->setLabel('第１希望日');
        $this->setWidget(
            'hope_date1', new sfWidgetFormSelect(array('choices' => $months)));
        $this->setValidator(
            'hope_date1',
            new sfValidatorChoice(
                array('choices' => array_keys($months))),
            array('required' => false));

        // 第2希望日
        $this->getWidget('hope_date2')->setLabel('第２希望日');
        $this->setWidget(
            'hope_date2', new sfWidgetFormSelect(array('choices' => $months)));
        $this->setValidator(
            'hope_date2',
            new sfValidatorChoice(
                array('choices' => array_keys($months))),
            array('required' => false));

        // 第3希望日
        $this->getWidget('hope_date3')->setLabel('第３希望日');
        $this->setWidget(
            'hope_date3', new sfWidgetFormSelect(array('choices' => $months)));
        $this->setValidator(
            'hope_date3',
            new sfValidatorChoice(
                array('choices' => array_keys($months))),
            array('required' => false));
    }

    protected function resetMenu()
    {
        $menu_choices = array();
        if ($this->shop) {
            $conf = sfContext::getInstance()->getConfiguration();

            $menus = $this->shop->getMenus();
            foreach ($menus as $menu) {
                $menu_choices[$menu->getId()] =
                    mb_convert_encoding(
                        $conf->getRawDeviceString() == 'mb' ?
                        $menu->getMbName() : $menu->getName(),
                        'UTF-8', sfConfig::get('sf_charset'));
            }
            $this->setValidator(
                'menu', new sfValidatorChoice(
                    array('choices' => array_keys($menu_choices))));
            $this->getValidator('menu')->
                setMessage('invalid', '不正な値です。');
        } else {
            $this->setValidator('menu', new sfValidatorString());
        }
        $this->setWidget(
            'menu', new sfWidgetFormChoice(
                array('choices' => array('' => '---') + $menu_choices)));
        $this->getWidget('menu')->setLabel('ご希望のメニュー');
        $this->getWidget('menu')->
            setOption('renderer_class', 'brWidgetFormSelect');
        $this->getValidator('menu')->
            setMessage('required', '必須選択項目です。');
    }

    public function __construct($obj = null)
    {
        if ($obj) {
            if ($obj instanceof SalonShop) {
                $this->shop = $obj;
                parent::__construct();
            } else if ($obj instanceof SalonReserve) {
                $this->shop = $obj->getShop();
                parent::__construct($obj);
            }
        } else {
            parent::__construct();
        }
    }

    public function configure()
    {
        $visits = array();
        $visits[''] = '--';
        $visits['初めて'] = '初めて';
        $shops = SalonShopTable::getInstance()->findAll();
        foreach ($shops as $shop) {
            $shop_name = $shop->getName();
            $shop_name = mb_convert_encoding(
                $shop_name, 'UTF-8', sfConfig::get('sf_charset'));
            $visits[$shop_name . '来店あり'] = $shop_name . '来店あり';
        }
        $visits['両方来店あり'] = '両方来店あり';

        // 来店回数
        $this->setValidator(
            'visit', new sfValidatorChoice(
                array('choices' => array_keys($visits))));

        // お名前(姓)
        $this->setValidator(
            'name_sei', new brValidatorFullwidthString(
                  array('fullwidth' => true),
                  array('fullwidth' => '全角で入力してください。')));

        // お名前(名)
        $this->setValidator(
            'name_mei', new brValidatorFullwidthString(
                  array('fullwidth' => true),
                  array('fullwidth' => '全角で入力してください。')));

        // お名前(せい)
        $this->setValidator(
            'name_sei_kana', new brValidatorJapaneseString(
                  array('fullwidth_hiragana' => true),
                  array('fullwidth_hiragana' =>
                        '全角又は半角カタカナで入力してください。')));

        // お名前(めい)
        $this->setValidator(
            'name_mei_kana', new brValidatorJapaneseString(
                  array('fullwidth_hiragana' => true),
                  array('fullwidth_hiragana' =>
                        '全角又は半角カタカナで入力してください。')));

        // 年齢
        $this->setValidator(
            'age', new sfValidatorNumber(
                          array('min' => 9 ),
                          array('min' => '1桁以上で入力してください。',
                                'invalid' => '不正な値です。' )));

        // メールアドレス確認
        $this->setValidator(
            'email2', new sfValidatorEmail(
                 array('trim' => true, 'required' => true)));

        // エラーメッセージ出力
        $this->resetToDefaultMessages();

        // ご希望店舗
        $this->getWidget('shop_id')->setLabel('ご希望店舗')->
            setOption('renderer_class' , 'brWidgetFormSelectRadio')->
            setOption('expanded', true);
        $fields[] = 'shop_id';

        // 来店回数
        $this->setWidget(
            'visit', new sfWidgetFormChoice(
                array('label' => '来店回数',
                      'choices' => $visits)));
        $this->getValidator('visit')->
            setMessage('required', '必須選択項目です。');
        $fields[] = 'visit';

        // 会員ＩＤ（メンバーズカード）
        $this->getWidget('members_card_id')->setLabel('会員ID');
        $this->getValidator('members_card_id')->setOption('trim', true);
        $this->getValidator('members_card_id')->setOption('required', false);
        $fields[] = 'members_card_id';

        // お名前(姓)
        $this->getWidget('name_sei')->setLabel('お名前(姓)');
        $this->getValidator('name_sei')->setOption('trim', true);
        $fields[] = 'name_sei';

        // お名前(名)
        $this->getWidget('name_mei')->setLabel('お名前(名)');
        $this->getValidator('name_mei')->setOption('trim', true);
        $fields[] = 'name_mei';

        // お名前(せい)
        $this->getWidget('name_sei_kana')->setLabel('お名前(せい)');
        $this->getValidator('name_sei_kana')->setOption('trim', true);
        $fields[] = 'name_sei_kana';

        // お名前(めい)
        $this->getWidget('name_mei_kana')->setLabel('お名前(めい)');
        $this->getValidator('name_mei_kana')->setOption('trim', true);
        $fields[] = 'name_mei_kana';

        // 年齢
        $this->getWidget('age')->setLabel('ご年齢');
        $this->getValidator('age')->setOption('trim', true);
        $this->getValidator('age')->setOption('required', false);
        $fields[] = 'age';

        // 住所
        $this->getWidget('address')->setLabel('ご住所');
        $this->getValidator('address')->setOption('trim', true);
        $fields[] = 'address';

        // 電話番号
        $this->getWidget('tel')->setLabel('お電話番号');
        $fields[] = 'tel';

        // メールアドレス
        $this->getWidget('email')->setLabel('メールアドレス');
        $this->getValidator('email')->setOption('trim', true);
        $this->getValidator('email')->setOption('required', true);
        $this->getValidator('email')->
            setMessage('invalid', '不正な形式です。');
        $fields[] = 'email';

        // メールアドレス(確認)
        $this->setWidget('email2', new sfWidgetFormInput());
        $this->getWidget('email2')->setLabel('メールアドレス(確認)');
        $this->getWidget('email2')->
            setDefault($this->getObject()->getEmail());
        $this->getValidator('email2')->
            setMessage('invalid', '不正な形式です。');
        $fields[] = 'email2';

        // ご希望日時
        $this->resetHopeDate();
        $fields[] = 'hope_date1';
        $fields[] = 'hope_date2';
        $fields[] = 'hope_date3';

        // 第１希望時間
        $fields[] = 'hope_time1';

        // 第２希望時間
        $fields[] = 'hope_time2';

        // 第３希望時間
        $fields[] = 'hope_time3';

        // ご希望のメニュー
        $this->resetMenu();
        $fields[] = 'menu';

        // 当サイトをどちらでお知りになられましたか？
        $this->getWidget('know')->setLabel('当サイトをどちらでお知りになられましたか？');
        $fields[] = 'know';

        // ご意見・ご要望
        $this->getWidget('request')->setLabel('ご意見・ご要望');
        $fields[] = 'request';

        // 個人情報の取扱いについて
        $this->setWidget('agree', new sfWidgetFormInputCheckbox(
                      array('value_attribute_value'=>1)));
        $this->getWidget('agree')->setLabel('個人情報の取扱いについて');
        $this->setValidator(
            'agree', new sfValidatorNumber(
                 array('required' => true),
                 array('required' => '個人情報の取扱いに同意してください。')));
        $fields[] = 'agree';

        // メール返信
        $fields[] = 'reply';

        // 削除フラグ
        $fields[] = 'delete_flag';

        $this->validatorSchema->setPostValidator(
            new sfValidatorAnd(
                array(new brValidatorSchemaCompare(
                          'email', sfValidatorSchemaCompare::IDENTICAL,
                          'email2',
                          array(),
                          array('invalid' =>
                                'メールアドレスとメールアドレス（確認）が' .
                                '異なります。')),
                      new brValidatorReserveDate(
                          array('number1' => 'hope_date1',
                                'number2' => 'hope_time1'),
                          array('required' => '第１希望日は必須選択項目です。',
                                'invalid' => '第１希望日は不正な値です。')),
                      new brValidatorReserveDate(
                          array('required' => false,
                                'number1' => 'hope_date2',
                                'number2' => 'hope_time2'),
                          array('invalid' => '第２希望日は不正な値です。')),
                      new brValidatorReserveDate(
                          array('required' => false,
                                'number1' => 'hope_date3',
                                'number2' => 'hope_time3'),
                          array('invalid' => '第３希望日は不正な値です。')))));

        $this->useFields($fields);
    }

    public function bind(
        array $taintedValues = null, array $taintedFiles = null)
    {
        if ($taintedValues && isset($taintedValues['shop_id'])) {
            $this->shop =
                SalonShopTable::getInstance()->find($taintedValues['shop_id']);
            $this->setup();
            $this->configure();
            $this->addCSRFProtection($this->localCSRFSecret);
            self::$dispatcher->
                notify(new sfEvent($this, 'form.post_configure'));
        }

        return parent::bind($taintedValues, $taintedFiles);
    }
}
