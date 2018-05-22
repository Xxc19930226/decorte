<?php

/**
 * inheritance actions.
 *
 * @package    project
 * @subpackage inheritance
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class inheritanceActions extends autoinheritanceActions
{
  protected function addFiltersCriteria($c)
  {
    if ($this->getRequestParameter('filter'))
    {
      $c->add(ArticlePeer::ONLINE, true);
    }
  }

  protected function addSortCriteria($c)
  {
    if ($this->getRequestParameter('sort'))
    {
      $c->addAscendingOrderByColumn(ArticlePeer::TITLE);
    }
  }
}
