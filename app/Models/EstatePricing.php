<?php

namespace App\Models;

use App\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Model;

class EstatePricing extends Model
{
    use BelongsToCompany;

    protected $guarded = [];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];


}
