<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListModel;
use App\TaskModel;

class ListController extends Controller
{

    /**
     * Shows List creating page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createList()
    {
        return view('createList');
    }

    /**
     * Shows edit page with from selected list
     *
     * @param [type] $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editList($id)
    {
        $list = ListModel::find($id);
        return view('editList', compact('list'));
    }

    /**
     * Creates a new list
     *
     * @param Request $request
     * @return void
     */
    public function postList(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required'
        ]);
        $list = new ListModel;
        $list->user_id = $request->user_id;
        $list->name = $request->name;
        $list->save();
        return redirect(url('/'));
    }

    /**
     * Saves data on editing list
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function postEditList(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required'
        ]);
        $list = ListModel::find($id);
        $list->user_id = $request->user_id;
        $list->name = $request->name;
        $list->save();
        return redirect(url('/'));
    }

    /**
     * Deletes list
     *
     * @param [type] $id
     * @return void
     */
    public function deleteList($id)
    {
        $list = ListModel::find($id);
        $tasks = TaskModel::all();

        \DB::table('tasks')->where('list_id', $id)->delete();
        $list->delete();        
        
        return redirect(url('/'));      
    }
}
