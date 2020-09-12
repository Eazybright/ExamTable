<?php

namespace App\Repositories\Interfaces;

interface CategoryRepositoryInterface
{
    public function get();

    public function save($request, $user_id);


    public function delete($category_id);
}