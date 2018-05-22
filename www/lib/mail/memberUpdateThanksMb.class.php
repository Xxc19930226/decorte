<?php

class memberUpdateThanksMb extends btJapaneseMessage {
    public function __construct($member) {
        parent::__construct();

        $this->setFrom(sfConfig::get('app_member_from_mail'),'COSME DECORTE ');
        $this->setTo($member['mail_mobile']);
        $this->setSubject('【COSME DECORTE】登録情報変更完了のお知らせ');
        $this->setBody(
            "※このﾒｰﾙは、登録ﾒｰﾙｱﾄﾞﾚｽ宛に自動的に送信されています。\n".
            "\n".
            "この度は、ｺｽﾒﾃﾞｺﾙﾃWEBﾒﾝﾊﾞｰ登録情報ご変更のお手続き、".
            "ありがとうございました。\n".
            "お手続き頂きました登録情報を変更しましたのでお知らせします。\n".
            "\n".
            "※このﾒｰﾙにお心あたりが無い場合には下記の「■お問い合わせ」".
            "までご連絡ください。\n".
            "\n".
            " Eﾒｰﾙｱﾄﾞﾚｽ  : \n".$member['mail_mobile']."\n".
            "\n".
            "ｺｽﾒﾃﾞｺﾙﾃﾒﾝﾊﾞｰやWEBｻｲﾄについてなど、お気軽に「info@cosmedecorte.com」まで".
            "お問い合わせください。\n".
            "ご質問の内容によりご返信までお時間を頂く事がございます。\n".
            "予めご了承ください。\n".
            "\n".
            "■お問い合わせ\n".
            "info@cosmedecorte.com\n".
            "\n".
            "■製品についてのお問い合わせはお電話でも受け付けております。\n".
            "ｺｽﾒﾃﾞｺﾙﾃのお客様相談室\n".
            "0120-763-325 ※携帯電話・PHSからも可能\n".
            "受付時間 9:00〜17:00（土・日・祝日・祭日・年末年始・夏季休暇を除く）\n".
            "\n".
            "COSME DECORTE\n".
            "http://www.cosmedecorte.com/\n".
            "Copyright (c) Kose Corporation. All rights Reserved.\n".
            "\n"
        );
    }
}
