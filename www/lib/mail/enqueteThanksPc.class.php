<?php

class enqueteThanksPc extends btJapaneseMessage {
    public function __construct($mail) {
        parent::__construct();

        $this->setFrom(sfConfig::get('app_contact_from_mail'),'COSME DECORTE ');
        $this->setTo($mail);
        $this->setSubject('【COSME DECORTE】ご応募ありがとうございました');
        $this->setBody(
            "=================================================================\n".
            "※このメールは、登録メールアドレス宛に自動的に送信されています。\n".
            "=================================================================\n".
            "\n".
            "プリム ラテ体感キャンペーンにご応募頂きありがとうございました。\n".
            "キャンペーン応募が完了致しましたのでご連絡いたします。\n".
            "当選の発表は商品の発送をもってかえさせていただきます。\n".
            "\n".
            "※キャンペーン期間中に退会いたしますと、応募が無効になる場合が\n".
            "　ございます。\n".
            "※このメールにお心あたりが無い場合には下記の「■お問い合わせ」\n".
            "　までご連絡ください。\n".
            "\n".
            "■お問い合わせ\n".
            "info@cosmedecorte.com\n".
            "\n".
            "■製品についてのお問い合わせはお電話でも受け付けております。\n".
            "コスメデコルテのお客様相談室\n".
            "0120-763-325 ※携帯電話・PHSからも可能\n".
            "受付時間 9:00〜17:00（土・日・祝日・祭日・年末年始・夏季休暇を除く）\n".
            "\n".
            "\n".
            "----------------------------------------------------\n".
            "COSME DECORTE\n".
            "http://www.cosmedecorte.com\n".
            "Copyright (c) Kose Corporation. All rights Reserved.\n".
            "\n"
         );
    }
}
