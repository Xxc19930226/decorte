<?php

/**
 * configSettingsMaxForwards actions.
 *
 * @package    project
 * @subpackage configSettingsMaxForwards
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class configSettingsMaxForwardsActions extends sfActions
{
  public function executeSelfForward()
  {
    $this->forward('configSettingsMaxForwards', 'selfForward');
  }
}
