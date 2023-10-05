<?php

namespace App\Commands;

use App\Models\Task;
use App\Http\Resources\TaskResource;

trait CloseTask
{
    public function closeTask(string $code): TaskResource
    {
        $task = Task::where('code', $code)->firstOrFail();

        $task->is_closed = true;

        return new TaskResource($task);
    }
}
