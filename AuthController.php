<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;   // ✅ Import Auth properly
use Illuminate\Support\Facades\Hash;   // ✅ Import Hash properly
use Illuminate\Support\Facades\Session; // ✅ Import Session properly
use App\Models\User; 

class AuthController extends Controller
{
    public function home(){
         return view('home');
    }
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
   public function loginPost(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
    

        if (strtolower($user->role) === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'user') {
            return redirect()->route('home');
        } else {
            Auth::logout();
            $request->session()->invalidate();
            return back()->with('error', 'Unauthorized role.');
        }
    } else {
        return redirect()->route('login')->with('error', 'The provided credentials do not match our records.');
    }
}
    public function registerPost (Request $request){
     $request -> validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required',
         'role' => 'required'
    ]);
    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ];

    $user = User::create($data);

if(!$user){
            return redirect(route('register'));
}
            return redirect()->route('login');
}
public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate(); // Invalidates the current session
    $request->session()->regenerateToken(); // Regenerates the CSRF token
    return redirect()->route('home');
    }
}
