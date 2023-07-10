<?php

namespace App\Providers;

use App\Services\Impl\TodoListImpl;
use App\Services\TodoListService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class TodoListProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        TodoListService::class => TodoListImpl::class
    ];

    function provides():array
    {
        return [TodoListService::class];
    }
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
}
