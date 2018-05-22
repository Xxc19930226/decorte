<?php

class C3ImageConvFilter extends sfFilter
{
    public function execute($filter_chain)
    {
        $filter_chain->execute();

        $context = sfContext::getInstance();
        $request = $context->getRequest();
        $response = $context->getResponse();

        $carrier = $request->getHttpHeader('X-C3-Browser-Carrier');
        if ($carrier != 1 && $carrier != 2 && $carrier != 3) {
            return;
        }

        $ctype = $response->getContentType();
        if (!preg_match('/^image\/gif/', $ctype) &&
            !preg_match('/^image\/jpeg/', $ctype) &&
            !preg_match('/^image\/png/', $ctype)) {
            return;
        }

        $content = $response->getContent();
        if (!$content) {
            return;
        }

        if ($request->getHttpHeader('X-C3-Browser-PixWidth') <= 240) {
            return;
        }

        $url = $request->getPathInfo();
        $cache = new sfFileCache(
            array('cache_dir' =>
                  sfConfig::get('sf_app_cache_dir') .
                  '/mobile' . $url . '/' . $carrier));
        $cache_key = basename($request->getHttpHeader('X-C3-Browser-Name'));

        $last_modified = $response->getHttpHeader('Last-Modified');

        if ($cache->getTimeout($cache_key) == 0 || !$last_modified ||
            $cache->getLastModified($cache_key) < strtotime($last_modified)) {
            $image = new Imagick();
            $image->readImageBlob($content);

            $src_width = $image->getImageWidth();
            $src_height = $image->getImageHeight();
            $rate = $request->getHttpHeader('X-C3-Browser-PixWidth') / 240;

            $new_width = $src_width * $rate;
            $new_height = $src_height * $rate;
            if ($new_width > 1 && $new_height > 1) {
                $image->resizeImage(
                    $new_width, $new_height, imagick::FILTER_LANCZOS, 0);
            }

            $data = $image->getImageBlob();

            $cache->set(
                $cache_key, $data,
                sfConfig::get('app_product_mobile_cache_lifetime'));
        } else {
            $data = $cache->get($cache_key);
        }

        $response->setContent($data);
    }
}
