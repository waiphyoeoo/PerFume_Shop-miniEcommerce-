<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function admin()
    {

        $formData = request()->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            'password' => ['required', 'min:8']
        ], [
            'email.required' => "We need your Email",
            'password.min' => 'Password must be greater than 8 character'
        ]);
        if (auth()->attempt($formData)) {
            if (auth()->user()->is_admin) {
                return redirect('/create')->with('success', "Admin is login successed ");
            } else {
                return redirect('/')->with('success', "Sorry!Your wrong creditial");
            }
        }
    }
    public function create()
    {
        return view('create', [
            "categories" => Category::all()
        ]);
    }
    public function show()
    {
        return view(
            'product',
            [
                'products' => Product::latest()->Paginate(5)
            ]
        );
    }
    public function createpost(Product $product)
    {
        $products = request()->validate(
            [
                "name" => ['required'],
                "price" => ['required'],
                'description' => ['required'],
                "category_id" => ["required", Rule::exists("categories", "id")]
            ]
        );
        $products['thumbnail'] = request()->file('thumbnail') ?  request()->file('thumbnail')->store('thumbnail') : "";
        $product->create($products);
        return redirect()->back()->with('success', "Your Product is created");
    }
    public function edit(Product $product)
    {
        return view(
            'edit',
            [
                'products' => $product,
                'categories' => Category::all()
            ]
        );
    }
    public function update(Product $product)
    {

        $updateData = request()->validate([
            "name" => "required",
            "price" => "required",
            "description" => "required",
            "category_id" => "required"
        ]);
        $updateData["thumbnail"] = request()->file("thumbnail") ? request()->file('thumbnail')->store("thumbnail") : "";
        $product->create($updateData);
        return redirect()->back()->with('success', 'Your Product is updated');
    }
    public function destory(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'Your Product is deleted');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->back();
    }
    public function order()
    {
        return view('order', [
            "orders" => Order::latest()->paginate(5)
        ]);
    }
    public function destoryOrder(Order $order)
    {
        $order->delete();
        return redirect()->back()->with('succes', 'A Order is Deleted');
    }
}
