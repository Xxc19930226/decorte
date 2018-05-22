<?php

class HttpsFilter extends sfFilter
{
    public function execute($filter_chain)
    {
        $context = sfContext::getInstance();
        $request = $context->getRequest();
        $path = $request->getPathInfo();
        $url = $request->getUri();

        if (!$request->isXmlHttpRequest()) {
            if (preg_match('/^\/member\//', $path) ||
                (preg_match('/^\/campaign\//', $path) &&
                 (!preg_match('/^\/campaign\/aq_mw\/basemake\//', $path) &&
                  !preg_match('/^\/campaign\/tgc2013\//', $path))) ||
                preg_match('/^\/contact\//', $path) ||
                preg_match('/^\/reserve\//', $path)) {
                if (!$request->isSecure()) {
                    $url = preg_replace('/^http:\/\//', 'https://', $url);
                    return $context->getController()->redirect($url);
                }
            } else {
                if (!preg_match('/\/images\//', $path) &&
                    !preg_match('/\/css\//', $path) &&
                    !preg_match('/\/js\//', $path) &&
                    $request->isSecure()) {
                    $url = preg_replace('/^https:\/\//', 'http://', $url);
                    $url = $context->getController()->genUrl($url);
                    return $context->getController()->redirect($url);
                }
            }
        }

        $filter_chain->execute();
    }
}
