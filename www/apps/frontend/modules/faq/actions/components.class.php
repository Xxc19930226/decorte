<?php

/**
 * product components.
 *
 * @package    cosmedecorte
 * @subpackage faq
 * @author     BROADTECH INC.
 * @version    SVN: $Id$
 */
class faqComponents extends sfComponents
{
    public function executePopular_list()
    {
        $config = $this->getContext()->getConfiguration();
        $this->pager = new sfDoctrinePager(
            'FaqDetail', sfConfig::get(
                'app_faq_popular_max_' .
                $config->getDeviceTypeString()));
        $this->pager->
            setQuery(FaqDetailTable::getInstance()->getPopularsQuery());
        $this->pager->setPage($this->page);
        $this->pager->init();

        $this->faq_populars =
            FaqDetailTable::getInstance()->getPopulars()->getData();
        $this->faq_populars_top5 = array_slice($this->faq_populars, 0, 5);
        $this->faq_populars_more = array_slice($this->faq_populars, 5);
    }

    public function executeCategory_list()
    {
        $this->faq_categories = FaqCategoryTable::getInstance()->findAll();
    }

    public function executeCategory_list2()
    {
        $this->faq_categories = FaqCategoryTable::getInstance()->findAll();
    }

    public function executeContent_list()
    {
        $this->faq_contents = FaqContentTable::getInstance()->findAll();
    }

    public function executeContent_list2()
    {
        $this->faq_contents = FaqContentTable::getInstance()->findAll();
    }

    public function executeSub_category_detail_list()
    {
        $config = $this->getContext()->getConfiguration();
        $this->pager = new sfDoctrinePager(
            'FaqDetail', sfConfig::get(
                'app_faq_subcategory_detail_max_' .
                $config->getDeviceTypeString()));
        $this->pager->setQuery($this->faq_sub_category->getDetailsQuery());
        $this->pager->setPage($this->page);
        $this->pager->init();
    }

    public function executeContent_detail_list()
    {
        $config = $this->getContext()->getConfiguration();
        $this->pager = new sfDoctrinePager(
            'FaqDetail', sfConfig::get(
                'app_faq_content_detail_max_' .
                $config->getDeviceTypeString()));
        $this->pager->setQuery($this->faq_content->getDetailsQuery());
        $this->pager->setPage($this->page);
        $this->pager->init();
    }
}
