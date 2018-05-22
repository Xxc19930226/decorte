<?php

/**
 * ChildProduct
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    cosmedecorte
 * @subpackage model
 * @author     BROADTECH INC.
 * @version    SVN: $Id: Builder.php 12 2011-05-12 03:42:19Z oda $
 */
class ChildProduct extends BaseChildProduct
{
    /**
     * 半角文字を使用した商品名を返却する。
     *
     * @return string 半角文字を使用した商品名
     */
    public function getHName()
    {
        return Util::convertStringIntoHalfWidth($this->getName());
    }

    /**
     * 半角文字を使用した商品容量を返却する。
     *
     * @return string 半角文字を使用した商品容量
     */
    public function getHCapacity()
    {
        return Util::convertStringIntoHalfWidth($this->getCapacity());
    }

    /**
     * 税込価格を返却する。
     *
     * @return integer 税込価格
     */
    public function getTaxedPrice()
    {
        $tax = sfConfig::get('app_product_tax');
        $tax /= 100;
        return $this->getPrice() + ($this->getPrice() * $tax);
    }

    /**
     * オブジェクトの現在の内容を本番環境に反映させる。
     */
    public function liveup()
    {
        $parent = $this->getParent();

        Doctrine_Manager::getInstance()->setCurrentConnection('livedb');

        $live_child_product =
            ChildProductTable::getInstance()->findOneBySlug($this->getSlug());

        $live_parent =
            ProductTable::getInstance()->findOneBySlug($parent->getSlug());
        if (!$live_parent) {
            Doctrine_Manager::getInstance()->setCurrentConnection('doctrine');

            throw new NoProductException();
        }

        if ($live_child_product) {
            $values = $this->toArray();
            unset($values['id']);
            unset($values['created_at']);
            unset($values['updated_at']);
            $live_child_product->fromArray($values);
            $live_child_product->setUpdatedAt(null);
        } else {
            $live_child_product = $this->copy();
            $live_child_product->setCreatedAt(null);
            $live_child_product->setUpdatedAt(null);
        }
        $live_child_product->setParent($live_parent);
        $live_child_product->
            save(Doctrine_Manager::getInstance()->getConnection('livedb'));

        Doctrine_Manager::getInstance()->setCurrentConnection('doctrine');
    }
}