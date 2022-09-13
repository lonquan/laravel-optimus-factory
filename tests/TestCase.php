<?php

namespace Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use AntCool\OptimusFactory\LaravelOptimusFactoryServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelOptimusFactoryServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
    }
}
