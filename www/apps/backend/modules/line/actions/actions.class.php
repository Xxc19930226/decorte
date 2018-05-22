<?php

require_once dirname(__FILE__).'/../lib/lineGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/lineGeneratorHelper.class.php';

/**
 * line actions.
 *
 * @package    cosmedecorte
 * @subpackage line
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class lineActions extends autoLineActions
{
    protected function doLiveup(Line $line, $msgidx = '')
    {
        $line->liveup();

        return true;
    }

    public function executeLiveup(sfWebRequest $request)
    {
        $line = $this->getRoute()->getObject();
        if ($this->doLiveup($line)) {
            $this->getUser()->setFlash('notice', 'アイテムを本番反映しました');
        }
        $this->redirect('line/index');
    }

    public function executeBatchLiveup(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids');

        $is_all_success = true;
        $msgidx = 1;
        foreach ($ids as $id) {
            $line = LineTable::getInstance()->find($id);
            if (!$this->doLiveup($line, $msgidx)) {
                $is_all_success = false;
                $msgidx++;
            }
        }

        if ($is_all_success) {
            $this->getUser()->setFlash('notice', 'アイテムを本番反映しました');
        }
        $this->redirect('line/index');
    }
}
