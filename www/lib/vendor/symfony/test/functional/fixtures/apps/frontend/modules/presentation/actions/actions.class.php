<?php

/**
 * presentation actions.
 *
 * @package    project
 * @subpackage view
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class presentationActions extends sfActions
{
  public function executeIndex()
  {
    $this->foo = $this->getController()->getPresentationFor('presentation', 'foo');
  }

  public function executeFoo()
  {
    $this->setLayout(false);
  }
}
