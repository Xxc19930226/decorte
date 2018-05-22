<?php

class memberReminderThanksPc extends btJapaneseMessage {
    public function __construct($mail) {
        parent::__construct();

        $this->setFrom(sfConfig::get('app_member_from_mail'),'COSME DECORTE ');
        $this->setTo($mail);
        $this->setSubject('【COSME DECORTE】パスワード変更完了のお知らせ');
        $this->setBody(
            "=================================================================\n".
            "※このメールは、登録メールアドレス宛に自動的に送信されています。\n".
            "=================================================================\n".
            "\n".
            "今後、WEBメンバーをご利用になる際は、\n".
            "ご変更になったパスワードでログインしてください。\n".
            "\n".
            "その他、コスメデコルテメンバーやWEBサイトについてなど、\n".
            "お気軽にお問い合わせください。\n".
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
