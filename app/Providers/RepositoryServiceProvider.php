<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Http\Repositories\RepositoriesInterface;
use App\Http\Repositories\Eloquent\AreaEloquent;
use App\Http\Repositories\Eloquent\SubEloquent;
use App\Http\Repositories\Eloquent\PropertyEloquent;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RepositoriesInterface::class, AreaEloquent::class);
        $this->app->bind(RepositoriesInterface::class, SubEloquent::class);
        $this->app->bind(RepositoriesInterface::class, PropertyEloquent::class);
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
