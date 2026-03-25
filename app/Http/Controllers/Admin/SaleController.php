<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSaleRequest;
use App\Models\CafeteriaProduct;
use App\Models\CafeteriaSale;
use App\Models\CafeteriaSaleItem;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index()
    {
        $sales = CafeteriaSale::with('items.product')
            ->orderByDesc('sold_at')
            ->paginate(20);

        return view('admin.sales.index', compact('sales'));
    }

    public function create()
    {
        $products = CafeteriaProduct::where('is_active', true)
            ->where('stock', '>', 0)
            ->orderBy('name')
            ->get();

        return view('admin.sales.create', compact('products'));
    }

    public function store(StoreSaleRequest $request)
    {
        DB::transaction(function () use ($request) {
            $total = 0;
            $items = [];

            foreach ($request->items as $item) {
                $product = CafeteriaProduct::findOrFail($item['product_id']);
                $qty     = (int) $item['quantity'];
                $subtotal = $product->sale_price * $qty;
                $total   += $subtotal;

                $product->decrement('stock', $qty);

                $items[] = [
                    'product_id' => $product->id,
                    'quantity'   => $qty,
                    'unit_price' => $product->sale_price,
                    'subtotal'   => $subtotal,
                ];
            }

            $sale = CafeteriaSale::create([
                'user_id' => auth()->id(),
                'total'   => $total,
                'notes'   => $request->notes,
                'sold_at' => now(),
            ]);

            foreach ($items as $item) {
                $sale->items()->create($item);
            }
        });

        return redirect()->route('admin.sales.index')
            ->with('success', 'Venta registrada exitosamente.');
    }

    public function show(CafeteriaSale $sale)
    {
        $sale->load('items.product', 'user');

        return view('admin.sales.show', compact('sale'));
    }
}
