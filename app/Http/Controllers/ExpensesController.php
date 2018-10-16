<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DateTime;
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

    public function getExpensesByMonth( Request $request )
    {
        $data = array();

        $get_expenses = Expenses::whereBetween('full_date', [ new DateTime( $request->get('start') ) , new DateTime( $request->get('end') ) ])->get();
        
        if( $get_expenses ){
            $data['status'] = true;
            $data['message'] = 'Success';
            $data['expenses'] = $get_expenses;
        }else{
            $data['status'] = false;
            $data['message'] = 'Failed';
        }

        return $data;
    }

    public function addExpenses( Request $request )
    {
        // $category = new ExpensesCategories;
        // $category->category_name = $request->category_name;
        // $category->save();

        $object = array();
        $data = Expenses::create([
                    // 'category_id' => $request->get('category_id'),   
                    'category' => $request->get('category_name'),
                    'date' => $request->get('date'),
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