<?php

/**
 * main actions.
 *
 * @package    cosmedecorte
 * @subpackage main
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class mainActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
    }

    public function executeShowStaticFile(sfWebRequest $request)
    {
        $redirect_url = $request->getUri();
        $redirect_url = preg_replace('/\?.*$/', '', $redirect_url);
        $redirect_url =
            RedirectUrlTable::getInstance()->findOneBySource($redirect_url);

        if ($redirect_url) {
            $_GET["redirect_url"] = $redirect_url->getDestination();

            $sp_url = $redirect_url->getDestinationSp();
            if ($sp_url) {
                $_GET["sp_redirect_url"] = $sp_url;
            }

            $mb_url = $redirect_url->getDestinationMb();
            if ($mb_url) {
                $_GET["mb_redirect_url"] = $mb_url;
            }

            include(sfConfig::get('sf_web_dir') . '/redirect.php');
            exit;
        }

        $url = $request->getPathInfo();

        $config = $this->getContext()->getConfiguration();
        $qstring = http_build_query($request->getGetParameters());
        $device_type = $config->getDeviceType();

        /*
         * アクセスしてきたブラウザ用以外のコンテンツを閲覧しようとしている場
         * 合は、適切なページへリダイレクトさせる。
         */
        if (preg_match('/^\/sp\//', $url)) {
            if ($device_type == frontendConfiguration::DEVICE_TYPE_PC) {
                $url = preg_replace('/^\/sp\//', '/', $url);
                $this->redirect($url . ($qstring ? '?' . $qstring : ''));
            }
        } else if ((preg_match('/\.html$/', $url) ||
            preg_match('/\/$/', $url)) &&
            (preg_match('/^\/salon\//', $url) ||
             preg_match('/^\/recipe_de_cosmedecorte\//', $url) ||
             preg_match('/^\/marcelwanders_collection\//', $url))) {
            if ($device_type != frontendConfiguration::DEVICE_TYPE_PC) {
                $url = '/sp' . $url;
                $this->redirect($url . ($qstring ? '?' . $qstring : ''));
            }
        }

        $path = sfConfig::get('sf_web_dir') . $url;

        if (preg_match('/\/$/', $path)) {
            $path .= 'index.html';
        }

        $ctype = null;
        if (preg_match('/\.gif$/', $path)) {
            $ctype = 'image/gif';
        } else if (preg_match('/\.jpg$/', $path)) {
            $ctype = 'image/jpeg';
        } else if (preg_match('/\.png$/', $path)) {
            $ctype = 'image/png';
        }

        if ($ctype) {
            if (!file_exists($path)) {
                $routing = sfContext::getInstance()->getRouting();
                $routes = $routing->getRoutes();
                unset($routes['static_file']);
                $routing->clearRoutes();
                $routing->setRoutes($routes);

                $new_route = $routing->parse($url);
                if (!$new_route) {
                    $this->forward404();
                }

                foreach ($new_route as $key => $value) {
                    $request->setParameter($key, $value);
                }

                $request->setAttribute('sf_route', $new_route['_sf_route']);
                $this->forward($new_route['module'], $new_route['action']);
            }

            $response = $this->getResponse();

            // 負荷軽減のためブラウザキャッシュを有効にする
            $response->setHttpHeader('Cache-Control', '');
            $response->setHttpHeader('Pragma', '');
            $response->setHttpHeader('Expires', '');

            $if_modified = $request->getHttpHeader('If-Modified-Since');
            if ($if_modified &&
                filemtime($path) == strtotime($if_modified)) {
                $response->setStatusCode(304);
                return sfView::NONE;
            }

            $response->setHttpHeader(
                'Last-Modified',
                gmdate('D, d M Y H:i:s', filemtime($path)) . ' GMT');

            $response->setContentType($ctype);
            $response->setContent(file_get_contents($path));

            return sfView::NONE;
        }

        if (!file_exists($path)) {
            $this->forward404();
        }

        $this->file_name = $path;
    }

    public function executeShowSitemapXml(sfWebRequest $request)
    {
        $this->lines = LineTable::getInstance()->findAll();
        $this->products = ProductTable::getInstance()->findAll();

        $this->setLayout(false);
        $this->getResponse()->setContentType('text/xml');
    }

    public function executeSetPcMode(sfWebRequest $request)
    {
        $this->forward404Unless($request->isXmlHttpRequest());

        $this->getContext()->getConfiguration()->setForcePcMode();

        return sfView::NONE;
    }

    public function executeResetPcMode(sfWebRequest $request)
    {
        $this->forward404Unless($request->isXmlHttpRequest());

        $this->getContext()->getConfiguration()->resetForcePcMode();

        return sfView::NONE;
    }

    public function executeError404(sfWebRequest $request)
    {
        $response = $this->getResponse();
        $response->setStatusCode(302);
        $response->setHttpHeader('Location', '/');
        return sfView::NONE;
    }
}
