<?php

require_once(dirname(__FILE__) . '/../bootstrap/doctrine.php');

$t = new lime_test(1, new lime_output_color());

$groups = MailGroupTable::getInstance()->findAll();

foreach ($groups as $group) {
    $t->comment('--------------------');
    $members = $group->getMembers();
    foreach ($members as $member) {
        echo '[' . $member->getMailPc() . '][' .
            $member->getMailMobile() . "]\n";
    }
}

$t->pass('This test always passes.');
