<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lists = App\ListModel::all();
        $tasks = auth()->user()->tasks;
        return view('home', compact('lists','tasks'));
    }

    public function profile()
    {
        $lists = App\ListModel::all();
        $tasks = App\TaskModel::all();
        return view('profile', compact('lists','tasks'));
    }

    public function createList()
    {
        return view('createList');
    }

    public function createTask()
    {
        $lists = App\ListModel::all();
        return view('createTask', compact('lists'));
    }

    public function editList($id)
    {
        $list = App\ListModel::find($id);
        return view('editList', compact('list'));
    }

    public function editTask($id)
    {
        $lists = App\ListModel::all();
        $task = App\TaskModel::find($id);
        return view('editTask', compact('task', 'lists'));
    }

    public function postList(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required'
        ]);
        $list = new App\ListModel;
        $list->user_id = $request->user_id;
        $list->name = $request->name;
        $list->save();
        return redirect(url('/'));
    }

     public function postTask(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'body' => 'required',
            'list_id' => 'required'
        ]);
        $task = new App\TaskModel;
        $task->user_id = $request->user_id;
        $task->body = $request->body;
        $task->list_id = $request->list_id;
        $task->save();
        return redirect(url('/'));
    }

    public function postEditTask(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'body' => 'required',
            'list_id' => 'required'
        ]);
        $task = App\TaskModel::find($id);
        $task->user_id = $request->user_id;
        $task->body = $request->body;
        $task->list_id = $request->list_id;
        $task->save();
        return redirect(url('/'));
    }

    public function deleteList($id)
    {
        $list = App\ListModel::find($id);
        $list->delete();
        return redirect(url('/'));        
    }

    public function deleteTask($id)
    {
        $task = App\TaskModel::find($id);
        $task->delete();
        return redirect(url('/'));        
    }      
}
