<?php

/**
 * product actions.
 *
 * @package    cosmedecorte
 * @subpackage product
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class productActions extends sfActions
{
    public function executeShow(sfWebRequest $request)
    {
        $this->product = $this->getRoute()->getObject();

        $log_id = $request->getParameter('log');
        if ($log_id) {
            $log_id = Util::decrypt($log_id);
        }

        $log = null;
        if ($log_id) {
            $log = ProductSearchLogTable::getInstance()->find($log_id);
            if ($log) {
                $keywords = array();
                foreach ($log->getKeywords() as $keyword_log) {
                    $keywords[] = $keyword_log->getKeyword();
                }

                $params = array(
                    'line' => $log->getLine(),
                    'category' => $log->getCategory(),
                    'sub_category' => $log->getSubCategory(),
                    'effect' => $log->getEffect(),
                    'keyword' => implode(' ', $keywords));

                $form = new ProductFormFilter();
                $form->bind($params);
                if (!$form->isWithInResult($this->product)) {
                    $log = null;
                }
            }
        }

        $this->product->recordAccessLog(
            $this->getUser()->getSupposedCurrentMember(),
            $this->getUser()->isLoggedIn(), $log);

        $view_products = $this->view_products =
            $this->getUser()->addViewProduct($this->product);
        foreach ($view_products as $view_product) {
            $view_product->addFriendProduct($this->product);
        }

        $response = $this->getResponse();

        $config = $this->getContext()->getConfiguration();
        $this->custom_detail_path = $config->getTemplatePath(
            'product',
            'custom_detail/' . $this->product->getLineSlug() . '/' .
            $this->product->getSlug() . '.html');
    }

    public function executeShowIngredient(sfWebRequest $request)
    {
        $this->product = $this->getRoute()->getObject();

        if ($request->isXmlHttpRequest()) {
            return $this->renderPartial(
                'ingredient', array('product' => $this->product));
        }
    }

    protected function processList(
        sfWebRequest $request, Doctrine_Query $query)
    {
        $page = $request->getParameter('page');
        $page_max = sfConfig::get('app_product_line_categorized_max');
        if (!$page) {
            // ページ分けしないために大きな数値を設定
            $page_max = 10000;
        }

        $this->pager = new sfDoctrinePager('Product', $page_max);
        $this->pager->setQuery($query);
        $this->pager->setPage($page ? $page : 1);
        $this->pager->init();
    }

    public function executeListInLine(sfWebRequest $request)
    {
        $line = LineTable::getInstance()->
            findOneBySlug($request->getParameter('line_slug'));
        $this->forward404Unless($line);

        $query =
            ProductTable::getInstance()->getQueryBySlugs(
                null, $line->getSlug(), null, null);

        $this->line = $line;
        $this->setTemplate('listInLineCategory');

        return $this->processList($request, $query);
    }

    public function executeListInLineCategory(sfWebRequest $request)
    {
        $line = LineTable::getInstance()->
            findOneBySlug($request->getParameter('line_slug'));
        $this->forward404Unless($line);

        $category = CategoryTable::getInstance()->
            findOneBySlug($request->getParameter('category_slug'));
        $this->forward404Unless($category);

        $query =
            ProductTable::getInstance()->getQueryBySlugs(
                null, $line->getSlug(), $category->getSlug(), null);

        $this->line = $line;
        $this->category = $category;
        $this->target = $category;

        return $this->processList($request, $query);
    }

    public function executeListInLineSubCategory(sfWebRequest $request)
    {
        $line = LineTable::getInstance()->
            findOneBySlug($request->getParameter('line_slug'));
        $this->forward404Unless($line);

        $category = CategoryTable::getInstance()->
            findOneBySlug($request->getParameter('category_slug'));
        $this->forward404Unless($category);

        $sub_category = SubCategoryTable::getInstance()->
            findOneBySlug($request->getParameter('subcategory_slug'));
        $this->forward404Unless($sub_category);

        $query =
            ProductTable::getInstance()->getQueryBySlugs(
                null, $line->getSlug(),
                $category->getSlug(), $sub_category->getSlug());

        $this->line = $line;
        $this->category = $category;
        $this->sub_category = $sub_category;
        $this->target = $sub_category;
        $this->setTemplate('listInLineCategory');

        return $this->processList($request, $query);
    }

    public function executeShowRanking(sfWebRequest $request)
    {
        return $this->renderComponent(
            'product', 'ranking',
            array('category_slug' => $request->getParameter('category_slug')));
    }

    public function executeShowChecked(sfWebRequest $request)
    {
        $this->products = $this->getUser()->getViewProducts();
    }

    public function executeShowRecommended(sfWebRequest $request)
    {
    }

    public function executeSearch(sfWebRequest $request)
    {
        $this->form = new ProductFormFilter();
        $this->form->bind($request->getGetParameters());

        if ($request->isXmlHttpRequest()) {
            return $this->renderPartial(
                'searchForm', array('form' => $this->form));
        }

        $config = $this->getContext()->getConfiguration();
        $this->pager = new sfDoctrinePager(
            'Product', sfConfig::get('app_product_search_result_max'));

        $this->form->recordSearchLog(
            $this->getUser()->getSupposedCurrentMember(),
            $this->getUser()->isLoggedIn());

        $this->pager->setQuery($this->form->getQuery());
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    protected function processThumbnail(sfWebRequest $request, $org_file)
    {
        $suffix = $request->getParameter('suffix', 'jpg');
        $width = $request->getParameter('width');
        $height = $request->getParameter('height');
        $back = $request->getParameter('back');
        $border = $request->getParameter('border');
        $back_alpha = $request->getParameter('back_alpha');

        $content_type = 'image/jpeg';
        $image_type = Util::IMAGE_TYPE_JPEG;
        switch ($suffix) {
        case 'gif':
            $content_type = 'image/gif';
            $image_type = Util::IMAGE_TYPE_GIF;
            break;
        case 'png':
            $content_type = 'image/png';
            $image_type = Util::IMAGE_TYPE_PNG;
            break;
        }

        $url = $request->getPathInfo();
        $cache = new sfFileCache(
            array('cache_dir' =>
                  sfConfig::get('sf_app_cache_dir') .
                  '/thumbnail' . dirname($url)));
        $cache_key = basename($url);

        // 負荷軽減のためブラウザキャッシュを有効にする
        $response = $this->getResponse();
        $response->setHttpHeader('Cache-Control', '');
        $response->setHttpHeader('Pragma', '');
        $response->setHttpHeader('Expires', '');

        $if_modified = $request->getHttpHeader('If-Modified-Since');
        if ($if_modified && $cache->has($cache_key) &&
            filemtime($org_file) == strtotime($if_modified)) {
            $response->setStatusCode(304);
            return sfView::NONE;
        }

        $tmb_data = '';

        if ($cache->getTimeout($cache_key) == 0 ||
            $cache->getLastModified($cache_key) < filemtime($org_file)) {
            $tmb_data =
                Util::createThumbnail(
                    $org_file, $image_type, $width, $height,
                    $back, $border, $back_alpha);
            $cache->set(
                $cache_key, $tmb_data,
                sfConfig::get('app_product_thumbnail_cache_lifetime'));
        } else {
            $tmb_data = $cache->get($cache_key);
        }

        $response->setContentType($content_type);
        $response->setContent($tmb_data);

        $response->setHttpHeader(
            'Last-Modified',
            gmdate('D, d M Y H:i:s', filemtime($org_file)) . ' GMT');

        return sfView::NONE;
    }

    public function executeShowThumbnail(sfWebRequest $request)
    {
        $product = $this->getRoute()->getObject();
        $org_file = $product->getAbsoluteImagePath();

        return $this->processThumbnail($request, $org_file);
    }
}
