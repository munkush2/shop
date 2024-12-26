<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Shop;

class MinPriceRule implements Rule
{
    public function passes($attribute, $value)
    {
        return Shop::where('price', '>=', $value)->exists();
    }

    public function message()
    {
        return 'No products found with a price equal to or greater than the one indicated.';
    }
}
