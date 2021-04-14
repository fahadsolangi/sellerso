<?php
namespace App\Http\Controllers\Module;
use Helper;
use View;
use Illuminate\Http\Request;
use Cache;
use Session;
use App\Model\products;
use App\Model\User;
use App\Model\orders_products;
use App\Model\orders;
use Auth;
use DB;
use App\Http\Requests\saveAddressOrderRequest;
//use App\Http\Controllers\Module\CartController;
class OrderController extends CartController
{
    public function __construct()
    {
        $this->middleware('guest');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
        /*Recent posts*/
        //$recentPosts = Helper::getImageWithData('blog','id','',"is_active=1 and is_deleted=0",0,"ORDER BY id DESC LIMIT 3");
        //View()->share('recentPosts',$recentPosts);
        /*Recent posts end*/
    }
	public function checkout(){
		if(Auth::check())
		{
			if(count($this->getCart())>0){
			$countries = DB::table('countries')->get();
			return view('module.checkout.index')->with('title','Checkout')->with('cart',$this->getCart())->with(compact('countries'));
			}
			return redirect()->route('productslistview')->with('notify_error','No Data in cart');
		}	
		return redirect()->route('login')->with('notify_error','please login first');
	}
	public function saveaddress(saveAddressOrderRequest $request){
		if(Session::has('cart')){
		/*if(Auth::check()){
			$user = User::find($userAuth->id);
		}
		else{
			if(isset($_POST['create_account'])){ //check if create account is selected
				if(!empty($_POST['email']) && !empty($_POST['password'])){ // email and password not empty
					$email = Helper::oneColData('users','email',"email = '".$_POST['email']."'");
					if(!empty($email)) // if email is already exist then redirect back
	        			return back()->with('mainPageResponseError', array("Email is already exist"));
					
					$pw = Hash::make($_POST['password']);
					$user = new User;
		            $user->email = $_POST['email'];
		            //$user->name = $_POST['billing_first_name'].' '.$_POST['billing_last_name'];
		            $user->password = $pw;
		            $user->role = 2;
		            $user->is_active = '1';
		        }
			}
		}
		$user->first_name=$request->first_name;
		$user->last_name=$request->last_name;
		$user->address=$request->address;
		$user->address2=$request->address2;
		$user->company=$request->company;
		$user->country=$request->country;
		$user->state=$request->state;
		$user->city=isset($request->city) ? $request->city : '';
		$user->zipcode=$request->zipcode;
		$user->phone=$request->phone;
		$user->save();*/

		/* NOW SAVE IN ORDER TABLE*/
		$orders = new orders;
		$orders->order_note = isset($request->note)?$request->note:'';
		$orders->billing_first_name =$request->first_name;
		$orders->billing_last_name = $request->last_name;
		$orders->billing_company = isset($request->company) ? $request->company : '';
		$orders->billing_address = $request->address;
		$orders->billing_address2 = $request->address2;
		$orders->billing_country = $request->country;
		$orders->billing_city =  isset($request->city) ? $request->city : '';
		$orders->billing_state = $request->state;
		$orders->billing_phone = $request->phone;
		$orders->billing_zip = $request->zipcode;
		$orders->user_id = Auth::check() ? Auth::user()->id : 0;
		$orders->shipping_first_name = $request->first_name;
		$orders->shipping_last_name = $request->last_name;
		$orders->shipping_address = $request->address;
		$orders->shipping_address2 = $request->address2;
		$orders->shipping_country = $request->country;
		$orders->shipping_city =isset($request->city) ? $request->city : '';
		$orders->shipping_state = $request->state;
		$orders->shipping_zip = $request->zipcode;
		$orders->shipping_phone = $request->phone;
		$orders->shipping_company = isset($request->company) ? $request->company : '';
		$orders->invoice_number = $this->generateRandom('');
		$orders->save();

			
		$total = 0;
		$myCart = Session::get('cart');
		foreach($myCart as $key=>$items){
  			//$count++;
  			$price = $items['product_detail']->product_price;
  			$productId = $key;
			$orders_products = new orders_products;
			$orders_products->order_id = $orders->order_id ;
			$orders_products->product_id = $productId;
			$orders_products->product_name = $items['product_detail']->product_name;
			$orders_products->product_price = $price;
			$orders_products->product_qty = $items['qty'];
			//$orders_products->product_instruction = $items['instruction'];
			//$orders_products->product_status = 'Pending';
			$orders_products->sub_total = ($price*$items['qty']);
			$orders_products->save();
			$total+= ($price*$items['qty']);
			// remove from wishlist
			//$this->removeWhislist($productId);
      	}
      	/* Authorizenet transaction */
      	/*if($_POST['payment_merchant'] == 'authorize')
      	{
      		//var_dump($total);
      		$charge = $this->chargeCreditCard($request);
      		if($charge['status'] == 1)
      		{
      			$transID = $charge['transID'];
      			$authcode = $charge['authcode'];
      			$method = 'Authorize';
      			$payment_status = 1;

      		}
      		else
      			$error=$charge['error'];

      	}*/
      		$payment_status = 1;
      		DB::UPDATE("UPDATE orders set invoice_number='".$this->generateRandom($orders->order_id)."' ,total_products = ".count($myCart).",total_amount = ".$total.",payment_status=".$payment_status." where orders.order_id = ".$orders->order_id);

			$data = array();
			if(isset($user))
			{
				$data['curUser'] = collect(\DB::select("SELECT * FROM users where id = ".Auth::user()->id))->first();
				//$data['curUserDet'] = collect(\DB::select("SELECT * FROM user_details where ref_id = ".Auth::user()->id))->first();
			}	

			$data['curOrder'] = $orders;
			//$data['curHotel'] = $current_hotel;
			$data['curOrderDet'] = DB::select("SELECT order_id,orders_products.* from orders_products 
				left join products on products.id = orders_products.product_id 
				where orders_products.order_id = ".$orders->order_id);

			
			if($payment_status == 1)
			{
				Session::forget('cart');
				return redirect('/invoice/'.$orders->order_id)->with('test', $data);
			}
			else
				return back()->withInput()->with('notify_error',$error);
			//return view('view-stripe')->with('DynamicHeading','test');
		}else {
			return back()->with('notify_error', 'your cart has been expired');
		}
		//Session::put('addresssaved',true);
		//return redirect()->route('module.shipping');
	}
	public function shipping(){
		if(count($this->getCart())==0){
			return redirect()->route('productslistview')->with('notify_error','No Data in cart');
		}
		if(Session::has('addresssaved')){
			return view('module.checkout.shipping')->with('title','Shipping')->with('cart',$this->getCart());
		} else {
			return redirect()->route('module.checkout')->with('notify_error',"Verify address");
		}
	}
	public function saveShipping(){
		Session::put('shipping',true);
		return redirect()->route('module.payment');//->with('notify_error',"Verify address");
	}
	public function payment(){
		if(count($this->getCart())==0){
			return redirect()->route('productslistview')->with('notify_error','No Data in cart');
		}
		if(!Session::has('addresssaved')){
			return redirect()->route('module.checkout')->with('notify_error',"Verify address");
		}
		if(!Session::has('shipping')){
			return redirect()->route('module.shipping')->with('notify_error',"Add Shipping");
		}
		return view('module.checkout.payment')->with('title','Payment')->with('cart',$this->getCart());
	}
	public function verifypayment(Request $request){
		$PAYPAL_OAUTH_API = 'https://api.sandbox.paypal.com/v1/oauth2/token/';
		$PAYPAL_ORDER_API = 'https://api.sandbox.paypal.com/v2/checkout/orders/';
		$PAYPAL_CLIENT="AUOlvM205Y_7NR6FZMtjNERKBKGq0ho3LlPnPeCIzGU-RdCtFiSTWvIPSLR-BAl3ZkDueA2iyaUEJVJT";
		$PAYPAL_SECRET="EO3qBKFaaWD4cKS6NUT2PF5uMSiuJjGRh4VYBZ6n75TqxnGfFKoM6MMcaQDV6BY3eaw5O6F6rf9qBzgX";
		$basicAuth=base64_encode($PAYPAL_CLIENT.':'.$PAYPAL_SECRET);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $PAYPAL_OAUTH_API);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_USERPWD, $PAYPAL_CLIENT.':'.$PAYPAL_SECRET);

		$headers = array();
		$headers[] = 'Accept: application/json';
		$headers[] = 'Accept-Language: en_US';
		$headers[] = 'Content-Type: application/x-www-form-urlencoded';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = json_decode(curl_exec($ch));
		if (curl_errno($ch)) {
			//echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		if(isset($result->access_token)){
			$orderch = curl_init();
			curl_setopt($orderch, CURLOPT_URL, $PAYPAL_ORDER_API.$request->orderID);
			curl_setopt($orderch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($orderch, CURLOPT_CUSTOMREQUEST, 'GET');
			$headers = array();
			$headers[] = 'Content-Type: application/json';
			$headers[] = 'Authorization: Bearer '.$result->access_token;
			curl_setopt($orderch, CURLOPT_HTTPHEADER, $headers);
			$result2 = json_decode(curl_exec($orderch));
			if (curl_errno($orderch)) {
				//echo 'Error:' . curl_error($orderch);
			}
			curl_close($orderch);
			if($result2->status=='COMPLETED'){
				$userData=User::find(Auth::user()->id);
				$orders = new orders;
				$orders->order_fistname=$userData->first_name;
				$orders->order_lastname=$userData->last_name;
				$orders->order_email=$userData->email;
				$orders->order_address=$userData->user_address;
				$orders->order_city=$userData->user_city;
				$orders->order_destrict=$userData->user_destrict;
				$orders->order_zip=$userData->user_zip;
				$orders->order_phone=$userData->user_phone;
				$total=0;
				$cart = $this->getCart();
				foreach($cart as $car){
					$total+=($car['product_detail']->product_price*intval($car['qty']));
				}
				$orders->order_total=$total;
				$orders->order_subtotal=$total;
				$orders->user_id=Auth::user()->id;
				$orders->order_cart_data=json_encode($cart);
				$orders->order_transaction_detail=json_encode($result2->status);
				$orders->is_deleted=0;
				$orders->order_status=$result2->status;
				if($orders->save()){
					foreach($cart as $car){
						$order_products = new orders_products;
						$order_products->order_id=$orders->id;
						$rtotal=($car['product_detail']->product_price*intval($car['qty']));
						$order_products->order_product_name=$car['product_detail']->product_name;
						$order_products->order_product_price=$car['product_detail']->product_price;
						$order_products->order_product_id=$car['product_detail']->id;
						$order_products->order_product_qty=intval($car['qty']);
						$order_products->order_product_linetotal=number_format($rtotal,2);
						$order_products->order_product_data=json_encode($car['otherdata']);
						$order_products->save();
					}
					Session::forget('cart');
					Session::forget('addresssaved');
					Session::forget('shipping');
					$this->echoSuccess($orders->id);
				} else {
					$this->echoErrors(["Unable to save order"]);
				}
			} else {
				$this->echoErrors(["Payment not verified"]);
			}
		}
	}
	public function invoice($id){
		if(intval($id)>0){
			$data=orders::find($id);
			if($data){
				$order_products = orders_products::where('order_id',$data->id)->get();
				if(Auth::check()){
					if($data->user_id==Auth::user()->id){
						return view('module.checkout.invoice')->with('header',true)->with('title','Invoice #'.$id)->with(compact('data','order_products'));
					} else {
						return redirect()->back()->with('notify_error','Order does not belong to you');
					}
				}
				if(is_adminiy()){
					return view('module.checkout.invoice')->with('header',true)->with('title','Invoice #'.$id)->with(compact('data','order_products'));
				}
			}
		}
		return redirect()->back()->with('notify_error','Invalid Order id');
	}
	public function customizedproduct($id){
		$order_product = order_products::find($id);
		if(!$order_product){
			return redirect()->back()->with('notify_error','Invalid Customized id');
		}
		$data = Helper::getImageWithRow('products','id',$order_product->order_product_id,"is_active=1 and is_deleted=0");
		return view('module.checkout.customizedproduct')->with('title','Product')->with(compact('order_product','data'));
	}
}
