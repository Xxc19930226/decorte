<?php

/**
 * cache components.
 *
 * @package    project
 * @subpackage cache
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: components.class.php 12 2011-05-12 03:42:19Z oda $
 */
class cacheComponents extends sfComponents
{
  public function executeComponent()
  {
    $this->componentParam = 'componentParam';
    $this->requestParam = $this->getRequestParameter('param');
  }

  public function executeCacheableComponent()
  {
    $this->componentParam = 'componentParam';
    $this->requestParam = $this->getRequestParameter('param');
  }

  public function executeContextualComponent()
  {
    $this->componentParam = 'componentParam';
    $this->requestParam = $this->getRequestParameter('param');
  }

  public function executeContextualCacheableComponent()
  {
    $this->componentParam = 'componentParam';
    $this->requestParam = $this->getRequestParameter('param');
  }
}
