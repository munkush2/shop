<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Models\Shop;

class AddProductController extends Controller
{
    public function __invoke (AddProductRequest $request) {
        $product = [
            'brand' => $request->brand,
            'ram' => $request->ram,
            'cpu' => $request->cpu,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
            'rating' => $request->rating,
        ];
        $addProduct = Shop::create($product);
        if ($addProduct) {
            return response()->json([
                'message' => 'Product added successfully', 
                'product' => $addProduct
            ]);
        } else {
            return response()->json([
                'message' => 'Failed to add product'
            ]);
        }
    }
}
