<?php

namespace App\Providers;

use App\Service\Impl\TodolistServiceImpl;
use App\Service\TodolistService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class TodolistServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [
        TodolistService::class => TodolistServiceImpl::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function provides()
    {
        return [TodolistService::class];
    }
}
