<?php

class DynCssWebResponse extends MobileRedirectableResponse
{
    public function addStylesheet($file, $position = '', $options = array())
    {
        $file = $file .
            (strpos($file, '?') !== false ? '&' : '?') . 'ver=' . time();
        parent::addStylesheet($file, $position, $options);
    }
}
