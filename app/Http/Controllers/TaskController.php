<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function __invoke()
    {
        return TaskResource::collection(Task::orderBy('is_completed', 'desc')->get());
    }

    public function complete(Task $task)
    {
        $task->is_completed = true;
        $task->save();

        return response()->json([
            'status' => 'success',
        ]);
    }
}
