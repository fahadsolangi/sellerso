<?php
namespace App\Http\Controllers\Adminiy\FCCallbackControllers;
use App\Http\Controllers\Controller;
use Helper;
use App\Model\users;
use DB;
use Auth;
use Illuminate\Support\Str;
class usersController extends Controller
{
    public function __construct()
    {
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('v',config('app.vadminiy'));
        View()->share('favicon',$favicon);
    }
    public function beforeInsert($inputs){
    	$inputs['name']=$inputs['first_name'].' '.$inputs['last_name'];
		/*$staff_role = implode(',',$inputs['staff_role']);
		unset($inputs['staff_role']);
		$inputs['staff_role']=$staff_role;
		return $inputs;*/
		return $inputs;
    }
	public function afterInsert($model){
		
	}
	public function beforeDelete($table,$id,$col){
		/*before deleting record*/
	}
	public function afterDelete($table,$id,$col){
		/*after deleting record*/
	}
	public function loginbyid($id){
		Auth::loginUsingId($id);
		return redirect()->route('supplier.panel')->with('notify_success','Logged in as supplier');
	}
}
