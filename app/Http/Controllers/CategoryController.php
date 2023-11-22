<?php

namespace App\Http\Controllers;

use App\Services\CategoryServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    private CategoryServices $categoryServices;

    /**
     * @param CategoryServices $categoryServices
     */
    public function __construct(CategoryServices $categoryServices)
    {
        $this->categoryServices = $categoryServices;
    }


    public function getCategory()
    {
        $category = $this->categoryServices->getCategory();
        return response()->view('category.category', [
            'title' => "Categories",
            'category' => $category
         ]);
    }

    public function addCategory(Request $request) : Response | RedirectResponse
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        if(empty($data)) {
            $category = $this->categoryServices->getCategory();
            return response()->view('category.category', [
                'title' => "Categories",
                'category' => $category,
                'error' => "name or description is required"
            ]);
        }

        $this->categoryServices->saveCategory(uniqid(), $data['name'], $data['description']);
        return redirect('category');

    }

    public function removeCategory($categoryId)
    {
        $this->categoryServices->removeCategory($categoryId);
        return redirect('category');
    }
}
