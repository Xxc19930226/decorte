<?php

/**
 * MailGroupLogicTerm form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: MailGroupLogicTermForm.class.php 111 2011-06-08 05:00:22Z oda $
 */
class MailGroupLogicTermForm extends BaseMailGroupLogicTermForm
{
    public function configure()
    {
        $table = MailGroupLogicTermTable::getInstance();

        // 演算子
        $this->getWidget('operator')->
            setOption('choices',
                      array('' => '&nbsp;') +
                      $table->getOperatorExpressions());

        // カラム名
        $this->getWidget('column_name')->
            setOption('choices',
                      array('' => '&nbsp;') +
                      $table->getColumnNameExpressions());

        $this->useFields(array('operator', 'column_name', 'value'));
    }
}
