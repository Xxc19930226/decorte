<?php

/**
 * faq actions.
 *
 * @package    cosmedecorte
 * @subpackage faq
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class faqActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
    }

    public function executeContact(sfWebRequest $request)
    {
    }

    public function executeShowPopular(sfWebRequest $request)
    {
        $this->page = $request->getParameter('page', 1);
    }

    public function executeShowCategory(SfWebRequest $request)
    {
        $this->faq_category = $this->getRoute()->getObject();
        $this->top_category = FaqCategoryTable::getInstance()->findTop();
        $this->top_content = FaqContentTable::getInstance()->findTop();
    }

    public function executeShowSubCategory(SfWebRequest $request)
    {
        $this->faq_sub_category = $this->getRoute()->getObject();
        $this->page = $request->getParameter('page', 1);
        $this->top_category = FaqCategoryTable::getInstance()->findTop();
        $this->top_content = FaqContentTable::getInstance()->findTop();
    }

    public function executeShowContent(SfWebRequest $request)
    {
        $this->faq_content = $this->getRoute()->getObject();
        $this->page = $request->getParameter('page', 1);
        $this->top_category = FaqCategoryTable::getInstance()->findTop();
        $this->top_content = FaqContentTable::getInstance()->findTop();
    }

    public function executeShowDetail(sfWebRequest $request)
    {
        $this->faq_detail = $this->getRoute()->getObject();
        $this->top_category = FaqCategoryTable::getInstance()->findTop();
        $this->top_content = FaqContentTable::getInstance()->findTop();
    }

    public function executeSearch(sfWebRequest $request)
    {
        $config = $this->getContext()->getConfiguration();
        $this->pager = new sfDoctrinePager(
            'FaqDetail', sfConfig::get(
                'app_faq_search_result_max_' .
                $config->getDeviceTypeString()));
        $this->form = new FaqDetailFormFilter();
        $this->form->bind($request->getGetParameters());
        $this->pager->setQuery($this->form->getQuery());
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
        $this->top_category = FaqCategoryTable::getInstance()->findTop();
        $this->top_content = FaqContentTable::getInstance()->findTop();
    }
}
