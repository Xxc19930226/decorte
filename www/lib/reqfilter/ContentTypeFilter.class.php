<?php

class ContentTypeFilter extends sfFilter
{
    public function execute($filter_chain)
    {
        $filter_chain->execute();

        $context = sfContext::getInstance();
        $request = $context->getRequest();
        $response = $context->getResponse();

        $ua = $request->getHttpHeader('User-Agent');
        $ctype = $response->getContentType();
        if (preg_match('/^DoCoMo/', $ua) &&
            preg_match('/^text\/html/', $ctype)) {
            $response->setContentType('application/xhtml+xml');
        }
    }
}
