<?php
namespace App\Http\Controllers\Module;
use Helper;
use View;
use Illuminate\Http\Request;
use Cache;
use Session;
use App\Model\products;
use App\Http\Controllers\Controller;
use DB;
class CartController extends Controller
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
		//Session::forget('cart');
		//dd(Session::get('cart'));
		if(count($this->getCart())>0){
			return view('module.cart.index')->with('header',true)->with('title','Cart');
		}
		return redirect()->route('home')->with('notify_error','No Data in cart');
	}
	public function data(){
		header('Cache-Control: no-store');
        header('Pragma: no-cache');
		$this->echoSuccess(["cart"=>$this->getCart(),"category"=>Helper::fireQuery("select id,flag_value from m_flag where flag_type='PRODUCTCATEGORY' and is_active=1 and is_deleted=0")]);
	}
	public function add(Request $request){
		//dd($request->all());
		$cart = $this->getCart();
		if(!$this->checkStock($request->productId,1))
		{
			return $this->echoErrors("product is out so stock");
		}
		if($this->isInCart($request->productId)){
			$this->qtyUpdate($request);
			return;
		} else {
			$cart[$request->productId]=[];
		}
		$cart[$request->productId]['product_detail']=Helper::getImageWithRow('products','id',$request->productId,'is_active=1 and is_deleted=0');
		$cart[$request->productId]['qty']=!isset($cart[$request->productId]['qty'])?1:intval($cart[$request->productId]['qty'])+1;
		$cart[$request->productId]['color']=$request->color;
		$cart[$request->productId]['size']=$request->size;
		
		$this->updateInCart($cart);
		$this->echoSuccess("Product added in the cart");
	}
	public function getCartSum(Request $request){
		header('Cache-Control: no-store');
        header('Pragma: no-cache');
		$total=0;
		if(count($this->getCart())>0){
			$cart = $this->getCart();
			foreach($cart as $car){
				$total+=($car['product_detail']->product_price*intval($car['qty']));
			}
		}
		$this->echoSuccess(number_format($total,2));
	}
	public function getCart(){
		return Session::get('cart');
	}
	public function totalCart(){
		return $this->echoSuccess(count(Session::get('cart')));
	}
	public function updateInCart($productIndex){
		Session::put('cart',$productIndex);
	}
	public function isInCart($productid){
		$cart = Session::get('cart');
		if(count($cart)>0){
			if(isset($cart[$productid])){
				return true;
			} else {
				return false;
			}
		}
	}
	public function remove($productid,Request $request){
		header('Cache-Control: no-store');
        header('Pragma: no-cache');
		if($this->isInCart($productid)){
			$cart=$this->getCart();
			unset($cart[$productid]);
			$this->updateInCart($cart);
			$this->echoSuccess("Product Removed from cart");
		} else {
			$this->echoSuccess("Product Removed from cart");
		}
	}
	public function qtyUpdate(Request $request){
		header('Cache-Control: no-store');
        header('Pragma: no-cache');
		if($this->isInCart($request->productId)){
			$cart=$this->getCart();
			// check stock
			if(!$this->checkStock($request->productId,intval($cart[$request->productId]['qty'])+1))
			{
				return $this->echoErrors("product out of stock");
			}
			$cart[$request->productId]['qty']=!isset($request->qty)?intval($cart[$request->productId]['qty'])+1:$request->qty;
			$cart[$request->productId]['color']=!isset($request->color)?$cart[$request->productId]['color']: $request->color;
			$cart[$request->productId]['size']=!isset($request->size)?$cart[$request->productId]['size']:$request->size;
			//$cart[$request->productId]['otherdata']=!isset($request->otherdata)?$cart[$request->productId]['otherdata']:$request->otherdata;
			$this->updateInCart($cart);
			$this->echoSuccess("Quantity Updated");
		}
	}

	public function updateMultiData(Request $request){
		
		if(count($this->getCart())>0){
			$cart=$this->getCart(); 
			foreach($this->getCart() as $key=>$items)
			{
				if(!$this->checkStock( $items['product_detail']->id,$_POST['qty'][$key]))
				{
					$product = Helper::OneColData('products','product_name','id='.$request->productId);
					return redirect()->route('module.cart')->with('notify_message',$product. "is out so stock");
				}
				$cart[$key]['qty'] = !isset($_POST['qty'][$key])?intval($cart[$request->productId]['qty'])+1:$_POST['qty'][$key];
				$this->updateInCart($cart);
			}
			return redirect()->route('module.cart')->with('notify_message','Your Cart Updated Successfully');
		
		}
	}
	
	public function checkStock($id,$qty){
		if($product = Helper::returnRow('products','id='.$id))
		{
			$orders_products = Helper::firstRow('Select sum(product_qty) as sold_qty from orders_products where product_id='.$id);
			//dd($orders_products->sold_qty,$product->product_stock);
			if(intval($orders_products->sold_qty) < intval($product->product_stock))
			{
				return true;
			}
			return false;
		}
	return false;
	}
}
