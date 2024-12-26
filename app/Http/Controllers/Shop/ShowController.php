<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Http\Requests\ShowRequest;

class ShowController extends Controller
{
    public function __invoke(ShowRequest $request) {
        $price_min = 1;
        $price_max = 300000;
        if (!empty($request->all())) {
            $query = Shop::query();
            foreach ($request->all() as $key => $value) { 
                if (!empty($value)) {
                    if ($key == 'price_min') {
                        $query->where('price', '>=', $value);
                        $price_min = $value;
                    } else if ($key == 'price_max') {
                        $query->where('price', '<=', $value);
                        $price_max = $value;
                    } else {
                        $query->where($key, $value);
                    }
                }
            }
            $products = $query->paginate(30);
        } else {
            $products = Shop::paginate(30);
        }

        $response = [
            'products' => $products->map(function ($product) {
        
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->image,
                    'rating' => $product->rating,
                ];
            }),
            'price_range' =>[
                'price_min' => $price_min,
                'price_max' => $price_max,
            ],
        ];
        return response()->json($response);
    }
}
