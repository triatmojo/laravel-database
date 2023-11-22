<?php

namespace Tests\Feature;

use App\Models\Category;
use Database\Seeders\CategorySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

class CategoryControllerTest extends TestCase
{
    public function testInsert()
    {
        $category = new Category();

        $category->id = "Gadget";
        $category->name = "Samsung";
        $category->description = "Samsung";
        $result = $category->save();

        assertTrue($result);
    }

    public function testInsertManyCategories()
    {
        $categories = [];
        for ($i = 1; $i <= 10; $i++) {
            $categories[] = [
                'id' => uniqid(),
                'name' => "Category Name $i",
                'description' => "Category Description $i"
            ];

        }
        $result = Category::query()->insert($categories);
        self::assertTrue($result);

        $total = Category::query()->count();
        self::assertEquals(10, $total);
    }

    public function testFind()
    {
        $this->seed(CategorySeeder::class);

        $category = Category::query()->find("FOOD");
        self::assertNotNull($category);
        assertEquals("Food", $category->name);
    }
}
