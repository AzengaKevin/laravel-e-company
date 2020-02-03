<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if ($request->has('admin')) {
            $user->update(['admin' => true]);
        } else {
            $user->update(['admin' => false]);
        }

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {

    }
}
