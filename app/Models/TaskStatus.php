<?php

namespace App\Models;

use App\Enums\TasksStatusEnum;
use App\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    use HasFactory, BelongsToCompany;

    protected $fillable = [
        'name',
        'color',
        'code',
    ];

    public function scopeEqualTo(Builder $query, TasksStatusEnum $status): void
    {
        $query->where('code', '=', $status->name);
    }


}
