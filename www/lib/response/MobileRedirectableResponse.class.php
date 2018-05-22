<?php

class MobileRedirectableResponse extends sfWebResponse
{
    public function setHttpHeader($name, $value, $replace = true)
    {
        if (strcasecmp($name, 'location') == 0) {
            $matches = array();
            if (preg_match('/^http[s]*:\/\/([^\/]+)/', $value, $matches)) {
                $redirect_host = $matches[1];

                $request = sfContext::getInstance()->getRequest();
                if ($request->getHttpHeader('Host') == $redirect_host && SID &&
                    !strstr($value, SID)) {
                    $value .=
                        (strrchr($value, '?') === false ? '?' : '&') . SID;
                }
            }
        }

        parent::setHttpHeader($name, $value, $replace);
    }
}
