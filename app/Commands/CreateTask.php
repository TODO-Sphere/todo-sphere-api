<?php

namespace App\Commands;

use App\Models\Task;
use App\Http\Resources\TaskResource;
use Illuminate\Support\Str;

trait CreateTask
{
    public function createTak(string $name): TaskResource
    {
        $task = new Task();

        $task->code = Str::uuid();
        $task->name = $name;
        $task->is_closed = false;

        $task->save();

        return new TaskResource($task);
    }
}
