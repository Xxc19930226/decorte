<?php

 /**
  * Product filter form.
  *
  * @package    cosmedecorte
  * @subpackage filter
  * @author     BROADTECH INC.
  * @version    SVN: $Id: ProductFormFilter.class.php 1411 2016-04-19 09:34:07Z oda $
  */
 class ProductFormFilter extends BaseProductFormFilter
 {
     protected $line = null;
     protected $category = null;
     protected $sub_category = null;
     protected $effect = null;
     protected $keyword = null;
     protected $search_log = null;

     public function configure()
     {
         $this->disableCSRFProtection();

         // ライン
         $query = LineTable::getInstance()->
             createQuery('r')->leftJoin('r.Products p');
         if ($this->category) {
             $query->leftJoin('p.Category c')->
                 addWhere('c.id = ?', $this->category->getId());
         }
         if ($this->sub_category) {
             $query->leftJoin('p.SubCategory s')->
                 addWhere('s.id = ?', $this->sub_category->getId());
         }
         if ($this->effect) {
             $query->leftJoin('p.Effects e')->
                 addWhere('e.id = ?', $this->effect->getId());
         }
         $this->setWidget(
             'line', new sfWidgetFormDoctrineChoice(array(
                 'model' => 'Line',
                 'key_method' => 'getSlug',
                 'query' => $query,
                 'add_empty' => true)));
         $this->setValidator(
             'line', new sfValidatorDoctrineChoice(array(
                 'required' => false,
                 'model' => 'Line',
                 'column' => 'slug')));

         // カテゴリ
         $query = CategoryTable::getInstance()->
             createQuery('r')->leftJoin('r.Products p');
         if ($this->line) {
             $query->leftJoin('p.Line l')->
                 addWhere('l.id = ?', $this->line->getId());
         }
         if ($this->sub_category) {
             $query->leftJoin('p.SubCategory s')->
                 addWhere('s.id = ?', $this->sub_category->getId());
         }
         if ($this->effect) {
             $query->leftJoin('p.Effects e')->
                 addWhere('e.id = ?', $this->effect->getId());
         }
         $this->setWidget(
             'category', new sfWidgetFormDoctrineChoice(array(
                 'model' => 'Category',
                 'key_method' => 'getSlug',
                 'query' => $query,
                 'add_empty' => true)));
         $this->setValidator(
             'category', new sfValidatorDoctrineChoice(array(
                 'required' => false,
                 'model' => 'Category',
                 'column' => 'slug')));

         // 詳細カテゴリ
         if ($this->category) {
             $query = SubCategoryTable::getInstance()->
                 createQuery('r')->leftJoin('r.Products p');
             if ($this->line) {
                 $query->leftJoin('p.Line l')->
                     addWhere('l.id = ?', $this->line->getId());
             }
             if ($this->category) {
                 $query->leftJoin('p.Category c')->
                     addWhere('c.id = ?', $this->category->getId());
             }
             if ($this->effect) {
                 $query->leftJoin('p.Effects e')->
                     addWhere('e.id = ?', $this->effect->getId());
             }
             $this->setWidget(
                 'sub_category', new sfWidgetFormDoctrineChoice(array(
                     'model' => 'SubCategory',
                     'key_method' => 'getSlug',
                     'query' => $query,
                     'add_empty' => true)));
         } else {
             $this->setWidget(
                 'sub_category', new sfWidgetFormChoice(array(
                     'choices' => array())));
         }
         $this->setValidator(
             'sub_category', new sfValidatorDoctrineChoice(array(
                 'required' => false,
                 'model' => 'SubCategory',
                 'column' => 'slug')));

         // 効果
         $query = EffectTable::getInstance()->
             createQuery('r')->leftJoin('r.Products p');
         if ($this->line) {
             $query->leftJoin('p.Line l')->
                 addWhere('l.id = ?', $this->line->getId());
         }
         if ($this->category) {
             $query->leftJoin('p.Category c')->
                 addWhere('c.id = ?', $this->category->getId());
         }
         if ($this->sub_category) {
             $query->leftJoin('p.SubCategory s')->
                 addWhere('s.id = ?', $this->sub_category->getId());
         }
         $this->setWidget(
             'effect', new sfWidgetFormDoctrineChoice(array(
                 'model' => 'Effect',
                 'key_method' => 'getSlug',
                 'query' => $query,
                 'add_empty' => true)));
         $this->setValidator(
             'effect', new sfValidatorDoctrineChoice(array(
                 'required' => false,
                 'model' => 'Effect',
                 'column' => 'slug')));

         // キーワード
         $this->setWidget('keyword', new sfWidgetFormInput());
         $this->setValidator(
             'keyword', new sfValidatorString(
                 array('required' => false,
                       'trim' => true,
                       'max_length' => 255)));

         // ページ
         $this->setWidget('page', new sfWidgetFormInputHidden());
         $this->setValidator('page', new sfValidatorPass());

         // ログID
         $this->setWidget('log', new sfWidgetFormInputHidden());
         $this->setValidator('log', new sfValidatorPass());

         $this->useFields(
             array('line', 'category', 'sub_category', 'effect',
             'keyword', 'page', 'log'));

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
         return explode(' ', $keyword);
     }

     protected function splitKeyword2($keyword)
     {
         $keyword = mb_convert_kana($keyword, 's', sfConfig::get('sf_charset'));
         return preg_split('/[-\s]/', $keyword);
     }

     public function getQuery()
     {
         $query = null;
         if ($this->isValid()) {
             $query = parent::getQuery();

             $keywords = $this->splitKeyword2($this->getKeyword());
             $has_keyword = false;
             foreach ($keywords as $keyword) {
                 if ($keyword) {
                     $has_keyword = true;
                 }
             }
             if (!$has_keyword) {
                 $query->addWhere('r.search_keyword_only_flag = false');
             }
         } else {
             $query = ProductTable::getInstance()->createQuery('r')->
                 addWhere('r.search_keyword_only_flag = false');
         }

         return $query->
             leftJoin('r.Line l')->
             leftJoin('r.Category c')->
             leftJoin('r.SubCategory s');
     }

     public function addLineColumnQuery(
         Doctrine_Query $query, $field, $value)
     {
         $query->addWhere('l.slug = ?', $value);
         // $query->orderBy('r.line_priority');
     }

     public function addCategoryColumnQuery(
         Doctrine_Query $query, $field, $value)
     {
         $query->addWhere('c.slug = ?', $value);
         // $query->orderBy('r.category_priority');
     }

     public function addSubCategoryColumnQuery(
         Doctrine_Query $query, $field, $value)
     {
         $query->addWhere('s.slug = ?', $value);
     }

     public function addEffectColumnQuery(
         Doctrine_Query $query, $field, $value)
     {
         $query->addWhere('r.Effects.slug = ?', $value);
     }

     public function addKeywordColumnQuery(
         Doctrine_Query $query, $field, $value)
     {
         $keywords = $this->splitKeyword2($value);
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
                 'r.name LIKE ? OR r.outline LIKE ? OR ' .
                 'r.explanation LIKE ? OR r.capacity LIKE ? OR ' .
                 'r.price LIKE ? OR r.how_to LIKE ? OR ' .
                 'r.search_index LIKE ? OR r.search_sub_category LIKE ? OR ' .
                 'l.name LIKE ? OR l.search_index LIKE ? OR ' .
                 'c.name LIKE ? OR s.name LIKE ? OR r.Effects.name LIKE ? OR ' .
                 'r.Children.name LIKE ? OR r.Children.capacity LIKE ? OR ' .
                 'r.Children.price LIKE ? OR ' .
                 'r.name LIKE ? OR r.outline LIKE ? OR ' .
                 'r.explanation LIKE ? OR r.capacity LIKE ? OR ' .
                 'r.price LIKE ? OR r.how_to LIKE ? OR ' .
                 'r.search_index LIKE ? OR r.search_sub_category LIKE ? OR ' .
                 'l.name LIKE ? OR l.search_index LIKE ? OR ' .
                 'c.name LIKE ? OR s.name LIKE ? OR r.Effects.name LIKE ? OR ' .
                 'r.Children.name LIKE ? OR r.Children.capacity LIKE ? OR ' .
                 'r.Children.price LIKE ? OR ' .
                 'r.name LIKE ? OR r.outline LIKE ? OR ' .
                 'r.explanation LIKE ? OR r.capacity LIKE ? OR ' .
                 'r.price LIKE ? OR r.how_to LIKE ? OR ' .
                 'r.search_index LIKE ? OR r.search_sub_category LIKE ? OR ' .
                 'l.name LIKE ? OR l.search_index LIKE ? OR ' .
                 'c.name LIKE ? OR s.name LIKE ? OR r.Effects.name LIKE ? OR ' .
                 'r.Children.name LIKE ? OR r.Children.capacity LIKE ? OR ' .
                 'r.Children.price LIKE ?',
                 array_merge(
                     array_fill(0, 16, '%' . $keyword1 . '%'),
                     array_fill(0, 16, '%' . $keyword2 . '%'),
                     array_fill(0, 16, '%' . $keyword3 . '%')));
         }
     }

     public function bind(
         array $taintedValues = null, array $taintedFiles = null)
     {
         if ($taintedValues) {
             if (isset($taintedValues['line'])) {
                 $v = $this->getValidator('line')->
                     clean($taintedValues['line']);
                 if ($v) {
                     $this->line =
                         LineTable::getInstance()->findOneBySlug($v);
                 }
             }

             if (isset($taintedValues['category'])) {
                 $v = $this->getValidator('category')->
                     clean($taintedValues['category']);
                 if ($v) {
                     $this->category =
                         CategoryTable::getInstance()->findOneBySlug($v);
                 }
             }

             if (!$this->category) {
                 /*
                  * カテゴリが指定されていない場合、サブカテゴリの指定は無視す
                  * る。
                  */
                 unset($taintedValues['sub_category']);
             }

             if (isset($taintedValues['sub_category'])) {
                 $v = $this->getValidator('sub_category')->
                     clean($taintedValues['sub_category']);
                 if ($v) {
                     $this->sub_category =
                         SubCategoryTable::getInstance()->findOneBySlug($v);
                 }
             }

             if (isset($taintedValues['effect'])) {
                 $v = $this->getValidator('effect')->
                     clean($taintedValues['effect']);
                 if ($v) {
                     $this->effect =
                         EffectTable::getInstance()->findOneBySlug($v);
                 }
             }

             $this->setup();
             $this->configure();
             self::$dispatcher->
                 notify(new sfEvent($this, 'form.post_configure'));
         }

        return parent::bind($taintedValues, $taintedFiles);
    }

    public function buildHttpQueryValues($extra_params = array())
    {
        $values = array();
        if ($this->isValid()) {
            $values = $this->getValues();
            if (!isset($values['log']) && $this->search_log) {
                $values['log'] = $this->getLogId();
            }
        }

        foreach ($extra_params as $key => $value) {
            $values[$key] = $value;
        }

        return $values;
    }

    public function getLine()
    {
        if ($this->line) {
            return $this->line;
        }

        if ($this->isValid() && $this->getValue('line')) {
            $this->line = LineTable::getInstance()->
                findOneBySlug($this->getValue('line'));
            return $this->line;
        } else {
            return null;
        }
    }

    public function getCategory()
    {
        if ($this->category) {
            return $this->category;
        }

        if ($this->isValid() && $this->getValue('category')) {
            $this->category = CategoryTable::getInstance()->
                findOneBySlug($this->getValue('category'));
            return $this->category;
        } else {
            return null;
        }
    }

    public function getSubCategory()
    {
        if ($this->sub_category) {
            return $this->sub_category;
        }

        if ($this->isValid() && $this->getValue('sub_category')) {
            $this->sub_category = SubCategoryTable::getInstance()->
                findOneBySlug($this->getValue('sub_category'));
            return $this->sub_category;
        } else {
            return null;
        }
    }

    public function getEffect()
    {
        if ($this->effect) {
            return $this->effect;
        }

        if ($this->isValid() && $this->getValue('effect')) {
            $this->effect = EffectTable::getInstance()->
                findOneBySlug($this->getValue('effect'));
            return $this->effect;
        } else {
            return null;
        }
    }

    public function getKeyword()
    {
        if ($this->keyword) {
            return $this->keyword;
        }

        if ($this->isValid() && $this->getValue('keyword')) {
            $this->keyword = $this->getValue('keyword');
            return $this->keyword;
        } else {
            return null;
        }
    }

    public function getKeywords()
    {
        $keyword = $this->getKeyword();
        if ($keyword) {
            $keyword = $this->splitKeyword($keyword);
        }

        return $keyword;
    }

    public function getLogId()
    {
        $log_id = $this->getValue('log');
        if ($log_id) {
            return $log_id;
        } else if ($this->search_log) {
            return Util::encrypt($this->search_log->getId());
        } else {
            return null;
        }
    }

    public function recordSearchLog(Member $member = null, $is_logged_in)
    {
        /*
         * 検索ログを記録する。
         * ページャで移動した時には記録しないようにするため、page パラメータが
         * 存在しない場合のみ記録する。
         * また、絞り込み検索の場合にも記録しないようにするため、sub_category2
         * 及び effect2 パラメータが存在しない場合のみ記録する。
         */
        if ($this->getValue('page') ||
            $this->getValue('sub_category2') || $this->getValue('effect2')) {
            return;
        }

        $this->search_log = new ProductSearchLog();
        if ($member) {
            $this->search_log->setMemberId($member->getId());
            $this->search_log->setAge($member->getAge());
            $this->search_log->setPrefecture($member->getPrefecture());
        }
        $this->search_log->setLoginFlag($is_logged_in);
        $this->search_log->setLine($this->getValue('line'));
        $this->search_log->setCategory($this->getValue('category'));
        $this->search_log->setSubCategory($this->getValue('sub_category'));
        $this->search_log->setEffect($this->getValue('effect'));
        $this->search_log->setSort($this->getValue('sort'));
        $this->search_log->setHit($this->getQuery()->count());
        $this->search_log->setValidFlag($this->isValid());

        if ($this->getKeywords()) {
            foreach ($this->getKeywords() as $idx => $keyword) {
                $keyword_log = new ProductSearchKeywordLog();
                $keyword_log->setSubNumber($idx + 1);
                $keyword_log->setKeyword($keyword);
                $this->search_log->getKeywords()->add($keyword_log);
            }
        }

        $this->search_log->save();
    }

    public function isWithInResult(Product $product)
    {
        if (!$this->isValid()) {
            return false;
        }

        $query = $this->getQuery();
        $query->addWhere('r.id = ?', $product->getId());
        if ($query->count() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
