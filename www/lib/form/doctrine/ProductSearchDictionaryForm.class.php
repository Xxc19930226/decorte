<?php

/**
 * ProductSearchDictionary form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class ProductSearchDictionaryForm extends BaseProductSearchDictionaryForm
{
    public function configure()
    {
        $this->getValidator('word')->setOption('trim', true);
        $this->getValidator('likeness')->setOption('trim', true);

        $this->useFields(array('word', 'likeness'));
    }
}
