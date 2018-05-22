<?php

require_once(dirname(__FILE__) . '/../bootstrap/doctrine.php');

$t = new lime_test(2, new lime_output_color());

$oda = MemberTable::getInstance()->findOneByMailPc('oda@broadtech.co.jp');
$namekawa = MemberTable::getInstance()->findOneByMailPc('namekawa@broadtech.co.jp');

$t->comment('->getAge()');
$t->is($oda->getAge(), 37);
$t->is($namekawa->getAge(), 31);
