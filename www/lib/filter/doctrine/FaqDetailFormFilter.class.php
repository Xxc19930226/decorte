<?php

/**
 * FaqDetail filter form.
 *
 * @package    cosmedecorte
 * @subpackage filter
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class FaqDetailFormFilter extends BaseFaqDetailFormFilter
{
    protected $keyword = null;

    public function configure()
    {
        $this->disableCSRFProtection();

        $this->setWidget('keyword', new sfWidgetFormInputText());
        $this->setValidator(
            'keyword', new sfValidatorString(
                array('required' => false,
                      'trim' => true,
                      'max_length' => 255)));

        $this->useFields(array('keyword'));

        $this->validatorSchema->setPostValidator(
            new sfValidatorCallback(
                array('callback' => array($this, 'cleanKeyword'))));

        $this->widgetSchema->setNameFormat(false);
        $this->validatorSchema->setOption('allow_extra_fields', true);
    }

    public function cleanKeyword(sfValidatorBase $validator, $values)
    {
        $keyword = $values['keyword'];
        $keyword = mb_convert_kana($keyword, 's', sfConfig::get('sf_charset'));
        $keyword = preg_replace('/ +/', ' ', $keyword);
        $values['keyword'] = $keyword;

        return $values;
    }

    protected function splitKeyword($keyword)
    {
        $keyword = mb_convert_kana($keyword, 's', sfConfig::get('sf_charset'));
        return preg_split('/[-\s]/', $keyword);
    }

    public function getQuery()
    {
        $query = null;
        if ($this->isValid()) {
            $query = parent::getQuery();
        } else {
            $query = FaqDetailTable::getInstance()->createQuery('r');
        }

        return $query->orderBy('r.priority');
    }

    public function addKeywordColumnQuery(
        Doctrine_Query $query, $field, $value)
    {
        $keywords = $this->splitKeyword($value);
        $wrong_word_table = ProductSearchWrongWordTable::getInstance();

        foreach ($keywords as $keyword) {
            $keyword1 =
                mb_convert_kana($keyword, 'KVa', sfConfig::get('sf_charset'));
            $wrong_word = $wrong_word_table->findOneByWord($keyword1);
            if ($wrong_word) {
                $keyword1 = $wrong_word->getRightWord()->getWord();
            }

            $keyword2 =
                mb_convert_kana($keyword, 'KVA', sfConfig::get('sf_charset'));
            $wrong_word = $wrong_word_table->findOneByWord($keyword2);
            if ($wrong_word) {
                $keyword2 = $wrong_word->getRightWord()->getWord();
            }

            $keyword3 =
                mb_convert_kana($keyword, 'KV', sfConfig::get('sf_charset'));
            $wrong_word = $wrong_word_table->findOneByWord($keyword3);
            if ($wrong_word) {
                $keyword3 = $wrong_word->getRightWord()->getWord();
            }

            $query->addWhere(
                'r.answer LIKE ? OR r.search_index LIKE ? OR ' .
                'r.answer LIKE ? OR r.search_index LIKE ? OR ' .
                'r.answer LIKE ? OR r.search_index LIKE ?',
                array_merge(
                    array_fill(0, 2, '%' . $keyword1 . '%'),
                    array_fill(0, 2, '%' . $keyword2 . '%'),
                    array_fill(0, 2, '%' . $keyword3 . '%')));
        }
    }

    public function buildHttpQueryValues($extra_params = array())
    {
        $values = array();
        if ($this->isValid()) {
            $values = $this->getValues();
        }

        foreach ($extra_params as $key => $value) {
            $values[$key] = $value;
        }

        return $values;
    }

    public function getKeyword()
    {
        if ($this->keyword) {
            return $this->keyword;
        }

        if ($this->isValid() && $this->getValue('keyword')) {
            $this->keyword = trim($this->getValue('keyword'));
            return $this->keyword;
        } else {
            return null;
        }
    }
}
