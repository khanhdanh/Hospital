<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function profile(User $user)
    {

        return view('admin.user.profile', compact('user'));
    }

    public function update(User $user)
    {
        $inputs = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required']
        ]);

        $user->update($inputs);
        return back();
    }

    public function updatePassword(User $user)
    {
        $inputs = request()->validate([
            'password' => ['required', 'string', 'min:4', 'confirmed']
        ]);
        $inputs['password'] = Hash::make(request('password'));
        $user->update($inputs);
        return back()->with('update-password', 'Password has been updated...');
    }

    public function updatePhoto(User $user)
    {
        $inputs = request()->validate([
            'photo' => 'file'
        ]);

        if (request('photo')) {
            $inputs['photo'] = request('photo')->store('images');
        }

        $user->update($inputs);
        return back();

    }

}
