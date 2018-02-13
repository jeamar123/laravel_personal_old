<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DateTime;

class HomeController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getHomeView( )
    {
        $hostName = $_SERVER['HTTP_HOST'];
        $protocol = $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $data['server'] = $protocol.$hostName;
        $now = new \DateTime();
        $data['date'] = $now;

        return view('expenses_web.index', $data);

        // return view('expenses_web.index', [
            // 'tasks' => Task::orderBy('created_at', 'asc')->get()
        // ]);
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