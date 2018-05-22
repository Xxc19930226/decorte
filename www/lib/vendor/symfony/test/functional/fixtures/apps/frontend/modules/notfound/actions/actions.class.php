<?php

/**
 * notfound actions.
 *
 * @package    project
 * @subpackage notfound
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class notfoundActions extends sfActions
{
  public function executeIndex()
  {
    $this->getResponse()->setStatusCode(404);

    return $this->renderText('404');
  }
}
