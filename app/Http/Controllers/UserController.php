<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function userDetails(int $userId)
    {
        $user = User::all()->find($userId);

        return view('users.user-detail', [
            'user' => $user,
        ]);
    }

    public function modifyUser(int $userId, Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email'
            ],
            'firstName' => ['required'],
            'lastName' => ['required'],
            'role' => ['required'],
        ]);

        $user = User::all()->find($userId);
        $user->email = $request->get('email');
        $user->firstName = $request->get('firstName');
        $user->lastName = $request->get('lastName');
        $user->role = $request->get('role');
        $user->save();

        return view('users.user-detail', [
            'user' => $user,
            'success' => 'User modified',
        ]);
    }
}
