<?php

class memberDeleteThanksMb extends btJapaneseMessage {
    public function __construct($member) {
        parent::__construct();

        $this->setFrom(sfConfig::get('app_member_from_mail'),'COSME DECORTE ');
        $this->setTo($member['mail_mobile']);
        $this->setBcc(sfConfig::get('app_member_manage_bcc_mail'));
        $this->setSubject('【COSME DECORTE】ご利用頂きありがとうございました。');
        $this->setBody(
            "※このﾒｰﾙは、登録ﾒｰﾙｱﾄﾞﾚｽ宛に自動的に送信されています。\n".
            "\n".
            "このﾒｰﾙはｺｽﾒﾃﾞｺﾙﾃWEBﾒﾝﾊﾞｰより退会の".
            "お手続きをされた方へお送りしております。\n".
            "お客様の退会手続きが完了いたしました。\n".
            "\n". 
            "ご利用頂き誠にありがとうございました。\n".
            "引き続き、ｺｽﾒﾃﾞｺﾙﾃを宜しくお願い申し上げます。\n".
            "\n". 
            "再度、WEBﾒﾝﾊﾞｰﾍﾟｰｼﾞをご利用される際は、".
            "お手数ですが新規登録としてお手続きください。\n".
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
            "info@cosmedecorte.com\n".
            "Copyright (c) Kose Corporation. All rights Reserved.\n".
            "\n"
         );
    }
}
