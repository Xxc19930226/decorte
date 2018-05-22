<?php

/**
 * Category form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: CategoryForm.class.php 1364 2016-01-20 10:34:38Z oda $
 */
class CategoryForm extends BaseCategoryForm
{
    public function configure()
    {
        // カテゴリ名
        $this->setValidator('name', new brValidatorJapaneseString());
        $this->getValidator('name')->setOption('trim', true);

        // スラッグ
        $this->setValidator('slug', new brValidatorJapaneseString());
        $this->getValidator('slug')->setOption('trim', true);

        $this->useFields(array('name', 'priority', 'slug'));

        $this->resetToDefaultMessages();
    }
}
