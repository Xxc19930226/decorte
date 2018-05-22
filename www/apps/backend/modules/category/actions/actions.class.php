<?php

require_once dirname(__FILE__).'/../lib/categoryGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/categoryGeneratorHelper.class.php';

/**
 * category actions.
 *
 * @package    cosmedecorte
 * @subpackage category
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class categoryActions extends autoCategoryActions
{
    protected function doLiveup(Category $category, $msgidx = '')
    {
        $category->liveup();

        return true;
    }

    public function executeLiveup(sfWebRequest $request)
    {
        $category = $this->getRoute()->getObject();
        if ($this->doLiveup($category)) {
            $this->getUser()->setFlash('notice', 'アイテムを本番反映しました');
        }
        $this->redirect('category/index');
    }

    public function executeBatchLiveup(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids');

        $is_all_success = true;
        $msgidx = 1;
        foreach ($ids as $id) {
            $category = CategoryTable::getInstance()->find($id);
            if (!$this->doLiveup($category, $msgidx)) {
                $is_all_success = false;
                $msgidx++;
            }
        }

        if ($is_all_success) {
            $this->getUser()->setFlash('notice', 'アイテムを本番反映しました');
        }
        $this->redirect('category/index');
    }
}
