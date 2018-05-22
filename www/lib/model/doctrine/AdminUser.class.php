<?php

/**
 * AdminUser
 *
 * @package    cosmedecorte
 * @subpackage model
 * @author     BROADTECH INC.
 * @version    SVN: $Id: Builder.php 12 2011-05-12 03:42:19Z oda $
 */
class AdminUser extends BaseAdminUser
{
    public function setRawPassword($raw_pass)
    {
        $this->setPassword(sha1($raw_pass));
    }

    public function checkPassword($pass)
    {
        if (sha1($pass) === $this->getPassword()) {
            return true;
        } else {
            return false;
        }
    }
}
