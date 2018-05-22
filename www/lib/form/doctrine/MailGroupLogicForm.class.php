<?php

/**
 * MailGroupLogic form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: MailGroupLogicForm.class.php 111 2011-06-08 05:00:22Z oda $
 */
class MailGroupLogicForm extends BaseMailGroupLogicForm
{
    public function configure()
    {
        $table = MailGroupLogicTable::getInstance();

        // 演算子
        $this->getWidget('operator')->
            setOption('choices', $table->getOperatorExpressions());

        $term_forms = new sfForm();

        if (!sfContext::getInstance()->getRequest()->isXmlHttpRequest()) {
            $terms = $this->getObject()->getTerms();
            $term_idx = 0;
            foreach ($terms as $term) {
                $term_form = new MailGroupLogicTermForm($term);
                $term_forms->embedForm($term_idx++, $term_form);
            }
        }

        $this->embedForm('terms', $term_forms);

        $this->useFields(array('operator', 'terms'));
    }

    public function addTermForm($idx)
    {
        $term = new MailGroupLogicTerm();
        $term->setLogic($this->getObject());
        $this->getObject()->getTerms()->add($term);

        $term_form = new MailGroupLogicTermForm($term);
        $this->embeddedForms['terms']->embedForm($idx, $term_form);
        $this->embedForm('terms', $this->embeddedForms['terms']);

        return $term_form;
    }
}
