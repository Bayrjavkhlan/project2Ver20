<?php
namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Workers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DBController;
use Mail;
use Str;
use App\Mail\registerMail;

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
            session_start();        
            session(['is_user' => true]);
            session(['email'=> $loginData['email'] ]);
            // $username = $user->name; 
            $dbController = new DBController();
            $books = $dbController->displayAllBookMainReturn();
            
            return view('user\main', ['name' => null, 'bookMains' => $books]);    
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
        session_start();
        session(['is_user' => true]);

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
            'remember_token' => Str::random(40),

        ]);

        Mail::to($user->email)->send(new RegisterMail($user));

        dd($user);

        return redirect()->route('Javkhaa', ['name' => $user->name]);
    }
    public function verify($token){
       
        $user = User::where('remember_token','=',$token)->first();
        
        if(!empty($user)){
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->remember_token = Str::random(40);
            $user->save();
          dd($user,$user->email_verified_at,$user->remember_token);
            return back()->with("success","Your account successfully verified.");
        }else{
        
         abort(404);
        }
     }
    
    

    public function workerLogin(){
        return view('login\workerLogin');
    }

    public function workerLoginPost(Request $request)
    {
        session_start();

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
            session(['is_worker' => true]);
            $username = $worker->username; 
        
            return redirect()->route('workerMain', ['name' => $username]);
        } 

        else {
            return redirect()->back()->withInput($request->only('email'))->withErrors([
                'password' => 'Майл хаяг эсвэл нууц үг буруу байна.',
            ]);
        }
    }
    public function logout(){
        session_start();
        session()->forget('is_worker');
        session()->forget('is_user');
        $dbController = new DBController();
        $books = $dbController->displayAllBookMainReturn();
        return view('user\main', ['name' => null, 'bookMains' => $books]);    }
}
