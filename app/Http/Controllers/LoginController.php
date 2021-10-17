<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // TODO: ellenőrizni az adatokat

        if ($request->get('email') === null
            || $request->get('password') === null) {
            return view('login.login', [
                'error' => 'Failed to login: incorrect username or password.'
            ]);
        } else {
            return redirect()->route('index');
        }
    }
}
