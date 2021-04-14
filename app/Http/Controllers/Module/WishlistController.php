<?php
namespace App\Http\Controllers\Module;
use Helper;
use View;
use Illuminate\Http\Request;
use Cache;
use Session;
use App\Model\products;
use App\Model\wishlists;
use App\Http\Controllers\Controller;
use Auth;
use DB;
class WishlistController extends Controller
{
	public function __construct()
    {
        $this->middleware('guest');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
        /*Recent posts*/
        //$recentPosts = Helper::getImageWithData('blog','id','',"is_active=1 and is_deleted=0",0,"ORDER BY id DESC LIMIT 3");
       // View()->share('recentPosts',$recentPosts);
        /*Recent posts end*/
    }
    public function index(){
    	if(Auth::check())
    	{
    		$wishlist = DB::select("SELECT * FROM wishlists where user_id = ".Auth::user()->id);
			return view('module.wishlist.index')->with('header',true)->with('title','wishlist')->with(compact('wishlist'));
		}else
			return redirect()->route('home')->with('notify_error','Login first to see wishlist');
	}
	public function add()
    {
		if(Auth::check()){
			//$data = array();
			if($_POST['status'] == 'checked' ){
				$wishlistRemove=$this->remove($_POST['productId']);
				$wish = json_decode($wishlistRemove);
				if($wish->status == 1)
					$data=['message'=>'product remove from wishlist','status'=>'unchecked'];
				/*else
					$data=['message'=>'Login Before removing to wishlist','status'=>'error'];*/
			}
			else{
				$wishlist =	new wishlists;
				$wishlist->product_id = $_POST['productId'];
				$wishlist->user_id = Auth::user()->id;
				$wishlist->save();
				$data=['message'=>'Product Added to wishlist','status'=>'checked'];	
			}
		}
		else
			$data=['message'=>'Login Before adding/removing to wishlist','status'=>'error'];	
		
		return json_encode($data);		
	}
	
	public function remove($product_id=''){
		if(Auth::check())
		{
			if(isset($_POST['product_id']) and !empty($_POST['product_id']))
				$product_id = $_POST['product_id'];
			if($product_id != "")
			{
				wishlists::where(['product_id'=>$product_id,'user_id'=>Auth::user()->id])->delete();
				return json_encode(array("status"=>1,"data"=>'success'));
			}
		}
		else
			return $this->echoErrors('Login Before remove product to wishlist');
	}
}