<?php

/**
 * MailAuthor
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    cosmedecorte
 * @subpackage model
 * @author     BROADTECH INC.
 * @version    SVN: $Id: MailAuthor.class.php 88 2011-05-26 09:23:37Z oda $
 */
class MailAuthor extends BaseMailAuthor
{
    public function getNameAddress()
    {
        $name = $this->getName();
        $address = $this->getAddress();
        if ($name) {
            return $name . ' <' . $address . '>';
        } else {
            return $address;
        }
    }

    public function __toString()
    {
        return $this->getNameAddress();
    }
}