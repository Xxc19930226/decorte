<?php

class reserveReplyPc extends btJapaneseMessage {
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

    public static function getMailSubject($reserve, $decision) {
        if ($decision['other_flag1']) {
            return $reserve->getShop()->getMailSubject3();
        } else {
            return $reserve->getShop()->getMailSubject2();
        }
    }

    public static function getMailNew($reserve, $decision) {
        $vals = array();

        $vals['name_sei'] = $reserve['name_sei'];
        $vals['name_mei'] = $reserve['name_mei'];
        $vals['menu'] = mb_convert_kana($reserve['menu'], 'KV', 'UTF-8');

        if ($decision['hope_flag1']) {
            $vals['hope'] = 1;
            $date = $reserve['hope_date1'];
            $time = $decision['hope_start_time1'];
        } elseif ($decision['hope_flag2']) {
            $vals['hope'] = 2;
            $date = $reserve['hope_date2'];
            $time = $decision['hope_start_time2'];
        } else {
            $vals['hope'] = 3;
            $date = $reserve['hope_date3'];
            $time = $decision['hope_start_time3'];
        }
        $vals['date'] = $date . substr($time, 0, 5);

        $bodies = array();

        $bodies[0] = $reserve->getShop()->getMailBodyTop2();
        $bodies[0] = self::convertVariables($bodies[0], $vals);

        $bodies[1] = $reserve->getShop()->getMailBodyBottom2();
        $bodies[1] = self::convertVariables($bodies[1], $vals);

        return $bodies;
    }

    public static function getMailSecond($reserve, $decision) {
        return self::getMailNew($reserve, $decision);
    }

    public static function getMailOut($reserve, $decision) {
        $vals = array();

        $vals['name_sei'] = $reserve['name_sei'];
        $vals['name_mei'] = $reserve['name_mei'];

        $date1 = $reserve['hope_date1'] . $reserve['hope_time1'];
        $date2 = $date3 = "";

        if ($reserve['hope_date2']) {
            $date2 = "\n" . $reserve['hope_date2'] . $reserve['hope_time2'];
        }
        if ($reserve['hope_date3']) {
            $date3 = "\n" . $reserve['hope_date3'] . $reserve['hope_time3'];
        }

        $vals['date'] = $date1 . $date2 . $date3;

        $vals['other_date1'] =
            $decision['other_date1'] .
            substr($decision['other_start_time1'], 0, 5);
        $vals['other_date2'] =
            $decision['other_date2'] .
            substr($decision['other_start_time2'], 0, 5);

        $bodies = array();

        $bodies[0] = $reserve->getShop()->getMailBodyTop3();
        $bodies[0] = self::convertVariables($bodies[0], $vals);

        $bodies[1] = $reserve->getShop()->getMailBodyBottom3();
        $bodies[1] = self::convertVariables($bodies[1], $vals);

        return $bodies;
    }
}
