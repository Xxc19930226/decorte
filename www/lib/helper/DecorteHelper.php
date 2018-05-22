<?php

function split_by_span($s)
{
    $s = preg_replace('/(\P{Zs}+\p{Zs}*)/', '<span>$1</span>', $s);
    return $s;
}

function hide_log_query($s)
{
    error_log($s);
    $s = preg_replace('/[\?&]log=[^&]+$/', '', $s);
    $s = preg_replace('/([\?&])log=[^&]+&/', '$1', $s);
    return $s;
}
