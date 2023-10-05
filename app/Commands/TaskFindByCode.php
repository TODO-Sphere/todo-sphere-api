<?php

namespace App\Commands;

use App\Models\Task;
use App\Http\Resources\TaskResource;

trait TaskFindByCode
{
    public function findByCode(string $code): TaskResource
    {
        $task = Task::where('code', $code)->firstOrFail();
        return new TaskResource($task);
    }
}
