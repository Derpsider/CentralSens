<?php

namespace App\Http\Controllers;

use App\Task;
use App\Question;

class PagesTasksController extends Controller
{
    public function update(Task $task)
    {
        $method = request()->has('completed') ? 'complete' : 'incomplete';
        $task->$method();

        $task->complete(request()->has('completed'));


        /*$task->update([
            'completed' => request()->has('completed')
        ]);*/

        return back();
    }

    public function store(Question $question)
    {
        // prevent null input error
        $attributes = request()->validate(['description' => 'required']);

        $question->addTask($attributes);

        return back();
    }
}
