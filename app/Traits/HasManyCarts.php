<?php

namespace App\Traits;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Relations\HasMany;


trait HasManyCarts
{
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }
}