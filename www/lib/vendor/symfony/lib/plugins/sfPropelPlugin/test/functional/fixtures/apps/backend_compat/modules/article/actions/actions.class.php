<?php

/**
 * article actions.
 *
 * @package    project
 * @subpackage article
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class articleActions extends autoarticleActions
{
  public function executeMyAction()
  {
    return $this->renderText('Selected '.implode(', ', $this->getRequestParameter('sf_admin_batch_selection', array())));
  }
}
