<?php

namespace AntCool\OptimusFactory\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see  \AntCool\OptimusFactory\Factory::class
 */
class OptimusFactoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \AntCool\OptimusFactory\Factory::class;
    }
}
