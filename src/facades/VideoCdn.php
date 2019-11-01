<?php

namespace Wzzirro\VideoCdn\Facades;

use Illuminate\Support\Facades\Facade;

class VideoCdn extends Facade
{
    /**
     * @inheritDoc
     */
    protected static function getFacadeAccessor()
    {
        return 'videocdn';
    }
}