<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brand.index', compact('brands'));
    }

    public function create()
    {
        return view('brand.create');
    }

    public function store(Request $request)
    {

        $brands = Brand::create([
            'name' => $request->name
        ]);

        return redirect()->route('brand.index');
    }

    public function edit($id)
    {
        $brand = Brand::where('id', $id)->first();

        return view('brand.edit', compact('brand'));
    }

    public function update($id, Request $request)
    {
        Brand::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('brand.index');
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);

        $brand->delete();

        return redirect()->route('brand.index');
    }
}
