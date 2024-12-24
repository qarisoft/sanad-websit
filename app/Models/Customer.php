<?php

namespace App\Models;

//use App\BelongsToManyCompany;
//use App\HasUser;
use App\Traits\BelongsToManyCompany;
use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

//use Illuminate\Database\Eloquent\Relations\BelongsTo;
//use Illuminate\Database\Eloquent\Relations\BelongsToMany;
//use Laravel\Scout\Searchable;

class Customer extends Model
{
    use HasFactory, HasUser, BelongsToManyCompany;

    protected $fillable = [
        'name',
        'active',
        'user_id',
    ];

    public function scopeSearch(Builder $query, $like): Builder
    {
        return $query->whereHas('user', function (Builder $q) use ($like) {
            $q->whereLike('username', "%{$like}%")
                ->orWhereLike('email', "%{$like}%")
                ->orWhereLike('name', "%{$like}%");
        });
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }


}
