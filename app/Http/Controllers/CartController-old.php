<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use App\Http\Requests\saveAddressOrderRequest;
use View;
use DB;
use Session;
use Auth;
use App\Model\User;
use App\Model\orders;
use App\Model\orders_products;
use App\Model\package;
use Carbon\Carbon;
// use App\Model\orders;
// use App\Model\orders_products;
use Validator;
use Mail;
use Hash;
use Helper;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
class CartController extends Controller

{

  public function __construct()
	{
    $this->middleware('guest');
    $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
    View()->share('favicon',$favicon);
    View()->share('config',$this->getConfig());
	}
	 public function cart()
    {
    	//dd('cart');
		if(Session::get('cart') && count(Session::get('cart'))>0){
			
			return view('cart')->with('title','Cart');
		}else{
			return redirect('/')->with('notify_error','No data in cart');
		}
    }
    public function checkout()
    {
    	//dd('checkout');
    	$user = Auth::user();
    	if(!Auth::check()){
    		return redirect('/login')->with('notify_error',"Login required before checkout");
    	}
        if(!Session::has('cart')){
            return redirect('/')->with('notify_error','No data in cart');
        }
        $cart=Session::get('cart');
        if(count($cart)>0){
            $countries = Helper::returnDataSet('countries','');
            return view('checkout')->with('title','Checkout')->with(compact('cart','countries','user'));
        }
        return redirect('/')->with('notify_error','No data in cart');
    }
	public function thankyou(){
	//if(Auth::check()){
		if(isset($_GET['oid'])){
			//echo "hi";exit;
			$orderId = intval($_GET['oid']);
			$data = array();
			$data['curOrder'] = collect(\DB::select("SELECT * FROM orders where order_id = ".$orderId))->first();
			if($data['curOrder']->user_id != 0)
			{
				$user_id = $data['curOrder']->user_id;
				$data['curUser'] = collect(\DB::select("SELECT * FROM users where id = ".$user_id))->first();
				//$data['curUserDet'] = collect(\DB::select("SELECT * FROM user_details where ref_id = ".$user_id))->first();
			}
			$data['curOrderDet'] = DB::select("SELECT orders_products.* from orders_products where orders_products.order_id = ".$orderId);
			//dd($data['curOrderDet']);
				return view('thankyou')
	            ->with('data',$data)
	            ->with('title','Thank you');

			}		
		else{
			return redirect('/')->with('mainPageResponseError', array("No Products In cart"));
		}    	
	}
	public function removeCart(){
		$id = isset(request()->id) ? request()->id : '';
		if($id!=""){
			if(Session::has('cart')){
				$cart = Session::get('cart');
			}
			if(array_key_exists($id,$cart)){
				unset($cart[$id]);
			}
			Session::put('cart',$cart);
		}
		return $this->echoSuccess('success');
	}
        public function saveCart()
    {
		//dd(request());
		$result = array();
		$price = 0;
		$multiprc = 0;
		$id = isset(request()->id) ? request()->id : '';
		$proid = isset(request()->proid) ? request()->proid : '';
		$qty = isset(request()->qty) ? intval(request()->qty) : '0';
		//dd($size);
		$cart = array();
		//dd($cart);
 		$cartId = $id;
		if(Session::has('cart')){
			$cart = Session::get('cart');
			//dd($cart);
		}
		if($id!=""&&intval($qty)>0){

			if(array_key_exists($cartId,$cart)){
				unset($cart[$cartId]);
			}
			// $productFirstrow = Helper::getImageWithRow('products','id',$id,"is_deleted=0 and is_active=1");
			$packageFirstrow = Helper::getImageWithRow('package','id',$id,"is_deleted=0 and is_active=1");
			if($packageFirstrow){
						$cart[$cartId]['id'] = $id;
						$cart[$cartId]['proid'] = $proid;
						$cart[$cartId]['name'] = $packageFirstrow->name;
						// $cart[$cartId]['slug'] = $packageFirstrow->slug;
						// $cart[$cartId]['img_path'] = $packageFirstrow->img_path;
						// $cart[$cartId]['img_id'] = $packageFirstrow->img_id;
						// $cart[$cartId]['category_id'] = Helper::OneColData("category","name","id=".$packageFirstrow->category_id);
						$cart[$cartId]['price'] = $packageFirstrow->price;
						// $cart[$cartId]['label_price'] = $packageFirstrow->label_price;
						// $cart[$cartId]['multiprc'] = $multiprc;
						$cart[$cartId]['qty'] = $qty;
						//dd($cart);
						Session::put('cart',$cart);
						$result['msg'] = 'success';						
				} else {
					$result['msg'] = 'error';
					$result['msgTxt'] = 'Package is not for sale right now';
				}
		}
		elseif($id==null&&intval($qty)>0){

			if(array_key_exists($cartId,$cart)){
				unset($cart[$cartId]);
			}
			$productFirstrow = Helper::getImageWithRow('products','id',$proid,"is_deleted=0 and is_active=1");
			//$packageFirstrow = Helper::getImageWithRow('package','id',$id,"is_deleted=0 and is_active=1");
			if($productFirstrow){
						$cart[$cartId]['id'] = $proid;
						$cart[$cartId]['proid'] = $proid;
						$cart[$cartId]['name'] = $productFirstrow->name;
						$cart[$cartId]['slug'] = $productFirstrow->slug;
						$cart[$cartId]['img_path'] = $productFirstrow->img_path;
						$cart[$cartId]['img_id'] = $productFirstrow->img_id;
						// $cart[$cartId]['category_id'] = Helper::OneColData("category","name","id=".$packageFirstrow->category_id);
						$cart[$cartId]['price'] = $productFirstrow->price;
						// $cart[$cartId]['label_price'] = $productFirstrow->label_price;
						// $cart[$cartId]['multiprc'] = $multiprc;
						$cart[$cartId]['qty'] = $qty;
						//dd($cart);
						Session::put('cart',$cart);
						$result['msg'] = 'success';						
				} else {
					$result['msg'] = 'error';
					$result['msgTxt'] = 'Product is not for sale right now';
				}
		}
		else {
			$result['msg'] = 'error';
			$result['msgTxt'] = 'Please add more quantity';
		}
		echo json_encode($result);

  }
  public function updateCart(){
  	if(Session::has('cart'))
  	{
  		$cart = Session::get('cart');
  		//dd($cart);
  		$newCart = array();
  		$multiprc = 0;
  		foreach($cart as $key=>$item)
  		{
				$newCart[$item['id']]['id'] = $item['id'];
				$newCart[$item['proid']]['proid'] = $item['proid'];
				$newCart[$item['id']]['name'] = $item['name'];
				$newCart[$item['id']]['sku'] = $item['sku'];
				$newCart[$item['id']]['slug'] = $item['slug'];
				$newCart[$item['id']]['img_path'] = $item['img_path'];
				$newCart[$item['id']]['img_id'] = $item['img_id'];
				$newCart[$item['id']]['category_id'] =  $item['category_id'];
				$newCart[$item['id']]['price'] = $item['price'];
				$newCart[$item['id']]['label_price'] = $item['label_price'];
				$newCart[$item['id']]['multiprc'] = $multiprc;
				$newCart[$item['id']]['qty'] = $_POST['qty'][$item['id']];
  		}
  		Session::forget('cart');
			Session::put('cart',$newCart);
			return redirect('cart')->with('notify_message','Your Cart Updated Successfully');		
  	}
  	else
  		return back()->with('notify_error',"you don\'t have any cart");
  }
  public function verifypayment(Request $request){
		
		$PAYPAL_OAUTH_API = 'https://api.sandbox.paypal.com/v1/oauth2/token/';
		$PAYPAL_ORDER_API = 'https://api.sandbox.paypal.com/v2/checkout/orders/';
		$PAYPAL_CLIENT = "AYnU6u9hm7Ye69rQPmJekoiSYf-7RrWHX5g-pdjYyp92nxuSl6x7mPcOpm7mJmwuNwFyLL4qjS7zNuIA";//
		$PAYPAL_SECRET = "EO-ClIDCCdyofP-au8OQ6CbTGzyAn1p7svkGZizmxIJgejF0hMH0O5d1SQ_90EMSwTmXkWMbdKu5xKGl";
		
        // live
  //      	$PAYPAL_OAUTH_API = 'https://api.paypal.com/v1/oauth2/token/';
		// $PAYPAL_ORDER_API = 'https://api.paypal.com/v2/checkout/orders/';
		// $PAYPAL_CLIENT = "AVhnSKCLXakMJXd6Hmr_xP4J55HR2pAqHWBO2A2eD-6NsWb-h26lx-H1vfD_lz-jlh1u5hGiHdjdIpfT";
		// $PAYPAL_SECRET = "EB47t8XAfjI11lfyvP3uHj-aK68jy2h3VDj6VH1izXWvv5c05cIZOtCX11RSpYoqRiLSeS--3fSEoSnI";
		
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
			//dd($result2);
			if (curl_errno($orderch)) {
				//echo 'Error:' . curl_error($orderch);
			}
			curl_close($orderch);
			if($result2->status=='APPROVED'){
				$userData=User::find(Auth::user()->id);
				$orders = new orders;
				$orders->order_note = isset($request->note)?$request->note:'';
				$orders->billing_email =$request->email;
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
				$orders->invoice_number = time();
				$orders->orderkey = $request->orderID;
				$orders->payerkey = $request->payerID;
				$total=0;
				$cart = Session::get('cart');	
				//dd($cart);	
				foreach($cart as $car){
					$total+=($car['price']*intval($car['qty']));
				}
				//dd($cart);
				$orders->total_products=count($cart);
				$orders->total_amount=$total;
				$orders->subtotal=$total;
				$orders->user_id=Auth::user()->id;
				$orders->order_cart_data=json_encode($cart);
				$orders->is_deleted=0;
				$orders->order_status=$result2->status;			
				$user = Auth::user();	
				if($orders->save()){
					foreach($cart as $car){
						$order_products = new orders_products;
						$order_products->order_id=$orders->order_id;
						$rtotal=($car['price']*intval($car['qty']));
						$order_products->product_name=$car['name'];
						$order_products->product_price=$car['price'];
						$order_products->user_id=$user->id;
						$order_products->product_id=$car['proid'];
						$order_products->package_id=$car['id'];
						$order_products->product_qty=intval($car['qty']);
						$order_products->sub_total=number_format($rtotal,2);
						if ($car['id']) {
							$packageDetails = package::find($car['id']);	
							$order_products->subscription_expire_date = Carbon::now()->addMonths($packageDetails->months);
						}
						$order_products->save();
					}
					//dd($result2);
				
					//dd($orders);
					$data = $orders;
					$order_products = orders_products::where('order_id',$data->order_id)->get();
                    Mail::send('mail/invoiceemail', ['data' => $data,'order_products'=>$order_products], function ($m) use ($data) {
                    $m->from('info@sellersoftwares.com');
                    $m->to($data->billing_email)->subject('Seller Softwares Order Invoice info@sellersoftwares.com');
                    });
                    
					//Session::forget('cart');
					return $this->echoSuccess($orders->order_id);
				} else {
					return $this->echoErrors(["Unable to save order"]);
				}
			} else {
				return $this->echoErrors(["Payment not verified"]);
			}
		}
	}
	public function saveaddress(Request $request){
		//if(Session::has('cart')){
		/* save data in user*/
		$user = Auth::user();
		//dd($request->all());
		$order_id = $request->orderId;
		

		//dd($order_id);
		$usr = user::find($user->id);	
		$usr->company = isset($request->company) ? $request->company : '';
		$usr->address = $request->address;
		$usr->country = $request->country;
		$usr->state = $request->state;
		$usr->city = isset($request->city) ? $request->city : '';
		$usr->zipcode = $request->zipcode;
		$usr->phone = $request->phone;
		$usr->save();
		$getOrder = Helper::firstRow('Select * from orders o left join orders_products op on op.order_id = o.order_id left join products p on p.id = op.product_id  where o.order_id="'.$order_id.'"');
		return redirect()->route('home')->with('userDetail',$order_id)->with('notify_message', 'Order successfully created..!');
	}

	public function completeOrder(checkoutRequest $request){ 
			//dd($_POST);
		    $method= null;
			$transID= null;
			$authcode= null;
			$payment_status = 0;
		if(Session::has('cart')){
				$userAuth = Auth::user();
				if(Auth::check()){
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
				            $user->password = $pw;
				            $user->role = 2;
				            $user->is_active = '1';
						}
					}
				}
				if(isset($user)){
					$user->name = $_POST['billing_first_name'].' '.$_POST['billing_last_name'];	
					$user->first_name = $_POST['billing_first_name'];
					$user->last_name = $_POST['billing_last_name'];
					$user->address = $_POST['billing_address'];
					$user->apartment = $_POST['billing_apartment'];
					$user->country = $_POST['billing_country'];
					$user->city = isset($_POST['billing_city']) ? $_POST['billing_city'] : '';
					$user->state = $_POST['billing_state'];
					$user->zipcode = $_POST['billing_zip'];
					$user->phone = $_POST['billing_phone'];
					
					$user->save();
				}
				$orders = new orders;
				$orders->order_note = isset($_POST['remarks'])?$_POST['remarks']:'';
				$orders->billing_first_name =$_POST['billing_first_name'];
				$orders->billing_last_name = $_POST['billing_last_name'];
				$orders->billing_apartment = isset($_POST['billing_apartment']) ? $_POST['billing_apartment'] : '';
				$orders->billing_company = isset($_POST['billing_company']) ? $_POST['billing_company'] : '';
				$orders->billing_address = $_POST['billing_address'];
				$orders->billing_country = $_POST['billing_country'];
				$orders->billing_city = isset($_POST['billing_city']) ? $_POST['shipping_company'] : '';
				$orders->billing_state = $_POST['billing_state'];
				$orders->billing_phone = $_POST['billing_phone'];
				$orders->billing_zip = $_POST['billing_zip'];
				$orders->user_id = Auth::check() ? $userAuth->id : 0;
				$orders->shipping_first_name = $_POST['shipping_first_name'];
				$orders->shipping_last_name = $_POST['shipping_last_name'];
				$orders->shipping_address = $_POST['shipping_address'];
				$orders->shipping_country = $_POST['shipping_country'];
				//$orders->shipping_city = $_POST['shipping_city'];
				$orders->shipping_state = $_POST['shipping_state'];
				$orders->shipping_zip = $_POST['shipping_zip'];
				$orders->shipping_phone = $_POST['shipping_phone'];
				$orders->shipping_company = isset($_POST['shipping_company']) ? $_POST['shipping_company'] : '';
				$orders->invoice_number = $this->generateRandom('');
				$orders->save();
				$total = 0;
				$myCart = Session::get('cart');
				foreach($myCart as $key=>$items){
          //$count++;
          $productId = $key;
					$orders_products = new orders_products;
					$orders_products->order_id = $orders->order_id ;
					$orders_products->product_id = $productId;
					$orders_products->product_name = $items['name'];
					$orders_products->product_price = $items['price'];
					$orders_products->product_qty = $items['qty'];
					//$orders_products->product_instruction = $items['instruction'];
					//$orders_products->product_status = 'Pending';
					$orders_products->sub_total = (($items['price']*$items['qty']));
					$orders_products->save();
					$total+= (($items['price']*$items['qty']));
					// remove from wishlist
					//$this->removeWhislist($productId);
	      }
	      //var_dump($total);
      		//$charge = $this->chargeCreditCard($request);
	      	$charge['status'] = 1;
      		if($charge['status'] == 1)
      		{
      			$transID = rand();
      			$authcode = rand();
      			$method = 'Authorize';
      			$payment_status = 1;

      		}
      		else
      			$error=$charge['error'];

				DB::UPDATE("UPDATE orders set invoice_number='".$this->generateRandom($orders->order_id)."' ,total_products = ".count($myCart).",total_amount = ".$total.",payment_status=".$payment_status.",payment_merchant='".$method."',payer_id='".$transID."',auth_code='".$authcode."' where orders.order_id = ".$orders->order_id);

				$data = array();
				if(isset($user))
				{
					$data['curUser'] = collect(\DB::select("SELECT * FROM users where id = ".Auth::user()->id))->first();
				}	

				$data['curOrder'] = $orders;
				//$data['curHotel'] = $current_hotel;
				$data['curOrderDet'] = DB::select("SELECT order_id,orders_products.* from orders_products 
					left join package on package.id = orders_products.product_id 
					where orders_products.order_id = ".$orders->order_id);
				Session::forget('cart');
				if($payment_status == 1)
				{
					Session::forget('cart');
					return redirect('/thankyou?oid='.$orders->order_id)->with('test', $data);
				}
				else
					return back()->withInput()->with('notify_error',$error);
		}else {
			return back()->with('mainPageResponseError', ['your cart has been expired']);
		}
	}
	private function chargeCreditCard($request)
    {
    	$array= ['status'=>0];
        // Common setup for API credentials
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(config('services.authorize.login'));
        $merchantAuthentication->setTransactionKey(config('services.authorize.key'));
        $refId = 'ref'.time();
// Create the payment data for a credit card
          $creditCard = new AnetAPI\CreditCardType();
          $creditCard->setCardNumber($request->cnumber);
          // $creditCard->setExpirationDate( "2038-12");
          $expiry = $request->card_expiry_year . '-' . $request->card_expiry_month;
          $creditCard->setExpirationDate($expiry);
          $paymentOne = new AnetAPI\PaymentType();
          $paymentOne->setCreditCard($creditCard);
// Create a transaction
          $transactionRequestType = new AnetAPI\TransactionRequestType();
          $transactionRequestType->setTransactionType("authCaptureTransaction");
          $transactionRequestType->setAmount($request->camount);
          $transactionRequestType->setPayment($paymentOne);
          $request = new AnetAPI\CreateTransactionRequest();
          $request->setMerchantAuthentication($merchantAuthentication);
          $request->setRefId( $refId);
          $request->setTransactionRequest($transactionRequestType);
          $controller = new AnetController\CreateTransactionController($request);
          $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);//PRODUCTION
        if ($response != null)
        {
              $tresponse = $response->getTransactionResponse();
              if (($tresponse != null) && ($tresponse->getResponseCode()=="1"))
              {
              	$array=['status'=>1,'authcode'=>$tresponse->getAuthCode(),'transID'=>$tresponse->getTransId()];
                /*echo "Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode() . "\n";
                echo "Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "\n";
                */
              }
              else
              {
                if ($tresponse != null && $tresponse->getErrors() != null) 
                {
                  //echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                  //echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                	$array['error']=$tresponse->getErrors()[0]->getErrorText();
                }
                else
                  $array['error']='Invalid response';
                  //echo "Charge Credit Card ERROR :  Invalid response\n";
              }
        }    
            else
            {
            	$array['error']='Charge Credit Card Null response returned';
              	//echo  "Charge Credit Card Null response returned";
            }
        return $array;
    }
	public function addWishlist()
    {
		if(Auth::check()){
			//$data = array();
			if($_POST['ArrayofArrays'][1] == 'checked' ){
				if($this->removeWhislist($_POST['ArrayofArrays'][0]) == 'success')
					$data=['message'=>'product remove from wishlist','status'=>'unchecked'];
				/*else
					$data=['message'=>'Login Before removing to wishlist','status'=>'error'];*/
			}
			else{
				$wishlist =	new wishlist;
				$wishlist->product_id = $_POST['ArrayofArrays'][0];
				$wishlist->user_id = Auth::user()->id;
				$wishlist->save();
				$data=['message'=>'Product Added to wishlist','status'=>'checked'];	
			}
		}
		else
			$data=['message'=>'Login Before removing to wishlist','status'=>'error'];	
		
		return json_encode($data);		
	}
	
	public function removeWhislist($product_id=''){
		if(Auth::check())
		{
			if(isset($_POST['ArrayofArrays'][0]) and !empty($_POST['ArrayofArrays'][0]))
				$product_id = $_POST['ArrayofArrays'][0];
			if($product_id != "")
			{
				wishlist::where(['product_id'=>$product_id,'user_id'=>Auth::user()->id])->delete();
				return 'success';
			}
		}
		else
			return "Login Before remove product to wishlist";
	}
	public function postStripe(Request $request)
    {
       if( Auth::user())
       {	
       		$id =  Auth::id();
           \Stripe\Stripe::setApiKey('sk_test_1cyQT5ZNQCyeTTqMfSenniRA');
	        $token  = $request->stripeToken;
	        $email  = $request->stripeEmail;
	        $customer = \Stripe\Customer::create(array(
	            'email' => $email,
	            'source'  => $token
	            ));
	        $price = $request->amount;
	        $price = $price*100;
	        $charge = \Stripe\Charge::create(array(
	            'customer' => $customer->id,
	            'amount'   => $price,
	            'currency' => 'gbp'
	        ));

	        $chrg = $charge->id;
	        	DB::UPDATE("UPDATE orders set order_tip_amount = '".$request->amount."',order_tip_charge_id = '".$chrg."',order_tip_review = '".$request->amount."' where order_id = ".$request->order_id);
	       
	        return back()->with('DynamicHeading','Home')->with('homeMenu',true)->with('mainPageResponse',"Thanks for your review");
	    }
	    return back()->with('DynamicHeading','Home')->with('homeMenu',true)->with('mainPageResponse',"Some thing Wrong");

	}
}