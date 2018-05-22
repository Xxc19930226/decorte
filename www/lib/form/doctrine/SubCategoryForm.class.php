<?php

/**
 * SubCategory form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: SubCategoryForm.class.php 1364 2016-01-20 10:34:38Z oda $
 */
class SubCategoryForm extends BaseSubCategoryForm
{
    public function configure()
    {
        // サブカテゴリ名
        $this->setValidator('name', new brValidatorJapaneseString());
        $this->getValidator('name')->setOption('trim', true);

        // スラッグ
        $this->setValidator('slug', new brValidatorJapaneseString());
        $this->getValidator('slug')->setOption('trim', true);

        $this->useFields(array('category_id', 'name', 'priority', 'slug'));

        $this->resetToDefaultMessages();
    }
}
