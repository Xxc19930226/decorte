<?php

class backendConfiguration extends sfApplicationConfiguration
{
    public function configure()
    {
        $this->dispatcher->connect(
            'context.load_factories',
            array($this, 'setCurrentConnection'));
    }

    public function setCurrentConnection(sfEvent $event)
    {
        Doctrine_Manager::getInstance()->setCurrentConnection('doctrine');
    }

    public function getDomeinType($mail)
    {
        if (preg_match( "/@(docomo|softbank|disney|ezweb|[dhtkrsnqc]\.vodafone|pdx|d[kij]\.pdx|wm\.pdx)\.ne\.jp$/i", $mail) ||
            preg_match("/@(jp-[dhtkrsnqc]\.ne\.jp|i\.softbank\.jp|willcom\.com|[a-z]+\.biz\.ezweb\.ne\.jp)$/i", $mail))
        {
            return 'mb';
        } else {
            return 'pc';
        }
    }

    public function getWeek($date)
    {
        $pyear = substr($date, 0, 4);
        $pmonth = substr($date, 7, 2);
        $pday = substr($date, 12,2);

        $week = array("日", "月", "火", "水", "木", "金", "土");

        return $week[date("w", mktime(0, 0, 0, $pmonth, $pday, $pyear))];
    }
}
