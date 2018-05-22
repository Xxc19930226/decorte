<?php

class AdminHttpsFilter extends sfFilter
{
    public function execute($filter_chain)
    {
        $context = sfContext::getInstance();
        $request = $context->getRequest();
        $url = $request->getUri();

        if (!$request->isSecure()) {
            $url = preg_replace('/^http:\/\//', 'https://', $url);
            return $context->getController()->redirect($url);
        }

        $filter_chain->execute();
    }
}
