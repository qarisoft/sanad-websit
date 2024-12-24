<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait ActiveTrait
{
    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', true);
    }
}
