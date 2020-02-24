<?php

namespace App\Providers;


use App\Repositories\ApiArticleControllerRepositories;
use App\Repositories\ApiArticleControllerRepositoriesInterface;
use App\Repositories\ArticlesRepository;
use App\Repositories\ArticlesRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
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
        $this->app->bind(ArticlesRepositoryInterface::class,ArticlesRepository::class);
        $this->app->bind(ApiArticleControllerRepositoriesInterface::class, ApiArticleControllerRepositories::class);
    }
}
