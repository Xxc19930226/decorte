<?php

require_once dirname(__FILE__).'/../lib/sub_categoryGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/sub_categoryGeneratorHelper.class.php';

/**
 * sub_category actions.
 *
 * @package    cosmedecorte
 * @subpackage sub_category
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class sub_categoryActions extends autoSub_categoryActions
{
    protected function doLiveup(SubCategory $sub_category, $msgidx = '')
    {
        try {
            $sub_category->liveup();
        } catch (NoCategoryException $e) {
            $this->getUser()->setFlash(
                'error' . $msgidx,
                '本番に所属カテゴリが存在しないため' .
                '「' . $sub_category->getName() . '」を' .
                '本番反映できませんでした');
            return false;
        }

        return true;
    }

    public function executeLiveup(sfWebRequest $request)
    {
        $sub_category = $this->getRoute()->getObject();
        if ($this->doLiveup($sub_category)) {
            $this->getUser()->setFlash('notice', 'アイテムを本番反映しました');
        }
        $this->redirect('sub_category/index');
    }

    public function executeBatchLiveup(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids');

        $is_all_success = true;
        $msgidx = 1;
        foreach ($ids as $id) {
            $sub_category = SubCategoryTable::getInstance()->find($id);
            if (!$this->doLiveup($sub_category, $msgidx)) {
                $is_all_success = false;
                $msgidx++;
            }
        }

        if ($is_all_success) {
            $this->getUser()->setFlash('notice', 'アイテムを本番反映しました');
        }
        $this->redirect('sub_category/index');
    }
}
