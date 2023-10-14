<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $params = request()->query();
        $products = Product::with('category')->filter($params)->paginate($params['row'] ?? 10);

        return view('products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // DB::transaction(function () use ($data) {
        //     $this->processData($data);
        // });

        try {
            DB::beginTransaction();

            $this->processData($data);

            DB::commit();

            return back()->with('success', 'Product has been created!');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return back()->with('error', $th->getMessage());
        }
    }

    private function processData($data)
    {
        // store product (success)
        $product = Product::create($data);

        // stock (error)
        $product->stocks()->create([
            'quantity' => $data['quantity'],
            'price' => $data['price'],
        ]);

        // upload image (error)
        if ($data['image']->hasFile('image')) {
            $product->addMediaFromRequest('image')->toMediaCollection('product');
        }
    }
}
