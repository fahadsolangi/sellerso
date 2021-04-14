<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Helper;
use View;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = 'customer/panel';//customer/panel
    
    protected function redirectTo(){
        if(isset($_POST['redirectTo']))
        {
            return $_POST['redirectTo'];
        }
        else
        {
            $role = Auth::user()->role; 
            // Check user role
            switch ($role) {
                case 1:
                    return 'supplier/panel';
                    break;
                case 2:
                    return 'customer/panel';
                    break; 
                default:
                    return '/login'; 
                    break;
            }
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        if(isset($_GET['verified']))
        {
            $verified_tok = $_GET['verified'];
            $QR = Helper::fireQuery('Select * from users where verified="'.$verified_tok.'" and   is_active=0');
            if(count($QR) > 0)
            {
                $pricePackage = Helper::fireQuery('Update users set is_active = 1,verified=""  where verified="'.$verified_tok.'"');
                View()->share('favicon',$favicon);
                View()->share('config',$this->getConfig());
                View()->share('title',"Login");
            }
        }
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
        View()->share('title',"Login");
    }
    protected function credentials(Request $request)
    {
        return array_merge(
            $request->only($this->username(), 'password'),
                ['role'=>$request->role]
        );
    }
}
