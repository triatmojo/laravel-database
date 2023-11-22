<?php

namespace App\Services;

interface CategoryServices
{
    public function saveCategory(string $id, string $name, string $description) : void;
    public function getCategory() : array;
    public function removeCategory($categoryId) : void;
}
