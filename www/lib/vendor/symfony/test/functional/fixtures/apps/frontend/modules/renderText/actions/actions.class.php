<?php

/**
 * renderText actions.
 *
 * @package    project
 * @subpackage renderText
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class renderTextActions extends sfActions
{
  public function executeIndex()
  {
    return $this->renderText('foo');
  }
}
