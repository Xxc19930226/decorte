<?php

require_once dirname(__FILE__).'/../lib/productGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/productGeneratorHelper.class.php';

/**
 * product actions.
 *
 * @package    cosmedecorte
 * @subpackage product
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class productActions extends autoProductActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->getUser()->getAttributeHolder()->remove('N1added');
        parent::executeIndex($request);
    }

    protected function doLiveup(Product $product, $msgidx = '')
    {
        try {
            $product->liveup();
        } catch (NoLineException $e) {
            $this->getUser()->setFlash(
                'error' . $msgidx,
                '本番に所属ラインが存在しないため' .
                '「' . $product->getName() . '」を本番反映できませんでした');
            return false;
        } catch (NoCategoryException $e) {
            $this->getUser()->setFlash(
                'error' . $msgidx,
                '本番に所属カテゴリが存在しないため' .
                '「' . $product->getName() . '」を本番反映できませんでした');
            return false;
        } catch (NoSubCategoryException $e) {
            $this->getUser()->setFlash(
                'error' . $msgidx,
                '本番に所属サブカテゴリが存在しないため' .
                '「' . $product->getName() . '」を本番反映できませんでした');
            return false;
        } catch (NoEffectException $e) {
            $this->getUser()->setFlash(
                'error' . $msgidx,
                '本番に所属効果が存在しないため' .
                '「' . $product->getName() . '」を本番反映できませんでした');
            return false;
        }

        return true;
    }

    public function executeLiveup(sfWebRequest $request)
    {
        $product = $this->getRoute()->getObject();
        if ($this->doLiveup($product)) {
            $this->getUser()->setFlash('notice', 'アイテムを本番反映しました');
        }
        $this->redirect('product/index');
    }

    public function executeBatchLiveup(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids');

        $is_all_success = true;
        $msgidx = 1;
        foreach ($ids as $id) {
            $product = ProductTable::getInstance()->find($id);
            if (!$this->doLiveup($product, $msgidx)) {
                $is_all_success = false;
                $msgidx++;
            }
        }

        if ($is_all_success) {
            $this->getUser()->setFlash('notice', 'アイテムを本番反映しました');
        }
        $this->redirect('product/index');
    }

    public function executeDeleteIngredient(sfWebRequest $request) {
        $this->forward404Unless($this->getRequest()->isXmlHttpRequest());

        $ingredient =
            ProductIngredientTable::getInstance()->
            find($request->getParameter('ingredient_id'));
        if (!$ingredient) {
            return $this->renderText('Error '. $request->getParameter('id'));
        }
        $ingredient->delete();

        sfContext::getInstance()->getUser()->setAttribute('N1added', --$index);

        return $this->renderText('');
    }

    public function executeAddIngredient(sfWebRequest $request) {
        $product_id = $request->getParameter('id');
        $index = sfContext::getInstance()->getUser()->getAttribute('N1added');

        $configuration = sfContext::getInstance()->getConfiguration();
        $configuration->loadHelpers(array('jQuery', 'Asset', 'Tag', 'Url'));

        $form = new ProductForm();
        $form->setWidgets(array('id' => new sfWidgetFormInputHidden()));
        $form->setValidators(
            array('id' => new sfValidatorDoctrineChoice(
                      array('model' => 'Product',
                            'column' => 'id',
                            'required' => false))));
        $widgetSchema = $form->getWidgetSchema();
        $widgetSchema->setNameFormat('product[%s]');

        for ($i = 0; $i < 1; $i++) {
            $ingredient = new ProductIngredient();
            if ($product_id) {
                $ingredient->setProductId($product_id);
            }
            $form->embedForm(
                'ingredient_' . ++$index,
                new ProductIngredientForm($ingredient));
            $widgetSchema->setLabel('ingredient_' . $index, "成分$index");
        }

        $label = "成分$index" .
            jq_link_to_remote(
                image_tag('/sf/sf_admin/images/add'),
                array('url' => '@product_add_ingredient?id=' .
                      $product_id . '&index=' . $index,
                      'update' => 'sf_fieldset_none',
                      'position' => 'bottom'));
        $widgetSchema->setLabel('ingredient_' . $index, $label);

        sfContext::getInstance()->getUser()->setAttribute('N1added', $index);

        $this->form = $form;
        return $this->renderPartial('product/ingredient');
    }
}
