<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DateTime;

class AuthController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function login( Request $request )
    {
        $data = [];
        // $count = User::where('email', '=', $request->get('email'))
                    // ->where('password', '=', md5($request->get('password')))->count();
        $count = User::where('email', '=', $request->get('email'))
                    ->where('password', '=', $request->get('password'))->count();

        if($count > 0) {
            // $user = User::where('email', '=', $request->get('email'))
            //         ->where('password', '=', $request->get('password'))->get();
            // $data['user'] = $user[0];
            $data['status'] = true;
        }else{
            $data['status'] = false;
        }

        return $data;
    }

    public function register( Request $request )
    {

        $data = array();

        $count = User::where('email', '=', $request->get('email'))->count();

        if($count > 0) {
            $data['status'] = false;
            $data['message'] = 'Email is already taken.';

            return $data;
        }

        $create = User::create([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'password' => $request->get('password'),
                ]);
        if( $create ){
            $data['status'] = true;
        } else {
            $data['status'] = false;
        }
        return $data;
    }

    public function deleteTasks( $id )
    {
        Task::findOrFail($id)->delete();
        return redirect('/');
    }
}