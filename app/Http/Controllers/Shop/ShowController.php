<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;

class ShowController extends Controller
{
    public function __invoke() {
        $products = Shop::all();

        $response = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->Name,
                'price' => $product->price,
                'image' => $product->image,
                'rating' => $product->rating,
            ];
        });
        return response()->json($response);
    }
}
