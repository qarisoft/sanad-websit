<?php

namespace App\Models;

use App\Traits\BelongsToManyCompany;
use App\Traits\HasTasks;
use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Viewer extends Model
{
    use HasFactory, BelongsToManyCompany, HasUser, HasTasks;


    public function allowedTasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class);
    }


    public function hasTask(Task $task): bool
    {
        if ($task->viewer()->exists()) {

            return ($task->viewer_id ?? 0) == $this->id;
        }
        return false;
    }
}
