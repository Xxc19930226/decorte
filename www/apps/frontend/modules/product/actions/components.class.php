<?php

/**
 * product components.
 *
 * @package    cosmedecorte
 * @subpackage product
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class productComponents extends sfComponents
{
    public function executeRanking()
    {
        $category =
            CategoryTable::getInstance()->findOneBySlug($this->category_slug);
        $this->products =
            ProductPopularTable::getInstance()->getProducts(
                sfConfig::get('app_product_ranking_max'), $category);
    }

    public function executeMylist()
    {
        $member = $this->getUser()->getLoginMember();
        if (!$member) {
            return sfView::NONE;
        }

        $this->products = $member->getFavoriteProducts($this->limit);
        $this->limit = sfConfig::get('app_product_mylist_side_max');
    }

    public function executeChecked()
    {
        $this->products = $this->getUser()->getViewProducts();
    }
}
