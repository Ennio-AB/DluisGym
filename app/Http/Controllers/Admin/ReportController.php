<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CafeteriaSale;
use App\Models\CafeteriaSaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->input('from', now()->startOfMonth()->toDateString());
        $to   = $request->input('to', now()->toDateString());

        $sales = CafeteriaSale::whereBetween('sold_at', [$from, $to . ' 23:59:59'])
            ->with('items.product')
            ->orderByDesc('sold_at')
            ->get();

        $income = $sales->sum('total');

        $cost = CafeteriaSaleItem::whereHas('sale', function ($q) use ($from, $to) {
            $q->whereBetween('sold_at', [$from, $to . ' 23:59:59']);
        })
        ->with('product')
        ->get()
        ->sum(fn ($item) => $item->product->cost_price * $item->quantity);

        $profit = $income - $cost;

        $byDay = $sales->groupBy(fn ($s) => $s->sold_at->toDateString())
            ->map(fn ($g) => $g->sum('total'));

        return view('admin.reports.index', compact('sales', 'income', 'cost', 'profit', 'byDay', 'from', 'to'));
    }
}
