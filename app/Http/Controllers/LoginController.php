<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Workers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function login(){
        return view('login\login');
    }
    public function userLogin(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'Майл хаягаа оруулна уу!',
            'email.email' => 'Майл хаяг биш байна.',
            'password.required' => 'Нууц үгээ оруулна уу',
        ]);
    
        if (Auth::attempt(['email' => $loginData['email'], 'password' => $loginData['password']])) {
            $user = Auth::user(); 
            $username = $user->name; // Assuming 'name' is the field in the 'users' table for the username
    
            return redirect()->route('main', ['name' => $username]);
        } else {
            return redirect()->back()->withInput($request->only('email'))->withErrors([
                'password' => 'Майл хаяг эсвэл нууц үг буруу байна.',
            ]);
        }
    }
    
    // ログイン処理
    public function register(){
        return view('login\register');
    }
    public function UserRegister(Request $request){
        $request->validate([
            'Uname' => 'required|string|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'Uname.required' => 'Хэрэглэгчийн нэрээ оруулна уу!.',
            'Uname.string' => 'Хэрэглэгчийн нэр тэмдэгт биш байна',
            'Uname.max' => 'Хэрэглэгчийн нэр 30 тэмдэгт дотор байх ёстой.',
            'email.required' => 'Майл хаягаа оруулна уу!',
            'email.email' => 'Майл хаяг биш байна.',
            'email.unique' => 'Бүртгэлтэй майл хаяг байна.',
            'password.required' => 'Нууц үгээ оруулна уу',
            'password.min' => 'Нууц үг багадаа 8 тэмдэгтийн урттай байна.',
            'password.confirmed' => 'Нууц үг болон давтсан нууц үг таарсангүй.',
        ]);
    
        $user = User::create([
            'name' => $request->input('Uname'), 
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
    
        return redirect()->route('main', ['name' => $user->name]);
    }
    
    

    public function workerLogin(){
        return view('login\workerLogin');
    }

    public function workerLoginPost(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'Майл хаягаа оруулна уу!',
            'email.email' => 'Майл хаяг биш байна.',
            'password.required' => 'Нууц үгээ оруулна уу',
        ]);
    
        $credentials = [
            'email' => $loginData['email'],
            'password' => $loginData['password'],
        ];
        $worker = DB::table('workers')->where($credentials)->first();
    
        if ($worker) {
            // Auth::guard('workers')->login($worker);
            $username = $worker->username; 
        
            return redirect()->route('workerMain', ['name' => $username]);
        } else {
            return redirect()->back()->withInput($request->only('email'))->withErrors([
                'password' => 'Майл хаяг эсвэл нууц үг буруу байна.',
            ]);
        }
    }
    

}
