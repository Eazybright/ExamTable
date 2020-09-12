<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        //bind your interface here
        // $this->app->bind(
        //     PostRepositoryInterface::class, PostRepository::class
        // );

        // $this->app->bind(
        //     UserRepositoryInterface::class, UserRepository::class
        // );

        // $this->app->bind(
        //     RoleRepositoryInterface::class, RoleRepository::class
        // );
    }
}