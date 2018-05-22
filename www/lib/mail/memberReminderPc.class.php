<?php

class memberReminderPc extends btJapaneseMessage {
    public function __construct($mail, $unique, $flag) {
        parent::__construct();

        if ($flag) {
            $url = "https://".$_SERVER['HTTP_HOST']."/campaign/member/reminder/pw/".$unique."/cp_entry";
        } else { 
            $url = "https://".$_SERVER['HTTP_HOST']."/member/reminder/pw/".$unique;
        }

        $this->setFrom(sfConfig::get('app_member_from_mail'),'COSME DECORTE ');
        $this->setTo($mail);
        $this->setSubject('【COSME DECORTE】パスワード変更URLのお知らせ');
        $this->setBody(
            "=================================================================\n".
            "※このメールは、登録メールアドレス宛に自動的に送信されています。\n".
            "=================================================================\n".
            "\n".
            "パスワードを変更されたい場合は、下記のURLにアクセスしてください。\n".
            "\n".
            $url."\n".
            "\n".
            "※パスワード変更はこのメールの送信時刻から".sfConfig::get('app_member_effective_time').
            "時間までとなります。\n".
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
