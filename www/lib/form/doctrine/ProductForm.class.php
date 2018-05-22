<?php

/**
 * Product form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: ProductForm.class.php 1411 2016-04-19 09:34:07Z oda $
 */
class ProductForm extends BaseProductForm
{
    public function configure()
    {
        $configuration = sfContext::getInstance()->getConfiguration();
        $configuration->loadHelpers(array('jQuery', 'Asset', 'Tag', 'Url'));

        // 商品名
        $this->setValidator('name', new brValidatorJapaneseString());
        $this->getValidator('name')->setOption('trim', true);

        // ライン名
        $this->getValidator('line_id')->setOption('required', true);

        // 概要
        $this->setWidget('outline', new sfWidgetFormTextArea());
        $this->getValidator('outline')->setOption('required', false);

        // 説明
        $this->setWidget('explanation', new sfWidgetFormTextArea());
        $this->getValidator('explanation')->setOption('required', false);

        // 使用方法
        $this->setWidget('how_to', new sfWidgetFormTextArea());

        // 補足事項1
        $this->setWidget('supplement1', new sfWidgetFormTextArea());

        // 補足事項2
        $this->setWidget('supplement2', new sfWidgetFormTextArea());

        // 新商品発売情報
        $this->setWidget('newitem_rel_info', new sfWidgetFormTextArea());

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

        // Cafe de COSMEDECORTE リンク先
        $this->getValidator('cafe_link_url')->setOption('trim', true);
        $this->getValidator('cn_shop_link_url')->setOption('trim', true);

        $fields =
            array('name', 'line_id', 'category_id', 'sub_category_id',
                  'daytime_flag', 'night_flag', 'outline', 'explanation',
                  'capacity', 'set_flag', 'colors', 'new_colors', 'price',
                  'how_to', 'slug', 'color_ball_flag', 'quasi_drug_flag',
                  'supplement1', 'supplement2', 'newitem_rel_info',
                  'bestcosme_flag', 'line_priority', 'category_priority',
                  'effects_list', 'search_only_flag', 'search_pc_link',
                  'search_sub_category', 'search_keyword_only_flag',
                  'search_index', 'cafe_link_url', 'cn_shop_link_url');

        $index = 0;
        foreach ($this->getObject()->getIngredients() as $ingredient) {
            $this->embedForm(
                'ingredient_' . ++$index,
                new ProductIngredientForm($ingredient));
            $label = "成分$index" .
                jq_link_to_remote(
                    image_tag('/sf/sf_admin/images/delete'),
                    array('url' =>
                          '@product_delete_ingredient?ingredient_id=' .
                          $ingredient->getId(),
                          'success' =>
                          "jQuery('.sf_admin_form_field_ingredient_$index').remove();",
                          'confirm' => '本当に削除してもよろしいですか?'));
            $this->widgetSchema->setLabel('ingredient_' . $index, $label);
            $fields[] = 'ingredient_' . $index;
        }

        $a = sfContext::getInstance()->getUser()->getAttribute('N1added');
        $more = $this->getObject()->isNew() ?
            max(1, $a - $index) : ($a > ($index + 1) ? $a - $index : 1);
        for ($i = 0; $i < $more; $i++) {
            $ingredient = new ProductIngredient();
            $ingredient->setProduct($this->getObject());
            $this->embedForm(
                'ingredient_' . ++$index,
                new ProductIngredientForm($ingredient));
            $this->widgetSchema->
                setLabel('ingredient_' . $index, "成分$index");
            $fields[] = 'ingredient_' . $index;
        }

        $label = "成分$index" .
            jq_link_to_remote(
                image_tag('/sf/sf_admin/images/add'),
                array('url' =>
                      '@product_add_ingredient?id=' .
                      $this->getObject()->getId() . '&index=' . $index,
                      'update' => 'sf_fieldset_none',
                      'position' => 'bottom'));
        $this->widgetSchema->setLabel('ingredient_' . $index, $label);

        sfContext::getInstance()->getUser()->setAttribute('N1added', $index);

        $this->useFields($fields);

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

    public function bind(
        array $taintedValues = null, array $taintedFiles = null)
    {
        for ($i = 1;
             $i <= sfContext::getInstance()->
                 getUser()->getAttribute('N1added', 1);
             $i++) {
            if (!isset($taintedValues["ingredient_$i"]) ||
                (empty($taintedValues["ingredient_$i"]['symbol']) &&
                 empty($taintedValues["ingredient_$i"]['content']) &&
                 empty($taintedValues["ingredient_$i"]['display_order']))) {
                $this->embeddedForms['ingredient_' . $i]->
                    getObject()->delete();
                unset($this->embeddedForms["ingredient_$i"],
                      $this->validatorSchema["ingredient_$i"]);
                unset($taintedValues['ingredient_' . $i]);
            } else {
                $this->embeddedForms['ingredient_' . $i]->
                    getObject()->setProduct($this->getObject());
            }

        }

        return parent::bind($taintedValues, $taintedFiles);
    }
}
