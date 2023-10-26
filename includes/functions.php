<?php


/**
 * Escape special characters when outputting a string
 * @param $string
 * @return string
 */
function e($string)
{
    return htmlentities($string, ENT_QUOTES, 'UTF-8');

}