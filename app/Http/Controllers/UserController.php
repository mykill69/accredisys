<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('users.userList', compact('users'));
    }


    public function store(Request $request)
{
    $validated = $request->validate([
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'mname' => 'nullable|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role' => 'required|string',
    ]);

    $validated['password'] = bcrypt($validated['password']);

    User::create($validated);

    return redirect()->route('users')->with('success', 'User added successfully!');
}
}
