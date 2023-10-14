<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $params = request()->query();
        $products = Product::with('category')->draft()->filter($params)->paginate($params['row'] ?? 10);

        $categories = Category::all();

        return view('welcome', compact('products', 'categories'));
    }

    public function anotherFilter()
    {
        $params = request()->query();
        $products = Product::with('category')
            ->when(@$params['search'], function ($query) use ($params) {
                $query->where('name', 'like', '%' . $params['search'] . '%');
            })
            ->when(@$params['category_id'], function ($query) use ($params) {
                $query->where('category_id', $params['category_id']);
            })
            ->paginate($params['row'] ?? 10);
    }
}
