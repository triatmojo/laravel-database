<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = new Category();
        $category->id = "FOOD";
        $category->name = "Food";
        $category->description = "Food Category";

        $category = new Category();
        $category->id = "DRINK";
        $category->name = "drink";
        $category->description = "Drink Category";

        $category = new Category();
        $category->id = "ELEKTRONIK";
        $category->name = "Elektronik";
        $category->description = "Food Category";
    }
}
