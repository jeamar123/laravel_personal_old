<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\ExpensesCategories;

class ExpensesCategoryController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response;
     */
    public function getCategories( )
    {
        return ExpensesCategories::orderBy('created_at', 'asc')->get();

        // return view('tasks', [
        //     'tasks' => Task::orderBy('created_at', 'asc')->get()
        // ]);
    }

    public function addCategories( Request $request )
    {
        // $category = new ExpensesCategories;
        // $category->category_name = $request->category_name;
        // $category->save();

        $object = array();
        if(ExpensesCategories::create(['category_name' => $request->get('category_name')]))
        {
            $object['status'] = TRUE;
        } else {
            $object['status'] = FALSE;
        }
        return $object;
    }

    public function updateCategories( Request $request )
    {
        $data = array(
            'category_name' => $request->get('category_name'),
        );

        $result = ExpensesCategories::where('id', $request->get('category_id'))->update($data);
        if($result) {
            $object['status'] = TRUE;
        } else {
            $object['status'] = FALSE;
        }
        return $object;
    }

    public function deleteCategories( $id )
    {
        // ExpensesCategories::findOrFail($id)->delete();

        $object = array();
        $check = ExpensesCategories::where('id', '=', $id)->count();

        if(ExpensesCategories::where('id', '=', $id)->delete()) {
            $object['status'] = TRUE;
            $object['message'] = 'Successfully deleted Category.';
        } else {
            $object['status'] = False;
            $object['message'] = 'Error deleting Category.';
        }
        return $object;
    }
}