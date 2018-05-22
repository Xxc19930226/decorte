<?php

class reserveThanksPc extends btJapaneseMessage {
    public function __construct($reserve) {
        parent::__construct();

        $this->setFrom(
            sfConfig::get('app_reserve_from_mail'),
            'salon de beaute COSME DECORTE');
        $this->setTo($reserve->getEmail());
        $subject = $reserve->getShop()->getMailSubject1();
        $subject = mb_convert_encoding(
            $subject, 'UTF-8', sfConfig::get('sf_charset'));
        $this->setSubject($subject);
        $body = $reserve->getShop()->getMailBody1();
        $body = mb_convert_encoding(
            $body, 'UTF-8', sfConfig::get('sf_charset'));
        $vals = array('mail' => $reserve->getEmail());
        $body = self::convertVariables($body, $vals);
        $this->setBody($body);
        $this->setMaxLineLength(1000);
    }
}
