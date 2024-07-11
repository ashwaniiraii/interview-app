<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function RegisterPage()
    {
        if (Auth::user()) {
            return to_route('dashboard');
        }

        return view('register-page');
    }

    public function RegisterUser(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'password' => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required|same:password',
            'department' => 'required|string|max:10',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('profile')) {
            $avatar = Storage::disk('public')->put('/', $request->file('profile'));
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'password' => Hash::make($request->password),
            'profile_picture' => $avatar ??= null,
        ]);

        return redirect()->route('login')->with('success', 'User has been registered successfully.');
    }

    public function LoginPage()
    {
        if (Auth::user()) {
            return to_route('dashboard');
        }

        return view('login-page');
    }

    public function LoginCheck(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',

        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return to_route('dashboard');
        }

        return redirect()->back()->withErrors([
            'failed' => 'The provided credentials do not match our records.',
        ])->withInput();

    }

    public function dashboard()
    {
        return view('dashboard.dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();

        return to_route('login');
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if (! $user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'profile_picture' => 'nullable|image|max:3072',
            'department' => 'required|string|max:50',
        ]);
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|string|min:5',
            ]);
        }
        // dd($validatedData);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->department = $validatedData['department'];

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }
            $image = Storage::disk('public')->put('/', $request->file('profile_picture'));
            $user->profile_picture = $image;
        }
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        // dd($user);
        $user->save();

        return redirect()->route('profile')->with('success', 'User Profile has been updated successfully.');
    }
}
