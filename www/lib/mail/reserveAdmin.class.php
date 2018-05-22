<?php

class reserveAdmin extends btJapaneseMessage {
    public function __construct($reserve) {
        parent::__construct();

        $this->setFrom(
            sfConfig::get('app_reserve_from_mail'), 'COSME DECORTE ');
        $this->setTo($reserve->getShop()->getEmail());
        $this->setSubject('サロンド ボーテ コスメデコルテ 予約案内');
        $this->setBody(
            "お客様から、予約希望のメールが届きました。\n".
            "\n".
            "予約希望一覧画面より確認して下さい。\n".
            "\n".
            "----------------------------------------------------\n".
            "COSME DECORTE\n".
            "http://www.cosmedecorte.com\n".
            "Copyright (c) Kose Corporation. All rights Reserved.\n".
            "\n"
         );
    }
}
