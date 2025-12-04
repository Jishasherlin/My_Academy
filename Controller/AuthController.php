<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  
use Illuminate\Support\Facades\Hash;   
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
    }  else {
        return redirect()->route('login')->with('error', 'The provided credentials do not match our records.');
    }
}
    public function registerPost (Request $request){
    $request -> validate([
        'name' => ['required','regex:/^[a-zA-Z\s]+$/'],
        'email' => ['required','email','unique:users', 'regex:/^[\w\.-]+@[\w\.-]+\.\w{2,4}$/'],
        'password' => ['required','min:8','regex:/[a-z]/','regex:/[A-Z]/','regex:/[0-9]/','regex:/[@$!%*#?&]/'],
         'role' => 'required' 
    ], [
            'name.required'=>'Name is required',
            'name.regex'=>'Name can only contain letters and spaces',
            'email.required'=>'Email is required',
            'email.regex'=>'Enter a valid email address',
            'email.email'=>'Enter a valid email address',
            'email.unique'=>'Email already exists',
            'password.required'=>'Password is required',
            'password.min'=>'Password must be at least 8 characters',
            'password.regex'=>'Password must include at least one uppercase letter, one lowercase letter, one number, and one special character',
    ]);
   $user=User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]) ;


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
