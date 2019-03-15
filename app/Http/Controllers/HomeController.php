<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListModel;
use App\TaskModel;

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
        $lists = ListModel::all();
        $tasks = auth()->user()->tasks;
        return view('home', compact('lists','tasks'));
    }

    public function profile()
    {
        $lists = ListModel::all();
        $tasks = TaskModel::all();
        return view('profile', compact('lists','tasks'));
    }

    public function createList()
    {
        return view('createList');
    }

    public function createTask()
    {
        $lists = ListModel::all();
        return view('createTask', compact('lists'));
    }

    public function editList($id)
    {
        $list = ListModel::find($id);
        return view('editList', compact('list'));
    }

    public function editTask($id)
    {
        $lists = ListModel::all();
        $task = TaskModel::find($id);
        return view('editTask', compact('task', 'lists'));
    }

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

     public function postTask(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'body' => 'required',
            'list_id' => 'required'
        ]);
        $task = new TaskModel;
        $task->user_id = $request->user_id;
        $task->body = $request->body;
        $task->list_id = $request->list_id;
        $task->save();
        return redirect(url('/'));
    }

    public function postEditTask(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'body' => 'required',
            'list_id' => 'required'
        ]);
        $task = TaskModel::find($id);
        $task->user_id = $request->user_id;
        $task->body = $request->body;
        $task->list_id = $request->list_id;
        $task->save();
        return redirect(url('/'));
    }

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

    public function deleteList($id)
    {
        $list = ListModel::find($id);
        $tasks = TaskModel::all();

        \DB::table('tasks')->where('list_id', $id)->delete();
        $list->delete();        
        
        return redirect(url('/'));        
    }

    public function deleteTask($id)
    {
        $task = TaskModel::find($id);
        $task->delete();
        return redirect(url('/'));        
    }

    public function getSpecificTasks(ListModel $id)
    {
        $tasks = TaskModel::where('list_id', $id->id)->where('user_id', auth()->user()->id)->get();
        $lists = ListModel::all();

        return view('home', compact('tasks', 'lists'));                    
    }

    public function changePassword(Request $request) {
        $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|confirmed'
        ]);

        if (\Hash::check(request('current-password'), auth()->user()->password)) {
            $user = auth()->user();
            $user->password = \Hash::make(request('new-password'));
            $user->save();

            return redirect()->back();

        }
    }    
}
