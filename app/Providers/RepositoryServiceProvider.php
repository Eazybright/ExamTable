<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        //bind your interface here
        $this->app->bind(
            CategoryRepositoryInterface::class, CategoryRepository::class
        );

        // $this->app->bind(
        //     UserRepositoryInterface::class, UserRepository::class
        // );

        // $this->app->bind(
        //     RoleRepositoryInterface::class, RoleRepository::class
        // );
    }
}