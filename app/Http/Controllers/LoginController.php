<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penghuni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // request register akun 
    public function register()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        // Rule validasi untuk username dan password
        $rules = [
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        ];
        // Pesan validasi
        $messages = [
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.regex' => 'Password harus terdiri dari 
            huruf kapital, huruf kecil, dan angka.',
        ];
        // Validasi input
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Buat user baru
        $user = User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
    
        Alert::success('Terima Kasih', 'Anda Berhasil Register');
        return redirect()->to('/login');
    }

  // ketika user mengakses /login maka akan di berikan form login
  public function login()
  {
      if (auth()->check()) {
          return redirect('/dashboard');
      }
      return view('auth.login');
  }
  public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            Alert::success('Terima Kasih', 'Anda Berhasil Masuk');
            return redirect()->intended('/dashboard');
        } else {
            // Authentication failed...
            $user = User::where('username', $credentials['username'])->first();
            if (!$user) {
                return redirect()->back()->with(
                  'error', 'Username atau Password Salah');
            } else {
                return redirect()->back()->with(
                  'error', 'Username atau Password Salah');
            }
        }
    }

    public function dashboard(Request $request)
    {
      $user = Auth::user();
      $penghunies = Penghuni::with('kamars', 'phone', 'univ')->latest()->get();

      return view('admin.index', compact('user', 'penghunies'));
    }
    
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect ('/');
    }
}
