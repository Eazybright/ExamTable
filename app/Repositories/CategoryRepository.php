<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function get()
    {
        return Category::get();
    }

    public function save($request, $user_id)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->user_id = $user_id;
        return $category->save();
    }

    public function delete($category_id)
    {
        $cat = Category::findOrFail($category_id);
        return $cat->delete();
    }   
}