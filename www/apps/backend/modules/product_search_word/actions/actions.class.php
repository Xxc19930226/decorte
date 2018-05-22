<?php

require_once dirname(__FILE__).'/../lib/product_search_wordGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/product_search_wordGeneratorHelper.class.php';

/**
 * product_search_word actions.
 *
 * @package    cosmedecorte
 * @subpackage product_search_word
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class product_search_wordActions extends autoProduct_search_wordActions
{
    protected function doLiveUp(
        ProductSearchRightWord $right_word, $msgidx = '')
    {
        $right_word->liveup();

        return true;
    }

    public function executeLiveup(sfWebRequest $request)
    {
        $right_word = $this->getRoute()->getObject();
        if ($this->doLiveup($right_word)) {
            $this->getUser()->setFlash('notice', 'アイテムを本番反映しました');
        }
        $this->redirect('product_search_word/index');
    }

    public function executeBatchLiveup(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids');

        $is_all_success = true;
        $msgidx = 1;
        foreach ($ids as $id) {
            $right_word =
                ProductSearchRightWordTable::getInstance()->find($id);
            if (!$this->doLiveup($right_word, $msgidx)) {
                $is_all_success = false;
                $msgidx++;
            }
        }

        if ($is_all_success) {
            $this->getUser()->setFlash('notice', 'アイテムを本番反映しました');
        }
        $this->redirect('product_search_word/index');
    }
}
