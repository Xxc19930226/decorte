<?php

/**
 * Line form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class LineForm extends BaseLineForm
{
    public function configure()
    {
        // ライン名
        $this->setValidator('name', new brValidatorJapaneseString());
        $this->getValidator('name')->setOption('trim', true);

        // ライン名(英語)
        $this->setValidator('name_en', new brValidatorJapaneseString());
        $this->getValidator('name_en')->setOption('trim', true);

        // スラッグ
        $this->setValidator('slug', new brValidatorJapaneseString());
        $this->getValidator('slug')->setOption('trim', true);

        // 検索インデックス
        $this->setWidget('search_index', new sfWidgetFormTextArea());
        $this->setValidator('search_index', new brValidatorJapaneseString());
        $this->getValidator('search_index')->setOption('required', false);
        $this->getValidator('search_index')->setOption('trim', true);
        $this->getValidator('search_index')->setOption('z2h_space', true);
        $this->getValidator('search_index')->setOption('merge_space', true);

        $this->useFields(
            array('name', 'name_en', 'slug', 'priority', 'major_flag',
                  'skincare_system_flag', 'search_index'));

        $this->validatorSchema->setPostValidator(
            new sfValidatorCallback(
                array('callback' => array($this, 'validatorCallback'))));

        $this->resetToDefaultMessages();
    }

    public function validatorCallback(sfValidatorBase $validator, $values)
    {
        /*
         * 検索インデックスに、重複して同じインデックスが指定されていた場合は、
         * まとめて1つにする。
         */
        $indexes = explode(' ', $values['search_index']);
        $new_indexes = array();
        foreach ($indexes as $index) {
            if (array_key_exists($index, $new_indexes)) {
                continue;
            }

            $new_indexes[$index] = true;
        }
        $values['search_index'] = implode(' ', array_keys($new_indexes));

        return $values;
    }
}
