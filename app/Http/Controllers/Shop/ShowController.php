<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Http\Requests\ShowRequest;

class ShowController extends Controller
{
    public function __invoke(ShowRequest $request) {
        //return response()->json($request->brand);
        if (!empty($request->brand)) {
            $products = Shop::where('brand', $request->brand)->get();
        } else {
            $products = Shop::all();
        }
        

        $response = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'rating' => $product->rating,
            ];
        });
        return response()->json($response);
    }
}
