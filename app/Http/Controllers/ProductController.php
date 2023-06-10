<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();

        return view('product.index', ['products' => $products]);
    }



    public function show($id)
    {
        $product = Product::where('id', $id)->with('category')->first();

        $related = Product::where('categories_id', $product->category->id)->inRandomOrder()->limit(4)->get();

        if ($product) {
            return view('product.show', compact('product', 'related'));
        } else {
            abort(404);
        }
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('product.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'categories' => 'required',
        //     'name' => 'required|string|min:3',
        //     'price' => 'required|integer',
        //     'brand' => 'required|string',
        //     'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator->errors())->withInput();
        // }

        $imageName = time() . '.' . $request->image->extension();

        Storage::putFileAs('public/product', $request->image, $imageName);

        $product = Product::create([
            'categories_id' => $request->category,
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'brands' => $request->brands,
            'image' => $imageName,
        ]);

        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->with('category')->first();

        $brands = Brand::all();
        $categories = Category::all();

        return view('product.edit', compact('product', 'brands', 'categories'));
    }

    public function update($id, Request $request)
    {
        if ($request->hasFile('image')) {
            $old_image = Product::find($id)->image;

            Storage::delete('public/product/' . $old_image);

            $imageName = time() . '.' . $request->image->extension();

            Storage::putFileAs('public/product', $request->image, $imageName);

            Product::where('id', $id)->update([
                'categories_id' => $request->category,
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'brands' => $request->brands,
                'image' => $imageName,
            ]);
        } else {

            Product::where('id', $id)->update([
                'categories_id' => $request->category,
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'brands' => $request->brands,
            ]);
        }


        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('product.index');
    }
}
