<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait OnlineTrait
{
    public function scopeOnline(Builder $query): void
    {
        $query->where('is_online', true);
    }
}
