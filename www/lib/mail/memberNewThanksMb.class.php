<?php

class memberNewThanksMb extends btJapaneseMessage {
    public function __construct($member, $flag) {
        parent::__construct();

        $name_sei = mb_convert_encoding($member['name_sei'], 'utf-8');
        $name_mei = mb_convert_encoding($member['name_mei'], 'utf-8');

        $this->setFrom(sfConfig::get('app_member_from_mail'),'COSME DECORTE ');
        $this->setTo($member['mail_mobile']);
        $this->setBcc(sfConfig::get('app_member_manage_bcc_mail'));

        if ($flag) { // TGCキャンペーン
            $this->setSubject('ご登録及びご投票完了のお知らせ');
            $this->setBody(
            "※このﾒｰﾙは、登録ﾒｰﾙｱﾄﾞﾚｽ宛に自動的に送信されています。\n".
            "\n".
            $name_sei."  ".$name_mei."様\n" .
            "\n" .
            "ｺｽﾒﾃﾞｺﾙﾃWEBﾒﾝﾊﾞｰにご登録及びご投票頂き、誠にありがとうございます。\n".
            "ﾒｲｸﾊﾟﾀｰﾝへのご投票が、完了致しましたのでご連絡いたします。\n".
            "\n".
            "尚、ｺｽﾒﾃﾞｺﾙﾃ対象ﾌﾞﾗﾝﾄﾞｷｬﾝﾍﾟｰﾝ、ﾓﾆﾀｰ等の応募の際には、".
            "下記のEﾒｰﾙｱﾄﾞﾚｽをご利用ください。\n".
            "Eﾒｰﾙｱﾄﾞﾚｽ、ﾊﾟｽﾜｰﾄﾞは次回以降、会員ﾛｸﾞｲﾝしていただく際に".
            "必要となりますのでお忘れにならない様にお願い致します。\n".
            "\n".
            "※このﾒｰﾙにお心あたりが無い場合には下記の「■お問い合わせ」".
            "までご連絡ください。\n".
            "\n".
            " Eﾒｰﾙｱﾄﾞﾚｽ  : \n".$member['mail_mobile']."\n".
            "\n".
            "■お問い合わせ\n".
            "support@club.kose.co.jp\n".
            "\n".
            "COSME DECORTE\n".
            "http://www.cosmedecorte.com/\n".
            "Copyright (c) Kose Corporation. All rights Reserved.\n".
            "\n" );
        } else { // 通常 
            $this->setSubject('【COSME DECORTE】ご登録完了のお知らせ');
            $this->setBody(
            "※このﾒｰﾙは、登録ﾒｰﾙｱﾄﾞﾚｽ宛に自動的に送信されています。\n".
            "\n".
            $name_sei."  ".$name_mei."様\n" .
            "\n" .
            "ｺｽﾒﾃﾞｺﾙﾃWEBﾒﾝﾊﾞｰにご登録頂き、誠にありがとうございます。\n".
            "\n".
            "WEBﾒﾝﾊﾞｰの皆様にはいち早く、ｺｽﾒﾃﾞｺﾙﾃの新しい情報を".
            "ご登録のﾒｰﾙｱﾄﾞﾚｽへお知らせいたします。\n".
            "\n".
            "尚、ｺｽﾒﾃﾞｺﾙﾃ対象ﾌﾞﾗﾝﾄﾞｷｬﾝﾍﾟｰﾝ、ﾓﾆﾀｰ等の応募の際には、".
            "下記のEﾒｰﾙｱﾄﾞﾚｽをご利用ください。\n".
            "Eﾒｰﾙｱﾄﾞﾚｽ、ﾊﾟｽﾜｰﾄﾞは次回以降、会員ﾛｸﾞｲﾝしていただく際に".
            "必要となりますのでお忘れにならない様にお願い致します。\n".
            "\n".
            "※このﾒｰﾙにお心あたりが無い場合には下記の「■お問い合わせ」".
            "までご連絡ください。\n".
            "\n".
            " Eﾒｰﾙｱﾄﾞﾚｽ  : \n".$member['mail_mobile']."\n".
            "\n".
            "□その他、ｺｽﾒﾃﾞｺﾙﾃWEBﾒﾝﾊﾞｰやWEBｻｲﾄについてなどの\n".
            "ご質問などございましたら、お気軽に下記までお問い合わせください。\n".
            "お問い合せ内容によっては、電話やお手紙でお答えする場合もございます。\n".
            "なお、ご質問の内容によりご返答までお時間を頂く事がございます。\n".
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
            "\n" );
        }
    }
}
