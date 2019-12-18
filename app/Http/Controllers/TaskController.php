<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListModel;
use App\TaskModel;

class TaskController extends Controller
{
    /**
     * Gets specific task and sorts on name
     *
     * @param ListModel $id
     * @return void
     */
    public function getSpecificTasksName(ListModel $id)
    {
        $tasks = TaskModel::
            orderBy('body', 'asc')
            ->where('list_id', $id->id)
            ->where('user_id', auth()->user()->id)
            ->get();
        $lists = ListModel::where('user_id', auth()->user()->id)->get();

        return view('home', compact('tasks', 'lists'));                    
    }

    /**
     * Gets specific task and sorts on status
     *
     * @param ListModel $id
     * @return void
     */
    public function getSpecificTasksStatus(ListModel $id)
    {
        $tasks = TaskModel::
            orderBy('completed', 'desc')
            ->where('list_id', $id->id)
            ->where('user_id', auth()->user()->id)
            ->get();
        $lists = ListModel::where('user_id', auth()->user()->id)->get();

        return view('home', compact('tasks', 'lists'));                    
    }

    /**
     * Shows create task page with lists of current user
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createTask()
    {
        $lists = ListModel::where('user_id', auth()->user()->id)->get();
        return view('task.createTask', compact('lists'));
    }

    /**
     * Creates a new task
     *
     * @param Request $request
     * @return void
     */
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
        return redirect(url('/list/' . $task->list_id . '/name'));
    }

    /**
     * Shows edit page of select task
     *
     * @param [type] $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editTask($id)
    {
        $lists = ListModel::where('user_id', auth()->user()->id)->get();
        $task = TaskModel::find($id);
        return view('task.editTask', compact('task', 'lists'));
    }

    /**
     * Saves data on editing task
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
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

    /**
     * Changes status of task
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function changeStatus(Request $request, $id)
    {
        $task = TaskModel::find($id);
        $task->completed = $request->completed;
        $task->save();
        return redirect()->back();
    }

    /**
     * Deletes task
     *
     * @param [type] $id
     * @return void
     */
    public function deleteTask($id)
    {
        $task = TaskModel::find($id);
        $task->delete();
        return redirect()->back();     
    }
}
