<?php

class contactThanksMb extends btJapaneseMessage {
    public function __construct($mail) {
        parent::__construct();

        $this->setFrom(sfConfig::get('app_contact_from_mail'),'COSME DECORTE ');
        $this->setTo($mail);
        $this->setSubject('【COSME DECORTE】お問い合わせ受付ました');
        $this->setBody(
            "※このﾒｰﾙは、登録ﾒｰﾙｱﾄﾞﾚｽ宛に自動的に送信されています。\n".
            "\n".  
            "お問い合わせありがとうございました。\n".
            "内容によりお時間がかかる場合がございます。\n".
            "予めご了承くださいますようお願いたします。\n".
            "\n".
            "※このﾒｰﾙにお心あたりが無い場合には下記の".
            "「■お問い合わせ」 までご連絡ください。\n".
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
            "http://www.cosmedecorte.com\n".
            "Copyright (c) Kose Corporation. All rights Reserved.\n".
            "\n"
         );
    }
}
