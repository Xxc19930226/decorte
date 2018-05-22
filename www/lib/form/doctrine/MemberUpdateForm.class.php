<?php

/**
 * Member Update form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: MemberForm.class.php 65 2011-05-24 07:21:32Z oda $
 */
class MemberUpdateForm extends MemberForm
{
    protected $login_member = null;

    public function __construct(
        Member $member = null, Member $login_member)
    {
        $this->login_member = $login_member;
        parent::__construct($member);
    }

    public function configure()
    {
        parent::configure();

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
        if ($this->login_member->getMailPcApprovalFlag() &&
            !$this->login_member->getMailMobileApprovalFlag()) {
            $this->getValidator('mail_pc')->setOption('required', true);
            $this->getValidator('mail_pc')->
                   setMessage('required', 'PCメールアドレスのみ認証しているため必須入力です。');
        }

        // モバイルメールアドレス
        $this->getValidator('mail_mobile')->
            setMessage('invalid', '不正な形式です。');
        if ($this->login_member->getMailMobileApprovalFlag() &&
            !$this->login_member->getMailPcApprovalFlag()) {
            $this->getValidator('mail_mobile')->setOption('required', true);
            $this->getValidator('mail_mobile')->
                   setMessage('required', 'モバイルメールアドレスのみ認証しているため必須入力です。');
        }

        // PCまたはMobileアドレスを比較
        $this->validatorSchema->setPostValidator(
            new sfValidatorAnd(
                 array(new brValidatorMailRequired(
                      array('required' => 'mail_pc'),
                      array('required' => 'PCメールアドレスまたはモバイルメールアドレスを'.
                                          '入力してください。')),
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
                 new brValidatorDoctrineUnique(
                      array('model' => 'Member',
                            'column' => array('mail_pc'),
                            'except' =>
                            $this->login_member ?
                            array('id' => $this->login_member->getId()) :
                            array()),
                      array('invalid' =>
                            'このメールアドレスは既に登録されています。')),
                 new brValidatorDoctrineUnique(
                      array('model' => 'Member',
                            'column' => array('mail_mobile'),
                            'except' =>
                            $this->login_member ?
                            array('id' => $this->login_member->getId()) :
                            array()),
                      array('invalid' =>
                            'このメールアドレスは既に登録されています。'))
        )));
    }
}
