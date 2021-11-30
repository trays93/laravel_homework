<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function newUser()
    {
        return view('users.new-user');
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName'  => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->email = $request->get('email');
        $user->firstName = $request->get('firstName');
        $user->lastName = $request->get('lastName');
        $user->role = $request->get('role');
        $user->password = Hash::make($request->get('password'));
        $user->save();

        return redirect()->route('user-detail', [
            'userId' => $user->id,
            'success' => 'User created',
        ]);
    }

    public function deleteUser(int $userId)
    {
        $user = User::find($userId);

        if ($user === null) {
            return redirect()->route('user-list');
        }
        $user->delete();

        return redirect()->route('user-list');
    }
}
