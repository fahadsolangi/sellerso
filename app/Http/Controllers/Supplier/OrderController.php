<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;

use Illuminate\Support\Str;

use Illuminate\Http\Request;

use App\Model\imagetable;

use App\Model\products;

use App\Model\orders;

use App\Model\orders_products;

use App\Model\User;

use Illuminate\Support\MessageBag;

use Helper;

use View;

use Auth;

use Hash;

use Crypt;

use DB;

class OrderController extends Controller

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

    	/*

		$query = products::join('orders_products as op','op.product_id','=','products.id')

    	->join('users as u','u.id','=','products.user_id')

    	->join('category as c','c.id','=','products.category')

		*/
		$query = products::join('orders_products as op','op.product_id','=','products.id')

    	->join('orders as o','o.order_id','=','op.order_id')

    	->join('users as u','u.id','=','o.user_id')

    	->join('users as u2','u2.id','=','products.user_id')

    	->join('category as c','c.id','=','products.category_id')

		->select('u.id as uid','u.name as customer_name','products.name as pname',DB::raw('SUM(op.product_price)  as products_price'),'c.name as cname','o.order_id','o.payment_status','op.orders_products_id','op.delivery_status')

		->where('u2.id',$user->id);

    	if(!empty($productId))

    	{

    		$query = $query->where('products.id',$productId);

    	}
        $query = $query->groupBy("op.order_id");

    	$orders = $query->get();
        //dd($orders);

    	return view('supplier.orders.index')

    	->with('ordersMenu',true)

    	->with('header',true)

    	->with(compact('orders'));

    }

}