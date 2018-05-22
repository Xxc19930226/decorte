<?php

/**
 * ProductSearchRightWord filter form.
 *
 * @package    cosmedecorte
 * @subpackage filter
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class ProductSearchRightWordFormFilter extends BaseProductSearchRightWordFormFilter
{
    public function configure()
    {
        $this->setWidget(
            'wrong_words',
            new sfWidgetFormFilterInput(array('with_empty' => false)));
        $this->setValidator(
            'wrong_words', new sfValidatorPass(array('required' => false)));

        $this->useFields(array('word', 'wrong_words'));
    }

    public function addWrongWordsColumnQuery(
        Doctrine_Query $query, $field, $value)
    {
        $query->addWhere(
            'r.WrongWords.word LIKE ?', '%' . $value['text'] . '%');
    }
}
