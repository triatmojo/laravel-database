<?php

namespace App\Providers;

use App\Services\CategoryServices;
use App\Services\Impl\CategoryServicesImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        CategoryServices::class => CategoryServicesImpl::class
    ];
    /**
     * Register services.
     */

    public function provides() : array
    {
        return [CategoryServices::class];
    }

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
