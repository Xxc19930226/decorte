<?php

class memberNewMailMb extends btJapaneseMessage {
    public function __construct($member, $flag) {
        parent::__construct();

        $this->setFrom(sfConfig::get('app_member_from_mail'),'COSME DECORTE ');
        $this->setTo($member['mail_mobile']);

        if ($flag) { // TGCキャンペーン
            $this->setSubject('ﾒｰﾙｱﾄﾞﾚｽ受信確認のお知らせ');
            $this->setBody(
            "※このﾒｰﾙは、登録ﾒｰﾙｱﾄﾞﾚｽ宛に自動的に送信されています。\n".
            "\n".
            "ｺｽﾒﾃﾞｺﾙﾃWEBﾒﾝﾊﾞｰにご登録頂き、誠にありがとうございます。\n".
            "\n".
            "ｺｽﾒﾃﾞｺﾙﾃ対象ﾌﾞﾗﾝﾄﾞｷｬﾝﾍﾟｰﾝ、ﾓﾆﾀｰ等の応募の際には、".
            "下記のEﾒｰﾙｱﾄﾞﾚｽ、ﾊﾟｽﾜｰﾄﾞをご利用ください。\n".
            "PCﾒｰﾙｱﾄﾞﾚｽ、ﾓﾊﾞｲﾙﾒｰﾙｱﾄﾞﾚｽのどちらでもご使用できます。\n".
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
            "\n");
        } else { // 通常
            $this->setSubject('【COSME DECORTE】ﾒｰﾙｱﾄﾞﾚｽ受信確認のお知らせ');
            $this->setBody(
            "※このﾒｰﾙは、登録ﾒｰﾙｱﾄﾞﾚｽ宛に自動的に送信されています。\n".
            "\n".
            "ｺｽﾒﾃﾞｺﾙﾃWEBﾒﾝﾊﾞｰにご登録頂き、誠にありがとうございます。\n".
            "\n".
            "ｺｽﾒﾃﾞｺﾙﾃ対象ﾌﾞﾗﾝﾄﾞｷｬﾝﾍﾟｰﾝ、ﾓﾆﾀｰ等の応募の際には、".
            "下記のEﾒｰﾙｱﾄﾞﾚｽ、ﾊﾟｽﾜｰﾄﾞをご利用ください。\n".
            "PCﾒｰﾙｱﾄﾞﾚｽ、ﾓﾊﾞｲﾙﾒｰﾙｱﾄﾞﾚｽのどちらでもご使用できます。\n".
            "\n".
            "※このﾒｰﾙにお心あたりが無い場合には下記の「■お問い合わせ」".
            "までご連絡ください。\n".
            "\n".
            " Eﾒｰﾙｱﾄﾞﾚｽ  : \n".$member['mail_mobile']."\n".
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
