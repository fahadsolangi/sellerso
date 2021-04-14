<?php
namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\yTableUpdatePasswordRequest;
use App\Http\Requests\AccountInfoRequest;
use App\Model\User;
use Helper;
use View;
use Auth;
use Hash;
use Crypt;
use Session;
use App\Model\orders;
use App\Model\package;
use App\Model\plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
    public function index(){
        $user = Auth::user();
        $user_id = $user->id;
        //$orders = Helper::fireQuery("SELECT * from orders where  user_id = {$user_id}");
        return view('customer.panel')
        ->with('header',true)
        ->with('panelMenu',true)
        ->with('title',$user->name.' Dashboard')
        ->with(compact('user'));
    }
    public function UpdateAccount(AccountInfoRequest $request){
        extract($_POST);
        $user = User::find(Auth::user()->id);
        $user->name = $first_name.' '.$last_name;
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->email = $email;
        // $user->address = $address;
        $user->phone = $phone;
        // $user->zipcode = $zipcode;
        $user->save();
        return redirect()->route('customer.panel')->with('notify_success','Data Updated successfully');
    }
    public function updatePassword(){
        $user = Auth::user();
        return view('customer.updatePassword')->with('header',true)->with('updateMenu',true)->with(compact('user'));
    }
    public function orderdetails(){
        
        $id = isset(request()->id) ? request()->id : '';
        //$getOrder = Helper::firstRow('Select * from orders o left join orders_products op on op.order_id = o.order_id left join products p on p.id = op.product_id  where o.order_id="'.$id.'"');
        $getOP = Helper::returnRow('orders_products','order_id='.$id);
        //dd($getOP);
        $proid = (!empty($getOP->product_id)) ? $getOP->product_id : Helper::OneColData('package','product_id','id='.$getOP->package_id);
        $connectionDetail = Helper::OneColData('products','connectionDetail','id='.$proid);
        if(!empty($connectionDetail))
        {
            $data = json_decode($connectionDetail);
            $userData = $data->table1data;
            // dd($userData);
            return $this->echoSuccess($userData);
        }
        else
            return $this->echoErrors('data not found');
    }

    public function saveUserData(Request $request){
        return redirect()->route('home')->with('notify_message', 'Data Saved');
    }

    public function dbconnect($order_id){
        //dd($order_id);
        $getOrder = Helper::firstRow('Select * from orders o left join orders_products op on op.order_id = o.order_id left join products p on p.id = op.product_id  where o.order_id="'.$order_id.'"');
        //dd($getOrder);
        // /dd($getOrder->order_user_data);
        //dd(json_decode($getOrder->connectionDetail));
        $data = json_decode($getOrder->connectionDetail);
        $userData = json_encode($data->table1data);
       //dd($userData);
        if($getOrder){
            if(!empty($getOrder->order_user_data)){
                return redirect()->route('home')->with('notify_message', 'You already purchased this software');
            }
            else{
                $orders = orders::find($order_id);  
                $orders->order_user_data = $userData;
                $orders->save();
                return redirect()->route('home')->with('notify_message', 'Data Saved');
            }
        }
    }
    public function submitPassword(yTableUpdatePasswordRequest $request){
        //echo 'test1';
        $validated = $request->validated();

        $user = User::find(Auth::user()->id);
        //var_dump(request()->input('newPass'));
        //return;
        $user->password = Hash::make(request()->input('newpass'));

        if($user->save()){
            return redirect()->back()->with('notify_success','Password updated');
        }else{
            return redirect()->back()->with('notify_error','Unable to update your profile information');
        }
    }
    public function ordersManagement(){
        $user = Auth::user();
        $pageno = (isset($_GET['pageno']) && !empty($_GET['pageno']) ) ? $_GET['pageno'] : 1;
        $perPage=50;
        $pageoffset= ($pageno-1)*$perPage;
        $total_orders = count(Helper::fireQuery("Select o.* from orders o where o.user_id=".$user->id));
        $orders = Helper::fireQuery("Select o.* from orders o where payment_status = 1 and o.user_id=".$user->id."  limit $pageoffset,$perPage");
        return view('customer.orders_management')
        ->with('ordersMenu',true)
        ->with('header',true)
        ->with(compact('orders','total_orders','perPage','pageno','pageoffset'));
    }
    public function invoice($id =false){
        $user = Auth::user();
        $user_id = $user->id;
        $orders = Helper::firstRow("SELECT * from orders where  order_id = {$id} and user_id = {$user_id}");
        return view('customer.invoice')->with('header',true)->with('title',$user->name.' Dashboard')->with(compact('user','orders'));
    }

    public function logout(){
        Session::forget('cart');
        Auth::logout();
        return redirect()->route('home')->with('notify_success','Logged out successfully');
    }
}
