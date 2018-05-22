<?php

class cpMemberNewUrlMb extends btJapaneseMessage {
    public function __construct($member) {
        parent::__construct();

        $this->setFrom(sfConfig::get('app_member_from_mail'),'COSME DECORTE ');
        $this->setTo($member['mail_mobile']);
        $this->setSubject('ご投票完了のお知らせ');
        $this->setBody(
            "※このﾒｰﾙは、登録ﾒｰﾙｱﾄﾞﾚｽ宛に自動的に送信されています。\n".
            "\n".
            "この度は、ご投票頂きありがとうございました。\n".
            "ﾒｲｸﾊﾟﾀｰﾝのご投票が、完了致しましたのでご連絡いたします。\n".
            "\n".
            "※このﾒｰﾙにお心あたりが無い場合には下記の「■お問い合わせ」".
            "までご連絡ください。\n".
            "\n".
            "■お問い合わせ\n".
            "support@club.kose.co.jp\n".
            "\n".
            "COSME DECORTE\n".
            "http://www.cosmedecorte.com/\n".
            "Copyright (c) Kose Corporation. All rights Reserved.\n".
            "\n"
        );
    }
}
