<?php
namespace App\Http\Controllers\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Model\imagetable;
use App\Model\products;
use App\Model\orders;
use App\Model\orders_products;
use App\Model\rating;
use App\Model\User;
use Illuminate\Support\MessageBag;
use Helper;
use View;
use Auth;
use Hash;
use Crypt;
use DB;
class RatingController extends Controller
{
	public function __construct()
    {
        $this->middleware('supplier');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
    public function index($productId = '')
    {
    	$user = Auth::user();
		$query = products::join('rating as rp','rp.product_id','=','products.id')
    	->join('users as u2','u2.id','=','products.user_id')
    	->join('category as c','c.id','=','products.category_id')
		->select('u2.id as uid',DB::raw('CONCAT(u2.first_name," ",u2.last_name) AS customer_name'),'products.name as product_name','c.name as category_name','rp.rating_name','rp.rating_email','rp.rating_star','rp.rating_content')
		->where('u2.id',$user->id);
    	if(!empty($productId))
    	{
    		$query = $query->where('products.id',$productId);
    	}
    	$rating = $query->get();
        //dd($rating);
    	return view('supplier.rating.index')
    	->with('ratingMenu',true)
    	->with('header',true)
    	->with(compact('rating'));
    }
}