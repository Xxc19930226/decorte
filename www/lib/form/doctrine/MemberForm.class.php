<?php

/**
 * Member form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: MemberForm.class.php 939 2011-07-14 08:11:04Z namekawa $
 */
class MemberForm extends BaseMemberForm
{
    public function configure()
    {
        // お名前(姓)
        $this->setValidator(
            'name_sei', new brValidatorFullwidthString(
                  array('fullwidth' => true),
                  array('fullwidth' => '全角で入力してください。')));

        // お名前(めい)
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

        // PCメールアドレス
        $this->setValidator(
            'mail_pc', new brValidatorPcEmail(
                      array('required' => false),
                      array('invalid_pc' =>
                            'PC形式のメールアドレスを入力してください。')));

        // モバイルメールアドレス
        $this->setValidator(
            'mail_mobile', new brValidatorMobileEmail(
                      array('required' => false),
                      array('invalid_mb' =>
                            'モバイル形式のメールアドレスを入力してください。')));

        // エラーメッセージ出力
        $this->resetToDefaultMessages();

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

        // 性別
        $this->getWidget('sex')->
            setLabel('性別')->
            setOption('renderer_class' , 'brWidgetFormSelectRadio');
        $fields[] = 'sex';

        // 生年月日
        $years = range(date('Y'), 1920);
        $years = array_combine($years, $years);
        $this->getWidget('birthday')->
            setLabel('誕生日')->
            setOption('format', '%year%年%month%月%day%日')->
            setOption('years', $years);
        $fields[] = 'birthday';

        // 職業
        $jobs = $this->getWidget('job')->
                          setOption('renderer_options','job')->
                          getChoices();
        array_unshift($jobs, "");
        $this->setWidget('job', new sfWidgetFormChoice(
            array('choices' => $jobs)));
        $this->getWidget('job')->setLabel('職業');
        $fields[] = 'job';

        // 郵便番号
        $this->getWidget('zip_code')->setLabel('郵便番号');
        $fields[] = 'zip_code';

        // 都道府県
        $prefectures = $this->getWidget('prefecture')->
                           setOption('renderer_options','prefecture')->
                           getChoices();
        array_unshift($prefectures, "");
        $this->setWidget('prefecture', new sfWidgetFormChoice(
            array('choices' => $prefectures)));
        $this->getWidget('prefecture')->setLabel('都道府県');
        $fields[] = 'prefecture';

        // 住所1
        $this->getWidget('address1')->setLabel('住所1');
        $fields[] = 'address1';

        // 住所2
        $this->getWidget('address2')->setLabel('住所2');
        $fields[] = 'address2';

        // 電話番号
        $this->getWidget('tel')->setLabel('電話番号');
        $fields[] = 'tel';

        // PCメールアドレス
        $this->getWidget('mail_pc')->setLabel('PCメールアドレス');
        $this->getValidator('mail_pc')->setOption('trim', true);
        $fields[] = 'mail_pc';

        // モバイルメールアドレス
        $this->getWidget('mail_mobile')->setLabel('モバイルメールアドレス');
        $this->getValidator('mail_mobile')->setOption('trim', true);
        $fields[] = 'mail_mobile';

        //会員ログインID
        $this->getWidget('nick_name')->setLabel('会員ログインID');
        $this->getValidator('nick_name')->setOption('trim', true);
        $fields[] = 'nick_name';

        // ログインパスワード
        $this->setWidget('password', new sfWidgetFormInputPassword());
        $this->getWidget('password')->
            setLabel('ログインパスワード')->
            setOption('always_render_empty', false);
        $fields[] = 'password';

        // PCメルマガ希望フラグ
        $this->getWidget('mail_pc_flag')->
            setLabel('PCメルマガ希望フラグ');
        $fields[] = 'mail_pc_flag';

        // モバイルメルマガ希望フラグ
        $this->getWidget('mail_mobile_flag')->
            setLabel('モバイルメルマガ希望フラグ');
        $fields[] = 'mail_mobile_flag';

        // 配信形式
        $this->getWidget('mail_html_flag')->
            setLabel('配信形式');
        $fields[] = 'mail_html_flag';

        // メルマガ配信ブロックフラグ
        $this->getWidget('mail_block_flag')->
            setLabel('メルマガ配信ブロックフラグ');
        $fields[] = 'mail_block_flag';

        // モバイル端末ID
        $this->getWidget('mobile_device_id')->setLabel('モバイル端末ID');
        $fields[] = 'mobile_device_id';

        // UA
        $this->getWidget('ua')->
            setLabel('UA')->
            setOption('renderer_class' , 'brWidgetFormSelectRadio');
        $fields[] = 'ua';

        // 仮登録フラグ
        $this->getWidget('temp_flag')->setLabel('仮登録フラグ');
        $fields[] = 'temp_flag';

        $this->widgetSchema->setHelps(
            array('zip_code' => '例) 103-8251',
                  'tel' => '例) 0120-763-325'));

        $this->validatorSchema->setPostValidator(
            new sfValidatorAnd(
                array(new brValidatorMailFlag(
                          array('number1'  => 'mail_pc_flag',
                                'number2'  => 'mail_pc'),
                          array('required' =>
                                'PCメールアドレスを入力後に選択してください。')),
                      new brValidatorMailFlag(
                          array('number1' => 'mail_mobile_flag',
                                'number2' => 'mail_mobile'),
                          array('required' =>
                                'モバイルメールアドレスを入力後に選択してください。')),
                      new brValidatorDoctrineUnique(
                          array('model' => 'Member',
                                'column' => array('mail_pc')),
                          array('invalid' =>
                                'このメールアドレスは既に登録されています。')),
                      new brValidatorDoctrineUnique(
                          array('model' => 'Member',
                                'column' => array('mail_mobile')),
                          array('invalid' =>
                                'このメールアドレスは既に登録されています。'))
        )));

        $this->useFields($fields);
    }
}
