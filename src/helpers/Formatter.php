<?php

namespace wzzirro\videocdn\helpers;

/**
 *
 */
class Formatter
{
    /**
     * @param string $string
     *
     * @return string
     */
    public static function camelCase(string $string)
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
    }
}