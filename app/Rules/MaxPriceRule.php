<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Shop;

class MaxPriceRule implements Rule
{
    public function passes($attribute, $value)
    {
        return Shop::where('price', '<=', $value)->exists();
    }

    public function message()
    {
        return 'Products not found';
    }
}
