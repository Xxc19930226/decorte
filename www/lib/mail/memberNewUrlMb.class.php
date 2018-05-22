<?php

class memberNewUrlMb extends btJapaneseMessage {
    public function __construct($mail, $unique, $flag) {
        parent::__construct();

        $this->setFrom(sfConfig::get('app_member_from_mail'),'COSME DECORTE ');
        $this->setTo($mail);
        
        if ($flag) {
            $this->setSubject('本登録URLのお知らせ');
            $this->setBody(
            "※このﾒｰﾙは、登録ﾒｰﾙｱﾄﾞﾚｽ宛に自動的に送信されています。\n".
            "\n".
            "ｺｽﾒﾃﾞｺﾙﾃWEBﾒﾝﾊﾞｰの新規ご登録依頼がありました。\n".
            "間違いない場合は、下記のURLにｱｸｾｽいただくことで本登録となります。\n".
            "PCﾒｰﾙｱﾄﾞﾚｽを記入した方は、PCﾒｰﾙも同時にご確認ください。\n".
            "ﾒｲｸﾊﾟﾀｰﾝのご投票も、下記URLからお進みください。\n".
            "\n".
            "https://".$_SERVER['HTTP_HOST']."/campaign/member/register/".$unique."/cp_entry\n".
            "\n".
            "※本登録はこのメールの送信時刻から".sfConfig::get('app_member_regist_effective_time').
            "時間までとなります。\n".
            "※このﾒｰﾙにお心あたりが無い場合には下記の「■お問い合わせ」まで".
            "ご連絡ください。\n".
            "\n".
            "■お問い合わせ\n".
            "support@club.kose.co.jp\n".
            "\n".
            "\n".
            "COSME DECORTE\n".
            "http://www.cosmedecorte.com/\n".
            "Copyright (c) Kose Corporation. All rights Reserved.\n".
            "\n");
         } else {
            $this->setSubject('【COSME DECORTE】本登録URLのお知らせ');
            $this->setBody(
            "※このﾒｰﾙは、登録ﾒｰﾙｱﾄﾞﾚｽ宛に自動的に送信されています。\n".
            "\n".
            "ｺｽﾒﾃﾞｺﾙﾃWEBﾒﾝﾊﾞｰの新規ご登録依頼がありました。\n".
            "間違いない場合は、下記のURLにｱｸｾｽいただくことで本登録となります。\n".
            "PCﾒｰﾙｱﾄﾞﾚｽを記入した方は、PCﾒｰﾙも同時にご確認ください。\n".
            "\n".
            "https://".$_SERVER['HTTP_HOST']."/member/register/".$unique."\n".
            "\n".
            "※本登録はこのメールの送信時刻から".sfConfig::get('app_member_regist_effective_time').
            "時間までとなります。\n".
            "※このﾒｰﾙにお心あたりが無い場合には下記の「■お問い合わせ」まで".
            "ご連絡ください。\n".
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
            "\n");
         }
    }
}