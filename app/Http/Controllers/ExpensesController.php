<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Expenses;

class ExpensesController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response;
     */
    public function getExpenses( )
    {
        return Expenses::orderBy('created_at', 'asc')->get();

        // return view('tasks', [
        //     'tasks' => Task::orderBy('created_at', 'asc')->get()
        // ]);
    }

    public function addExpenses( Request $request )
    {
        // $category = new ExpensesCategories;
        // $category->category_name = $request->category_name;
        // $category->save();

        $object = array();
        $data = Expenses::create([
                    'date' => $request->get('date'),
                    'category' => $request->get('category'),
                    'description' => $request->get('description'),
                    'value' => $request->get('value'),
                ]);

        if( $data )
        {
            $object['status'] = TRUE;
        } else {
            $object['status'] = FALSE;
        }
        return $object;
    }

    public function updateExpenses( Request $request )
    {
        $data = array(
            'category_name' => $request->get('category_name'),
        );

        $result = Expenses::where('id', $request->get('category_id'))->update($data);
        if($result) {
            $object['status'] = TRUE;
        } else {
            $object['status'] = FALSE;
        }
        return $object;
    }

    public function deleteExpenses( $id )
    {
        // Expenses::findOrFail($id)->delete();

        $object = array();
        $check = Expenses::where('id', '=', $id)->count();

        if(Expenses::where('id', '=', $id)->delete()) {
            $object['status'] = TRUE;
            $object['message'] = 'Successfully deleted Category.';
        } else {
            $object['status'] = False;
            $object['message'] = 'Error deleting Category.';
        }
        return $object;
    }
}