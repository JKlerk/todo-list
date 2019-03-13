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
        $lists = App\Lists::all();
        $tasks = App\Tasks::all();
        return view('home', compact('lists','tasks'));
    }

    public function createList()
    {
        return view('createList');
    }

    public function postList(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required'
        ]);
        $list = new App\Lists;
        $list->user_id = $request->user_id;
        $list->name = $request->name;
        $list->save();
        return redirect(url('/'));
    }

    public function delete($id)
    {
        $list = App\Lists::find($id);
        $list->delete();
        return redirect(url('/'));        
    }    
}
