<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', compact('users'));
    }

    public function store(UserRequest $request)
    {
        User::create([
            'role_id' => $request->role,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/users');
    }

    public function show()
    {
        $user = auth()->user();
        return view('users.show', compact('user'));
    }
}
