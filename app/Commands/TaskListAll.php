<?php

namespace App\Commands;

use App\Models\Task;
use App\Http\Resources\TaskResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

trait TaskListAll
{
    public function listAllTasks(): AnonymousResourceCollection
    {
        $tasks = Task::all();
        return TaskResource::collection($tasks);
    }
}
