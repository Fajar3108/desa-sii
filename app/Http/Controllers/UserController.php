<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

        ALert::success('Success', 'User created successfuly');

        return redirect('/users');
    }

    public function show()
    {
        $user = auth()->user();
        return view('users.show', compact('user'));
    }

    public function updatePassword(User $user)
    {
        request()->validate([
            'password' => ['required', 'min:8', 'same:confirm_password']
        ]);

        $user->update([
            'password' => bcrypt(request()->password),
        ]);

        ALert::success('Success', 'User password updated successfuly');

        return redirect()->back();
    }

    public function updateRole(User $user, Request $request)
    {
        $user->update([
            'role_id' => $request->role
        ]);

        ALert::success('Success', "User's role updated successfuly");

        return back();
    }

    public function destroy(User $user)
    {
        if ($user->id == auth()->user()->id) {
            ALert::success('Error', "Can't delete your self");

            return redirect()->back();
        }

        $user->delete();

        ALert::success('Success', 'User deleted successfuly');

        return redirect()->back();
    }
}
