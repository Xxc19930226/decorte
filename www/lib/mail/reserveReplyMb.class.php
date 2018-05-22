<?php

class reserveReplyMb extends btJapaneseMessage {
    public function __construct($mail, $subject, $body) {
        parent::__construct();

        $this->setFrom(
            sfConfig::get('app_reserve_from_mail'),
            'salon de beaute COSMEDECORTE');
        $this->setTo($mail);
        $this->setBcc('salon-decorte@broadtech.co.jp');
        $this->setSubject($subject);
        $this->setBody($body);
        $this->setMaxLineLength(1000);
    }

    public static function getMailNew($reserve, $decision) {
        $bodies = reserveReplyPc::getMailNew($reserve, $decision);
        $bodies[0] = mb_convert_kana($bodies[0], 'k', 'UTF-8');
        $bodies[1] = mb_convert_kana($bodies[1], 'k', 'UTF-8');

        return $bodies;
    }

    public static function getMailSecond($reserve, $decision) {
        return self::getMailNew($reserve, $decision);
    }

    public static function getMailOut($reserve, $decision) {
        $bodies = reserveReplyPc::getMailOut($reserve, $decision);
        $bodies[0] = mb_convert_kana($bodies[0], 'k', 'UTF-8');
        $bodies[1] = mb_convert_kana($bodies[1], 'k', 'UTF-8');

        return $bodies;
    }
}
