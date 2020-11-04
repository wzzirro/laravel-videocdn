<?php

namespace Wzzirro\VideoCdn\Helpers;

/**
 *
 */
class Formatter
{
    /**
     * @param $string
     *
     * @return mixed
     */
    public static function camelCase($string)
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
    }
}