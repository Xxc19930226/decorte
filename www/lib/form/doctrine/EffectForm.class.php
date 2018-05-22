<?php

/**
 * Effect form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: EffectForm.class.php 1188 2012-10-18 06:58:13Z oda $
 */
class EffectForm extends BaseEffectForm
{
    public function configure()
    {
        // 効果名
        $this->setValidator('name', new brValidatorJapaneseString());
        $this->getValidator('name')->setOption('trim', true);

        // スラッグ
        $this->setValidator('slug', new brValidatorJapaneseString());
        $this->getValidator('slug')->setOption('trim', true);

        $this->useFields(array('category_id', 'name', 'priority', 'slug'));

        $this->resetToDefaultMessages();
    }
}
