<?php

/**
 * SalonShop
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    cosmedecorte
 * @subpackage model
 * @author     BROADTECH INC.
 * @version    SVN: $Id: Builder.php 12 2011-05-12 03:42:19Z oda $
 */
class SalonShop extends BaseSalonShop
{
    public function __toString()
    {
        $name = $this->getName();
        if ($name) {
            return $name;
        } else {
            return '';
        }
    }
}
