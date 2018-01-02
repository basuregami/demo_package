<?php

namespace olivemediapackage\demopackage\Facades;

use Illuminate\Support\Facades\Facade;

class AppServiceProvider extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'demo_package';
    }    
}

