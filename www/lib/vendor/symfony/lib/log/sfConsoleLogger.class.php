<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfConsoleLogger logs messages to the console.
 *
 * @package    symfony
 * @subpackage log
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfConsoleLogger.class.php 12 2011-05-12 03:42:19Z oda $
 */
class sfConsoleLogger extends sfStreamLogger
{
  /**
   * @see sfStreamLogger
   */
  public function initialize(sfEventDispatcher $dispatcher, $options = array())
  {
    $options['stream'] = defined('STDOUT') ? STDOUT : fopen('php://stdout', 'w');

    return parent::initialize($dispatcher, $options);
  }
}