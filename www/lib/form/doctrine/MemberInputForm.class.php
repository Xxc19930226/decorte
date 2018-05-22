<?php

/**
 * Member Input form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: MemberForm.class.php 65 2011-05-24 07:21:32Z oda $
 */
class MemberInputForm extends MemberForm
{

    protected static $agree_list = array(1 => '同意する',
                                         2 => '同意しない');

    public function configure()
    {
        parent::configure();

        $this->setValidator(
            'password2', new sfValidatorString(
                 array('trim' => true)));

        $this->setValidator(
            'mail_pc2', new sfValidatorEmail(
                 array('trim' => true, 'required' => false)));

        $this->setValidator(
            'mail_mobile2', new sfValidatorEmail(
                 array('trim' => true, 'required' => false)));

        // エラーメッセージ再度出力
        $this->resetToDefaultMessages();

        // 性別
        $this->getValidator('sex')->
            setMessage('required', '必須選択項目です。');

        // 生年月日
        $this->getValidator('birthday')->
            setMessage('required', '必須選択項目です。')->
            setMessage('invalid', '不正な日付です。');
        
        // 職業
        $this->getValidator('job')->
            setMessage('required', '必須選択項目です。')->
            setMessage('invalid', '必須選択項目です。');

        // 郵便番号
        $this->getValidator('zip_code')->
            setMessage('invalid', '半角数字7桁でご入力ください。');

        // 都道府県
        $this->getValidator('prefecture')->
            setMessage('required', '必須選択項目です。')->
            setMessage('invalid', '必須選択項目です。');

        // 電話番号
        $this->getValidator('tel')->
            setMessage('invalid', '半角数字10桁か11桁でご入力ください。');

        // PCメールアドレス
        $this->getValidator('mail_pc')->
            setMessage('invalid', '不正な形式です。');

        // モバイルメールアドレス
        $this->getValidator('mail_mobile')->
            setMessage('invalid', '不正な形式です。');

        // PCメールアドレス(確認)
        $this->setWidget('mail_pc2', new sfWidgetFormInput());
        $this->getWidget('mail_pc2')->setLabel('PCメールアドレス');
        $this->getWidget('mail_pc2')->
            setDefault($this->getObject()->getMailPc());
        $this->getValidator('mail_pc2')->
            setMessage('invalid', '不正な形式です。');
        $fields[] = 'mail_pc2';

        // モバイルメールアドレス(確認)
        $this->setWidget('mail_mobile2', new sfWidgetFormInput());
        $this->getWidget('mail_mobile2')->setLabel('モバイルメールアドレス');
        $this->getWidget('mail_mobile2')->
            setDefault($this->getObject()->getMailMobile());
        $this->getValidator('mail_mobile2')->
            setMessage('invalid', '不正な形式です。');
        $fields[] = 'mail_mobile2';

        // PC または mobile,smart判定
        $sp_ua = sfContext::getInstance()->
                     getConfiguration()->getDeviceType();
        $ua = sfContext::getInstance()->
                     getConfiguration()->getRawDeviceString();

        if ($ua == 'pc') { 
            $this->getValidator('mail_pc')->setOption('required', true);
            $this->getValidator('mail_pc2')->setOption('required', true);
        } elseif ($ua == 'mb') {
            $this->getValidator('mail_mobile')->setOption('required', true);
            $this->getValidator('mail_mobile2')->setOption('required', true);
        } else {
            if ($sp_ua==1) {
               // nothing 
            } else {
                $this->getValidator('mail_mobile')->setOption('required', true);
                $this->getValidator('mail_mobile2')->setOption('required', true);
            } 
        }

        // ログインパスワード(確認)
        $this->setWidget('password2', new sfWidgetFormInputPassword());
        $this->getWidget('password2')->
            setLabel('ログインパスワード(確認)')->
            setOption('always_render_empty', false);
        $this->getWidget('password2')->setAttribute(
            'maxlength',
            $this->getValidator('password')->getOption('max_length'));
        $this->getWidget('password2')->
            setDefault($this->getObject()->getPassword());
        $fields[] = 'password2';

        // 会員規約同意
        $this->setWidget('agree', new brWidgetFormSelectRadio(
                      array('choices' => self::$agree_list)));
        $this->setValidator('agree', new sfValidatorAnd(
                 array(new sfValidatorChoice(
                           array('choices' => array_keys(self::$agree_list))),
                       new sfValidatorNumber(
                           array('max' => 1),
                           array('max' =>
                                 '会員規約に同意してください。'))),
                 array(),
                 array('required' => '必須選択項目です。')));
        $fields[] = 'agree';


        $this->validatorSchema->setPostValidator(
            new sfValidatorAnd(
                array(new brValidatorSchemaCompare(
                      'password', sfValidatorSchemaCompare::IDENTICAL, 'password2',
                      array(),
                      array('invalid' =>
                            'パスワードとパスワード(確認)が異なります。')),
                new brValidatorSchemaCompare(
                      'mail_pc', sfValidatorSchemaCompare::IDENTICAL, 'mail_pc2',
                      array(),
                      array('invalid' =>
                            'PCメールアドレスとPCメールアドレス(確認)が異なります。')),
                new brValidatorSchemaCompare(
                      'mail_mobile', sfValidatorSchemaCompare::IDENTICAL, 'mail_mobile2',
                      array(),
                      array('invalid' =>
                            'モバイルメールアドレスとモバイルメールアドレス(確認)が異なります。')),
                new brValidatorMailFlag(
                      array('number1'  => 'mail_pc_flag',
                            'number2'  => 'mail_pc'),
                      array('required' =>
                            'PCメールアドレスを入力後に選択してください。')),
                new brValidatorMailFlag(
                      array('number1' => 'mail_mobile_flag',
                            'number2' => 'mail_mobile'),
                      array('required' =>
                            'モバイルメールアドレスを入力後に選択してください。')),
                new brValidatorHtmlChk(
                      array('required' => 'mail_html_flag'),
                      array('required' =>
                            'PCまたはモバイルのメールアドレス入力後にチェックしてください。',
                            'repetition' =>
                            '受け取り方法を選択後にチェックしてください。')),
                new brValidatorMailRequiredNew(
                      array('required' => 'mail_pc'),
                      array('required' => 'PCメールアドレスまたはモバイルメールアドレスを'.
                                          '入力してください。')),
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

    }
}
