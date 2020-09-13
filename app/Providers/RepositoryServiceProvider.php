<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\QuestionRepositoryInterface;
use App\Repositories\QuestionRepository;
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

        $this->app->bind(
            QuestionRepositoryInterface::class, QuestionRepository::class
        );

        // $this->app->bind(
        //     RoleRepositoryInterface::class, RoleRepository::class
        // );
    }
}