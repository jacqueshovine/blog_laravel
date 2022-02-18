<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(User $user)
    {
        // Le user connecté ne peut voir que son profil
        if (!$this->isLoggedIn($user->id)) {
            return back()->withInput();
        }

        return view('users.profile', ['user' => $user]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        dump($user);die;
        if (!$this->isLoggedIn($user->id)) {
            return back()->withInput();
        }

        $user->name = $request->get('name');

        $user->save();

        return view('users.show', ['user' => $user]);
    }

    public function isLoggedIn($id)
    {
        if ($id == Auth::user()->id) {
            return true;
        }

        return false;
    }
}
