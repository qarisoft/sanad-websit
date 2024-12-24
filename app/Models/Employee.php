<?php

namespace App\Models;

use App\Traits\ActiveTrait;
use App\Traits\BelongsToCompany;
use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use BelongsToCompany, HasFactory, HasUser, ActiveTrait;

    protected $casts = [
        'active' => 'boolean',
        'is_viewer' => 'boolean',
    ];
    protected $fillable = [
        'name',
        'username',
        'active',
        'email',
        'user_id',
    ];

    /* Relations */


//    public function visibleTasks(): BelongsToMany
//    {
//        return $this->belongsToMany(Task::class, 'task_allowed_viewers', 'viewer_id');
//    }

    /* Scopes */
    public function scopeSearch(Builder $query, $like): Builder
    {
        return $query->whereHas('user', function (Builder $q) use ($like) {
            $q->whereLike('username', "%{$like}%")
                ->orWhereLike('email', "%{$like}%")
                ->orWhereLike('name', "%{$like}%");
        });
    }

    public function scopeIsViewer(Builder $query): void
    {
        $query->where('is_viewer', true);
    }
}
