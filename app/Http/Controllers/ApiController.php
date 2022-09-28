<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function showCategory()
    {
        $category = Category::all();
        return response()->json(['success' => true, 'data' => $category]);
    }
    public function showProduct()
    {
        // $product = Product::with('category')->latest()->paginate(6);
        $product = Product::latest();
        if (request('category_id')) {
            $product->where('category_id', request('category_id'));
        }
        $product = $product->paginate(3);
        return response()->json(['success' => true, "data" => $product]);
    }

    public function send(Request $request)
    {
        $order = Order::create([
            'name' => $request->name,
            'price' => $request->price,
            'thumbnail' => $request->thumbnail,
            'totalprice' => $request->totalAmount
        ]);
        return response()->json([
            'message' => true,
            'data' => $order
        ]);
    }
}
