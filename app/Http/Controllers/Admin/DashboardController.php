<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CafeteriaProduct;
use App\Models\CafeteriaSale;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $today = now()->toDateString();
        $month = now()->month;
        $year  = now()->year;

        $salesToday = CafeteriaSale::whereDate('sold_at', $today)->sum('total');
        $salesMonth = CafeteriaSale::whereMonth('sold_at', $month)
            ->whereYear('sold_at', $year)
            ->sum('total');

        $lowStock = CafeteriaProduct::where('is_active', true)
            ->whereColumn('stock', '<=', 'min_stock')
            ->count();

        $topProducts = DB::table('cafeteria_sale_items')
            ->join('cafeteria_products', 'cafeteria_products.id', '=', 'cafeteria_sale_items.product_id')
            ->select('cafeteria_products.name', DB::raw('SUM(cafeteria_sale_items.quantity) as total_qty'))
            ->groupBy('cafeteria_products.id', 'cafeteria_products.name')
            ->orderByDesc('total_qty')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('salesToday', 'salesMonth', 'lowStock', 'topProducts'));
    }
}
