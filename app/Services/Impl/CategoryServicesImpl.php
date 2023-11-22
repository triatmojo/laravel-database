<?php

namespace App\Services\Impl;

use App\Models\Category;
use App\Services\CategoryServices;

class CategoryServicesImpl implements CategoryServices
{

    public function saveCategory(string $id, string $name, string $description): void
    {
        $category = new Category();
        $category->id = $id;
        $category->name = $name;
        $category->description = $description;
        $category->save();
    }

    public function getCategory(): array
    {
        return Category::query()->get()->toArray();
    }

    public function removeCategory($categoryId): void
    {
        $category = Category::query()->where('id', $categoryId);
        $category->delete();
    }
}
