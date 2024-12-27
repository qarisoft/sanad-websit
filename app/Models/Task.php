<?php

namespace App\Models;

use App\Enums\TasksStatusEnum;
use App\Traits\ActiveTrait;
use App\Traits\BelongsToCompany;
use App\Traits\OnlineTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Task extends Model implements HasMedia
{
    use ActiveTrait, BelongsToCompany, HasFactory, InteractsWithMedia, OnlineTrait;

    protected $casts = [
        'is_published' => 'boolean',
        'is_available' => 'boolean',
        'is_online' => 'boolean',
        'is_closed' => 'boolean',

        'must_do_at' => 'datetime',
        'published_at' => 'datetime',

        'attach' => 'array',
        'location' => 'array',
    ];

    protected $guarded = [
    ];

    /* Relations */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    //    public function user(): BelongsTo
    //    {
    //        return $this->belongsTo(User::class);
    //
    //    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(TaskStatus::class, 'task_status_id');
    }

    public function viewer(): BelongsTo
    {
        return $this->belongsTo(Viewer::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function uploads(): HasMany
    {
        return $this->hasMany(TaskUpload::class);
    }

    public function allowedViewers(): BelongsToMany
    {
        return $this->belongsToMany(Viewer::class, 'task_viewer');
    }

    /*
        ! Scopes
    */
    public function scopeAllowed(Builder $query, int $id): void
    {
        $query->whereHas('allowedViewers',
            fn (Builder $q) => $q->where('viewer_id', '=', $id)
        );
    }

    public function scopePublished(Builder $query): void
    {
        $query->where('is_published', true);
    }

    public function scopeDraft(Builder $query): void
    {
        $query->whereHas('status',
            fn (Builder $q) => $q->where('code', '=', 'DRAFT')
        );
    }

    public function scopeEqualTo(Builder $query, TasksStatusEnum $status): void
    {
        $query->whereHas('status',
            fn (Builder $q) => $q->where('code', '=', $status->name)
        );
    }

    public function publish($a = true): void
    {
        if ($a) {
            $this->is_published = $a;
        }
        $this->is_online = $a;
        $this->published_at = now();
        //        $this->is_availabel = $a;
        $this->save();
    }

    private function _updateStatus(?TaskStatus $status): void
    {
        if ($status) {
            $this->status()->associate($status);
        }
    }

    public function acceptBy(Viewer $viewer): void
    {
        $this->viewer()->associate($viewer);
        $this->_updateStatus(
            TaskStatus::query()
                ->equalTo(TasksStatusEnum::ACCEPTED_BY_VIEWER)
                ->ofCompany($this->company_id)
                ->first()
        );
        $this->publish(false);
    }

    public function close(): void
    {
        $this->is_closed = true;
    }

    public function pricingEvaluations(): array
    {
        return EstatePricing::query()
            ->ofCompany($this->company_id)
            ->pluck('key')
            ->map(fn ($i, $n) => [
                'task_id' => $this->id,
                'id' => $this->id.'-'.$n,
                'name' => __($i),
                'key' => $i,
            ])
            ->toArray();
    }

    // public function scopeSearch(Builder $query, ?string $like): Builder
    // {
    //     return $query->where('code', 'like', "%{$like}%");
    // }

    // public function users(): BelongsToMany
    // {
    //     return $this->belongsToMany(Employee::class, 'task_viewers');

    // }

    // public function priceEvaluation(): HasMany
    // {
    //     return $this->hasMany(EstatePricing::class);
    // }

    // public function close()
    // {
    //     $this->task_status_id = TaskStatus::query()->where('code', Status::Uploaded)->get()->first()->id;

    //     $this->save();
    // }

    // protected static function booted()
    // {
    //     static::creating(function ($task) {
    //         $task->location_id = Location::create([
    //             'lat' => 0,
    //             'lng' => 0,
    //         ])->id;
    //     });

    //     static::created(function ($task) {
    //         foreach (EstatePricingEnums::cases() as $key) {
    //             $task->priceEvaluation()->create([
    //                 'key' => $key->val(),
    //                 'name' => __($key->val()),
    //             ]);
    //         }
    //     });
    // }
}
