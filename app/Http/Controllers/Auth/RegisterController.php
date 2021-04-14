<?php

namespace App\Http\Controllers\Auth;

use App\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Helper;
use View;
use Mail;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
        View()->share('title',"Register");
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator, 'register');
        }
        $_POST['verified'] = Hash::make($request->password.time());
        if($this->create($_POST)){
            $request->merge(['verified' => $_POST['verified']]);
            Mail::send('mail/registeremail', ['data' => $request], function ($m) use ($request) {
        	$m->from('info@sellersoftwares.com');
        	$m->to($request['email'])->subject('New Registration (Registration Email)');
        	});
            return redirect()->route('home')->with('notify_success',"Registration successfull. Verification email has been send. Please verify your email.");
        } else {
            return redirect()->route('home')->with('notify_error',"Some error occured");
        }
        // rest of the register method code here...
    }
    public function resetEmail(Request $request)
    {
            $UserData =  DB::SELECT("SELECT * FROM users WHERE  email = '$request->email'");
            if(count($UserData) > 0)
            {   
                $reset_code = md5(time());
                DB::UPDATE("UPDATE users SET remember_token='".$reset_code."' WHERE  id = ".$UserData[0]->id);
                $User['name'] = $UserData[0]->name;
                $User['email'] = $UserData[0]->email;
                $User['remember_token'] = $reset_code;

                Mail::send('mail/resetemail', ['data' => $User], function ($m) use ($request) {
                $m->from('info@sellersoftwares.com');
                $m->to($request->email)->subject('Reset Password');
                });
                return redirect()->route('home')->with('notify_success',"Reset password link has been send successfull. Please check your email address.");
            }else{
                return back()->with('notify_error',"Email not found");
            }
        // rest of the register method code here...
    }
    public function resetpassword(Request $request)
    {
        if($request->password == $request->password_confirmation)
        {
            $UserData =  DB::SELECT("SELECT * FROM users WHERE  remember_token = '$request->remember_token'");
            if(count($UserData) > 0)
            {   
                $reset_code = Hash::make($request->password);
                $remember_token = md5(time());
                DB::UPDATE("UPDATE users SET password='".$reset_code."', remember_token='".$remember_token."'  WHERE  id = ".$UserData[0]->id);
                return redirect()->route('home')->with('notify_success',"Your Password has been reset successfully.");
            }else{
                return redirect()->route('home')->with('notify_error',"Reset code has been expired");
            }
        }else{
           return back()->with('notify_error',"Passowrd Mismatch");
        }
        // rest of the register method code here...
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd($data);
        return User::create([
            'role' => $data['role'],
            'name' => $data['name'],
            'first_name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'verified' => $data['verified'],
            'is_active' => 0,
        ]);
    }
    public function SendResetEmail($request)
    {
        dd($request);
    }
}
