<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $profile = Profile::where('user_id', $user_id)->first();

        return view('profile.index', ['profile' => $profile]);
    }

    public function edit($id)
    {
        $user_id = Auth::id();

        $profile = Profile::where('user_id', $user_id)->first();

        return view('profile.edit', ['profile' => $profile]);
    }

    public function update($id, $user_id, Request $request)
    {
        if ($request->input('password') != "") {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email',
                'password' => 'required|string|min:8|confirmed',
                'age' => 'required|numeric',
                'address' => 'required'
            ]);
        } else {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email',
                'age' => 'required|numeric',
                'address' => 'required'
            ]);
        };
        

        $profile = Profile::find($id);
        $user = User::find($user_id);
 
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        };
        
        $profile->age = $request->input('age');
        $profile->address = $request->input('address');
        
        $profile->save();
        $user->save();
        Alert::success('Berhasil', 'Berhasil Update Profile');

        return redirect('/profile');
    }

    public function destroy($id)
    {
        $user = User::find($id);
 
        $user->delete();
        Alert::success('Berhasil', 'Berhasil Hapus Profile');

        return redirect('/');
    }
}
