<?php

namespace App\Traits;

use App\Models\Task;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method hasMany(string $class)
 */
trait HasTasks
{
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

}
