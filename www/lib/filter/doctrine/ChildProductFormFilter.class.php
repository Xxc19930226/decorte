<?php

/**
 * ChildProduct filter form.
 *
 * @package    cosmedecorte
 * @subpackage filter
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class ChildProductFormFilter extends BaseChildProductFormFilter
{
    protected function makeMultipleWhere($s, $field)
    {
        $words = explode(' ', trim(preg_replace('/\s+/', ' ', $s)));
        $like_words = array();
        $like_where = '';
        foreach ($words as $word) {
            if ($like_where) {
                $like_where .= ' OR ';
            }
            $like_where .= $field . ' LIKE ?';
            $like_words[] = '%' . $word . '%';
        }

        return array('where' => $like_where, 'words' => $like_words);
    }

    public function addTextQuery(
        Doctrine_Query $query, $field, $value)
    {
        $cond = $this->makeMultipleWhere($value['text'], $field);
        if ($cond['where']) {
            $query->addWhere($cond['where'], $cond['words']);
        }
    }

    public function configure()
    {
    }
}
