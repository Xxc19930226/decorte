<?php

require_once dirname(__FILE__).'/../lib/child_productGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/child_productGeneratorHelper.class.php';

/**
 * child_product actions.
 *
 * @package    cosmedecorte
 * @subpackage child_product
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class child_productActions extends autoChild_productActions
{
    protected function doLiveup(ChildProduct $child_product, $msgidx = '')
    {
        try {
            $child_product->liveup();
        } catch (NoProductException $e) {
            $this->getUser()->setFlash(
                'error' . $msgidx,
                '本番に親商品が存在しないため' .
                '「' . $child_product->getName() . '」を' .
                '本番反映できませんでした');
            return false;
        }

        return true;
    }

    public function executeLiveup(sfWebRequest $request)
    {
        $child_product = $this->getRoute()->getObject();
        if ($this->doLiveup($child_product)) {
            $this->getUser()->setFlash('notice', 'アイテムを本番反映しました');
        }
        $this->redirect('child_product/index');
    }

    public function executeBatchLiveup(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids');

        $is_all_success = true;
        $msgidx = 1;
        foreach ($ids as $id) {
            $child_product = ChildProductTable::getInstance()->find($id);
            if (!$this->doLiveup($child_product, $msgidx)) {
                $is_all_success = false;
                $msgidx++;
            }
        }

        if ($is_all_success) {
            $this->getUser()->setFlash('notice', 'アイテムを本番反映しました');
        }
        $this->redirect('child_product/index');
    }
}
