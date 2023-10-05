<?php

namespace App\Http\Controllers;

use App\Commands\CloseTask;
use App\Commands\CreateTask;
use App\Commands\DeleteTask;
use App\Commands\TaskFindByCode;
use App\Commands\TaskListAll;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    use CloseTask;
    use CreateTask;
    use DeleteTask;
    use TaskFindByCode;
    use TaskListAll;

    public function index()
    {
        return $this->listAllTasks();
    }

    public function show(string $code)
    {
        return $this->findByCode($code);
    }

    public function close(string $code)
    {
        return $this->closeTask($code);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        return $this->createTak($request->input('name'));
    }

    public function destroy(string $code)
    {
        $response =  $this->deleteTask($code);

        if ($response) {
            return response()->json(['message' => "he task was successfully deleted"], 200);
        } else {
            return response()->json(['message' => "No task found with the informed code"], 400);
        }
    }
}
