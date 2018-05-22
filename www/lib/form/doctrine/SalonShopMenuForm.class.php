<?php

/**
 * SalonShopMenu form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class SalonShopMenuForm extends BaseSalonShopMenuForm
{
    public function configure()
    {
        $this->useFields(
            array('shop_id', 'name', 'mb_name', 'priority'));
    }
}
