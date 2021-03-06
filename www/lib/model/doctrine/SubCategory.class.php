<?php

/**
 * SubCategory
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    cosmedecorte
 * @subpackage model
 * @author     BROADTECH INC.
 * @version    SVN: $Id: SubCategory.class.php 1194 2012-10-26 07:08:28Z oda $
 */
class SubCategory extends BaseSubCategory
{
    /**
     * 半角文字を使用したサブカテゴリ名を返却する。
     *
     * @return string 半角文字を使用したサブカテゴリ名
     */
    public function getHName()
    {
        return Util::convertStringIntoHalfWidth($this->getName());
    }

    /**
     * サブカテゴリ画像ファイルの絶対パスを取得する。
     */
    public function getAbsoluteImagePath()
    {
        return sfConfig::get('sf_web_dir') .
            '/images/' . $this->getRelativeImagePath();
    }

    /**
     * サブカテゴリ画像ファイルの相対パス(images からの相対パス)を取得する。
     */
    public function getRelativeImagePath()
    {
        return 'sub_category/' . $this->getSlug() . '.jpg';
    }

    /**
     * オブジェクトの現在の内容を本番環境に反映させる。
     */
    public function liveup()
    {
        $category = $this->getCategory();

        Doctrine_Manager::getInstance()->setCurrentConnection('livedb');

        $live_sub_category =
            SubCategoryTable::getInstance()->findOneBySlug($this->getSlug());

        $live_category =
            CategoryTable::getInstance()->findOneBySlug($category->getSlug());
        if (!$live_category) {
            Doctrine_Manager::getInstance()->setCurrentConnection('doctrine');

            throw new NoCategoryException();
        }

        if ($live_sub_category) {
            $values = $this->toArray();
            unset($values['id']);
            unset($values['created_at']);
            unset($values['updated_at']);
            $live_sub_category->fromArray($values);
            $live_sub_category->setUpdatedAt(null);
        } else {
            $live_sub_category = $this->copy();
            $live_sub_category->setCreatedAt(null);
            $live_sub_category->setUpdatedAt(null);
        }
        $live_sub_category->setCategory($live_category);
        $live_sub_category->
            save(Doctrine_Manager::getInstance()->getConnection('livedb'));

        Doctrine_Manager::getInstance()->setCurrentConnection('doctrine');
    }
}
