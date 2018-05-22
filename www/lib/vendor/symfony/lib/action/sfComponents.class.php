<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfComponents.
 *
 * @package    symfony
 * @subpackage action
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfComponents.class.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class sfComponents extends sfComponent
{
  /**
   * @throws sfInitializationException
   *
   * @see sfComponent
   */
  public function execute($request)
  {
    throw new sfInitializationException('sfComponents initialization failed.');
  }
}