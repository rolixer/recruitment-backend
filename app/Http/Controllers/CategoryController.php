<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategoriesView(int $category_id = 0)
    {

        $categories = Category::all();

        return view('category', [
            'categories' => $categories,
            'category_id' => $category_id
        ]);
    }

    public function getCategories(Request $request)
    {
        $category_id = $request->input('category_id', 0);
        return $this->getCategoriesView($category_id);
    }
}
