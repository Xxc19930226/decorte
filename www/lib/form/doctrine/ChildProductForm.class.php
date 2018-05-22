<?php

/**
 * ChildProduct form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class ChildProductForm extends BaseChildProductForm
{
    public function configure()
    {
        // 子商品名
        $this->setValidator('name', new brValidatorJapaneseString());
        $this->getValidator('name')->setOption('trim', true);

        // スラッグ
        $this->setValidator('slug', new brValidatorJapaneseString());
        $this->getValidator('slug')->setOption('trim', true);

        $this->getValidator('cn_shop_link_url')->setOption('trim', true);

        $this->useFields(
            array('parent_id', 'sub_number', 'name',
                  'capacity', 'price', 'slug', 'cn_shop_link_url'));

        $this->resetToDefaultMessages();
    }
}
