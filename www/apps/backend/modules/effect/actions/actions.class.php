<?php

require_once dirname(__FILE__).'/../lib/effectGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/effectGeneratorHelper.class.php';

/**
 * effect actions.
 *
 * @package    cosmedecorte
 * @subpackage effect
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class effectActions extends autoEffectActions
{
    protected function doLiveup(Effect $effect, $msgidx = '')
    {
        try {
            $effect->liveup();
        } catch (NoCategoryException $e) {
            $this->getUser()->setFlash(
                'error' . $msgidx,
                '本番に所属カテゴリが存在しないため' .
                '「' . $effect->getName() . '」を本番反映できませんでした');
            return false;
        }

        return true;
    }

    public function executeLiveup(sfWebRequest $request)
    {
        $effect = $this->getRoute()->getObject();
        if ($this->doLiveup($effect)) {
            $this->getUser()->setFlash('notice', 'アイテムを本番反映しました');
        }
        $this->redirect('effect/index');
    }

    public function executeBatchLiveup(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids');

        $is_all_success = true;
        $msgidx = 1;
        foreach ($ids as $id) {
            $effect = EffectTable::getInstance()->find($id);
            if (!$this->doLiveup($effect, $msgidx)) {
                $is_all_success = false;
                $msgidx++;
            }
        }

        if ($is_all_success) {
            $this->getUser()->setFlash('notice', 'アイテムを本番反映しました');
        }
        $this->redirect('effect/index');
    }
}
