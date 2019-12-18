<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListModel;
use App\TaskModel;

class UserController extends Controller
{
    /**
     * Changes color of current user
     *
     * @param Request $request
     * @return void
     */
    public function changeColor(Request $request)
    {
        $user = auth()->user();
        $user->color = $request->color;
        $user->save();
        return redirect()->back();
    }

    /**
     * Changes password of current authenticated user
     *
     * @param Request $request
     * @return void
     */
    public function changePassword(Request $request) 
    {
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

    /**
     * Deletes current authenticated user
     *
     * @return void
     */
    public function deleteUser()
    {
        $user = auth()->user();
        $user->delete();
        return redirect(url('/login'));  
    }

    /**
     * Shows profile page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $lists = ListModel::all();
        $tasks = TaskModel::all();
        return view('auth.profile', compact('lists','tasks'));
    }
}
