<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Product;

class ProductObserver
{
 
    public function creating(Product $product)
    {
        $product->flag = Str::kebab($product->title);
        $product->uuid = Str::uuid();
    }

    public function updating(Product $product)
    {
        $product->flag = Str::kebab($product->title);
    }
}
