<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\CafeteriaProduct;

class ProductController extends Controller
{
    public function index()
    {
        $products = CafeteriaProduct::orderBy('name')->paginate(15);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(StoreProductRequest $request)
    {
        CafeteriaProduct::create($request->validated());

        return redirect()->route('admin.products.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    public function show(CafeteriaProduct $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(CafeteriaProduct $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(StoreProductRequest $request, CafeteriaProduct $product)
    {
        $product->update($request->validated());

        return redirect()->route('admin.products.index')
            ->with('success', 'Producto actualizado.');
    }

    public function destroy(CafeteriaProduct $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Producto eliminado.');
    }
}
