<?php

namespace App\Commands;

use App\Models\Task;

trait DeleteTask
{
    public function deleteTask(string $code): bool
    {
        $task = Task::where('code', $code)->firstOrFail();

        return $task->delete();
    }
}
