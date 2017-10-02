<?php
namespace App\Http\Controllers;
use App\Models\Category;

class CategoriesListController extends Controller
{
    public function categoriesList()
    {
        $categories = Category::all();
        return view('mylayouts.categories', compact('categories'));
    }
}
