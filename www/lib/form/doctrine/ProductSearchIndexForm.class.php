<?php

/**
 * ProductSearchIndex form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class ProductSearchIndexForm extends BaseProductSearchIndexForm
{
    public function configure()
    {
        $this->useFields(array('keyword'));
    }
}
