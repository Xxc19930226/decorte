<?php

/**
 * view actions.
 *
 * @package    project
 * @subpackage view
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class viewActions extends sfActions
{
  public function executeIndex()
  {
    $this->setTemplate('foo');
  }

  public function executePlain()
  {
  }

  public function executeImage()
  {
  }
}
