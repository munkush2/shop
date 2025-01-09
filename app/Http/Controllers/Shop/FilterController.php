<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;

class FilterController extends Controller
{
    public function __invoke() {
        $brands = Shop::select('brand')->groupBy('brand')->get()->map(fn($item) => ['title' => $item->brand]);
        $cpu = Shop::select('cpu')->groupBy('cpu')->get()->map(fn($item) => ['title' => $item->cpu]);
        $ram = Shop::select('ram')->groupBy('ram')->get()->map(fn($item) => ['title' => $item->ram]);
        return response()->json([
            'brand' => $brands,
            'cpu' => $cpu,
            'ram' => $ram,
        ]);
    }
}
