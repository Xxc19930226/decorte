<?php

/**
 * FaqDetail form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class FaqDetailForm extends BaseFaqDetailForm
{
    public function configure()
    {
        // 質問
        $this->setWidget('question', new sfWidgetFormInputText());
        $this->getValidator('question')->setOption('trim', true);

        // 検索インデックス
        $this->setWidget('search_index', new sfWidgetFormTextArea());
        $this->setValidator('search_index', new brValidatorJapaneseString());
        $this->getValidator('search_index')->setOption('required', false);
        $this->getValidator('search_index')->setOption('trim', true);
        $this->getValidator('search_index')->setOption('z2h_space', true);
        $this->getValidator('search_index')->setOption('merge_space', true);

        $this->useFields(
            array('question', 'answer', 'sub_categories_list',
                  'contents_list', 'priority', 'popular_flag',
                  'related_details_list', 'search_index'));

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
