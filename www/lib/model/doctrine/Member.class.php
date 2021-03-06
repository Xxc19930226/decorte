<?php

/**
 * Member
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    cosmedecorte
 * @subpackage model
 * @author     BROADTECH INC.
 * @version    SVN: $Id: Member.class.php 1106 2012-02-07 09:08:33Z oda $
 */
class Member extends BaseMember
{
    /**
     * 誕生日を返却する。
     *
     * @return string 誕生日
     */
    public function getBirthday()
    {
        $birthday = parent::_get('birthday');
        if ($birthday === '0000-00-00') {
            return null;
        } else {
            return $birthday;
        }
    }

    /**
     * 旧PC会員(2011/7/15リニューアル以前からのPC会員)か否かを返却する。
     *
     * @return boolean 旧PC会員の場合は true
     */
    public function isOldPcMember()
    {
        if (!$this->getTempFlag() &&
            !$this->getNickName() && !$this->getJob() && $this->getSex()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 年齢を返却する。
     *
     * @return integer 年齢
     */
    public function getAge()
    {
        $birthday = $this->getBirthDay();
        $birthday = str_replace('-', '', $birthday);
        $today = date('Ymd');
        $age = (int)(($today - $birthday) / 10000);
        return $age >= 0 ? $age : 0;
    }

    /**
     * マスクされたパスワードを返却する。
     *
     * @return string マスクされたパスワード
     */
    public function getMaskedPassword()
    {
        $len = strlen($this->getPassword());
        $val = '';
        for ($i = 0; $i < $len; $i++) {
            $val .= '●';
        }
        return $val;
    }

    /**
     * お気に入りの商品を検索するクエリーを返却する。
     *
     * @return Doctrine_Query お気に入りの商品を検索するクエリー
     */
    public function getFavoriteProductsQuery()
    {
        return ProductTable::getInstance()->createQuery('p')->
            leftJoin('p.ProductFavorite f')->
            leftJoin('p.Line l')->
            leftJoin('p.Category c')->
            where('f.member_id = ?', $this->getId())->
            orderBy('f.created_at DESC');
    }

    /**
     * お気に入りの商品を返却する。
     *
     * @param integer $limit 返却する最大件数
     * @return array お気に入りの商品
     */
    public function getFavoriteProducts($limit = null)
    {
        $query = $this->getFavoriteProductsQuery();

        if ($limit) {
            $query->limit($limit);
        }

        return $query->execute();
    }

    /**
     * お気に入りの商品の件数を返却する。
     *
     * @return integer お気に入りの商品の件数
     */
    public function countFavoriteProducts()
    {
        return $this->getFavoriteProductsQuery()->count();
    }

    /**
     * 商品をお気に入りに追加する。
     *
     * @param Product $product 追加する商品
     */
    public function addFavoriteProduct(Product $product)
    {
        /*
         * 既にお気に入りに登録済みの場合は何もしない。
         */
        if ($this->isFavoriteProduct($product)) {
            return;
        }

        $conn = Doctrine_Manager::connection();

        $conn->beginTransaction();

        try {
            $favorites =
                ProductFavoriteTable::getInstance()->createQuery()->
                forUpdate(true)->
                where('member_id = ?', $this->getId())->
                execute();

            $new_favorite = new ProductFavorite();
            $new_favorite->setMember($this);
            $new_favorite->setProduct($product);
            $new_favorite->save();

            $conn->commit();
        } catch (Exception $e) {
            $conn->rollback();
            return;
        }
    }

    /**
     * 商品をお気に入りから削除する。
     *
     * @param Product $product 削除する商品
     */
    public function deleteFavoriteProduct(Product $product)
    {
        /*
         * 商品がお気に入りに存在しない場合は何もしない
         */
        if (!$this->isFavoriteProduct($product)) {
            return;
        }

        $conn = Doctrine_Manager::connection();

        $conn->beginTransaction();

        try {
            $favorites =
                ProductFavoriteTable::getInstance()->createQuery()->
                forUpdate(true)->
                where('member_id = ?', $this->getId())->
                execute();

            ProductFavoriteTable::getInstance()->createQuery()->
                delete()->
                where('member_id = ?', $this->getId())->
                addWhere('product_id = ?', $product->getId())->
                execute();

            $conn->commit();
        } catch (Exception $e) {
            $conn->rollback();
            return;
        }
    }

    /**
     * 商品がお気に入りに追加済みか否かを返却する。
     *
     * @param Product $product 追加済みか確認する商品
     * @return boolean 商品が追加済みの場合は true
     */
    public function isFavoriteProduct(Product $product)
    {
        $favorite =
            ProductFavoriteTable::getInstance()->createQuery()->
            where('member_id = ?', $this->getId())->
            addWhere('product_id = ?', $product->getId())->
            execute();
        if (count($favorite) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
