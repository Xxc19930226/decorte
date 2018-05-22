<?php

class AccessHistoryFilter extends sfFilter
{
    public function execute($filter_chain)
    {
        $filter_chain->execute();

        $context = sfContext::getInstance();
        $user = $context->getUser();
        $request = $context->getRequest();
        $response = $context->getResponse();
        $ctype = $response->getContentType();
        if ((preg_match('/^text\/html/', $ctype) ||
             preg_match('/^application\/xhtml\+xml/', $ctype)) &&
            !$request->isXmlHttpRequest() &&
            $response->getStatusCode() != 301 &&
            $response->getStatusCode() != 302) {
            $user->setPreviousUrl($request->getUri());
        }
    }
}
