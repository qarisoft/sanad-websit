<?php

namespace App\Enums;

use App\Models\TaskStatus;

enum TasksStatusEnum: string
{
    case DRAFT = '#b3abab';
    case PUBLISHED = '#ffff00';
    case RE_PUBLISHED = '#ffff01';
    case ACCEPTED_BY_VIEWER = '#f2f2f2';
    case UPLOADED = '#d8e4bc';
    case RE_UPLOADED = '#d8e4bv';#3b3d4200
    case CLOSED = '#92d050';
    case CANCELED = '##3b3d4200';

    public function model(): TaskStatus
    {
        return TaskStatus::query()->firstOrCreate([
            'code' => $this->name,
        ]);
    }

    public function getArabicName(): string
    {
        return __($this->name);

    }
}
