<?php

namespace App\Models;

use App\Services\SetupCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static find(int $id)
 */
class Company extends Model
{
    use HasFactory;

//    protected $casts=[
//        ''
//    ];
    protected static function booted(): void
    {
        static::created(function (Company $company) {
            $a = new SetupCompany($company);
            $a->setup();
        });
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function customers(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class)->withPivot('is_active');
    }

    public function viewers(): BelongsToMany
    {
        return $this->belongsToMany(Viewer::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function priceEvaluation(): HasMany
    {
        return $this->hasMany(EstatePricing::class);
    }

    public static function Current()
    {
        $id = 1;
        return Company::find($id);
    }

}
