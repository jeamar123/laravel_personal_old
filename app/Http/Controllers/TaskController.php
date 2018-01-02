<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getTasks( )
    {
        return view('tasks', [
            'tasks' => Task::orderBy('created_at', 'asc')->get()
        ]);
    }

    public function addTasks( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    }

    public function deleteTasks( $id )
    {
        Task::findOrFail($id)->delete();
        return redirect('/');
    }
}