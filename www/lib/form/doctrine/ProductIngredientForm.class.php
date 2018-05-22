<?php

/**
 * ProductIngredient form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class ProductIngredientForm extends BaseProductIngredientForm
{
    public function configure()
    {
        $this->getWidget('symbol')->setLabel('シンボル(色番等)');
        $this->getValidator('symbol')->setOption('trim', true);

        $this->getWidget('content')->setLabel('内容');
        $this->getValidator('content')->setOption('trim', true);

        $this->getWidget('display_order')->setLabel('表示順');
        $this->getValidator('display_order')->setOption('trim', true);

        $this->useFields(array('symbol', 'content', 'display_order'));
    }
}
