<?php

namespace App\Commands;

use App\Models\Task;
use App\Http\Resources\TaskCollection;

trait TaskListAll
{
    public function listAllTasks(): TaskCollection
    {
        $tasks = Task::all();
        return new TaskCollection($tasks);
    }
}
