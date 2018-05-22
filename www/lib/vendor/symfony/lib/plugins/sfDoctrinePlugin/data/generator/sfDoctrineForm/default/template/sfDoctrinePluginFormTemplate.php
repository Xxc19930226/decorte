[?php

/**
 * <?php echo $this->table->getOption('name') ?> form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class <?php echo $this->table->getOption('name') ?>Form extends Plugin<?php echo $this->table->getOption('name') ?>Form
{
<?php if ($parent = $this->getParentModel()): ?>
  /**
   * @see <?php echo $parent ?>Form
   */
  public function configure()
  {
    parent::configure();
  }
<?php else: ?>
  public function configure()
  {
  }
<?php endif; ?>
}
