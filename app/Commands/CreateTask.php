<?php

namespace App\Commands;

use App\Models\Task;
use Illuminate\Support\Str;

trait CreateTask
{
    public function createTak(string $name): Task
    {
        $task = new Task();

        $task->code = Str::uuid();
        $task->name = $name;
        $task->is_closed = false;

        $task->save();

        return $task;
    }
}
