<?php
namespace App\Http\Controllers\Supplier;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use App\Http\Requests\yTableUpdatePasswordRequest;
use App\Http\Requests\yTableproductsRequest;
use App\Http\Requests\yTablepackageRequest;
use App\Http\Requests\yTablecategoriesRequest;
use App\Http\Requests\yTablesizesRequest;
use App\Http\Requests\yTablecolorsRequest;
use App\Http\Requests\AccountInfoRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Model\imagetable;
use App\Model\products;
use App\Model\package;
use App\Model\categories;
use App\Model\sizes;
use App\Model\colors;
use App\Model\User;
use App\Model\product_colors;
use App\Model\product_sizes;
use App\Model\product_materials;
use App\Model\related_products;
use Stripe\Stripe;
use Illuminate\Support\MessageBag;
use Storage;
use Helper;
use View;
use Auth;
use Hash;
use Crypt;
use DB;
use Session;
use Mail;
class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('supplier');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
    public function index(){
        $user = Auth::user();
        $user_id = $user->id;
        $orders = Helper::fireQuery("SELECT * from orders_products as od,products as pd,orders as o where pd.id = od.product_id AND o.order_id=od.order_id AND pd.user_id = {$user_id} group by od.order_id");
        $success_order = Helper::fireQuery("SELECT * from orders_products as od,products as pd,orders as o where pd.id = od.product_id AND o.order_id=od.order_id AND pd.user_id = {$user_id} AND o.payment_status = 1 group by od.order_id");
        $order_daywise = Helper::fireQuery("SELECT DATE_FORMAT(o.created_at, '%Y/%m/%d') as `date`,ROUND(SUM(od.product_price)) as value from orders_products as od,products as pd,orders as o where pd.id = od.product_id AND o.order_id=od.order_id AND pd.user_id = {$user_id} group by o.created_at order by o.created_at");
        $products = Helper::fireQuery("SELECT * from products where user_id = {$user_id} AND is_active = 1");
        $packages = Helper::fireQuery("SELECT * from package where user_id = {$user_id} AND is_active = 1");
        // $order_daywise = "";
        if(count($order_daywise) > 0){
          $order_daywise = json_encode($order_daywise);
        }else{
          $order_daywise = "";
        }
        return view('supplier.panel')
        ->with('header',true)
        ->with('panelMenu',true)
        ->with('title',$user->name.' Dashboard')
        ->with(compact('user','products','orders','success_order','order_daywise'));
    }
    public function UpdateAccount(AccountInfoRequest $request){
        extract($_POST);
        $user = User::find(Auth::user()->id);
        $user->name = $first_name.' '.$last_name;
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->email = $email;
        $user->address = $address;
        $user->phone = $phone;
        $user->zipcode = $zipcode;
        $user->save();
        return redirect()->route('supplier.panel')->with('notify_success','Data Updated successfully');
    }
    public function updatePassword(){
        $user = Auth::user();
        return view('supplier.updatePassword')->with('header',true)->with('updateMenu',true)->with(compact('user'));
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
    public function productsManagement(){
        $user = Auth::user();
        $pageno = (isset($_GET['pageno']) && !empty($_GET['pageno']) ) ? $_GET['pageno'] : 1;
        $perPage=50;
        $pageoffset= ($pageno-1)*$perPage;
        $total_products = count(Helper::fireQuery("SELECT p.*,i.id as img_id,i.img_path,c.name FROM products p LEFT JOIN imagetable i on i.ref_id=p.id and table_name='products' join category c on c.id = p.category_id LEFT JOIN (SELECT SUM(product_qty) AS sold_qty,product_id FROM orders_products GROUP BY product_id) AS soldproducts ON soldproducts.product_id = p.id where p.user_id=".$user->id));
        $products = Helper::fireQuery("SELECT c.name as category_name,p.*,i.id as img_id,i.img_path,sold_qty FROM products p LEFT JOIN imagetable i on i.ref_id=p.id and table_name='products' and i.type=1 and is_deleted=0 join category c on c.id = p.category_id LEFT JOIN (SELECT SUM(product_qty) AS sold_qty,product_id FROM orders_products GROUP BY product_id) AS soldproducts ON soldproducts.product_id = p.id where p.user_id=".$user->id." order by p.created_at desc limit {$pageoffset},{$perPage}");
        return view('supplier.products_management')
        ->with('productsMenu',true)
        ->with('header',true)
        ->with(compact('products','total_products','perPage','pageno','pageoffset'));
    }
    public function productAddition($id = '')
    {

        $product = '';
        $user = Auth::user();
        $categoryType = Helper::returnDataSet('m_flag',"is_active = 1 and flag_type='CATEGORYTYPE'");
        $category = Helper::returnDataSet('category',"is_active=1 ");
        $relatedProducts = Helper::returnDataSet('products',"is_active=1 and user_id=".$user->id);
        if(!empty($id))
        {
          //dd($id);
            $pro = Helper::firstRow('select p.*,i.id as img_id,i.img_path from products p left join imagetable i on i.ref_id=.p.id and table_name="products" and type =1 where p.id='.$id.' and p.user_id='.$user->id);
            if($pro)
            {
                $relatedProducts = Helper::returnDataSet('products','is_active=1 and user_id='.$user->id.' and id <>'.$pro->id);
                $product = $pro;

            }
            else
                return back()->with('notify_error',"This product is doesn't belongs to you");
        }
        //dd($product);
        return view('supplier.product_addition')
        ->with('productAdditionMenu',true)
        ->with('header',true)
        ->with(compact('product','user','categoryType','category','relatedProducts'));
    }

    public function packageManagement(){
        $user = Auth::user();
        $pageno = (isset($_GET['pageno']) && !empty($_GET['pageno']) ) ? $_GET['pageno'] : 1;
        $perPage=50;
        $pageoffset= ($pageno-1)*$perPage;
        $total_package = count(Helper::fireQuery("SELECT * FROM package p, products pr  where p.product_id = pr.id AND p.user_id=".$user->id));


        $package = Helper::fireQuery("SELECT p.name,p.price,p.is_active,p.id,p.detail,pr.name as pname FROM package p ,products pr  where p.product_id = pr.id AND p.user_id=".$user->id." order by p.created_at desc limit {$pageoffset},{$perPage}");
        //dd($package);
        //dd($products);
        //$total_orders = count(Helper::fireQuery("Select o.* from orders o where o.user_id=".$user->id));
        //$products = Helper::fireQuery("Select o.* from orders o where payment_status = 1 and o.user_id=".$user->id."  limit $pageoffset,$perPage");
        return view('supplier.package_management')
        ->with('packageMenu',true)
        ->with('header',true)
        ->with(compact('package','total_package','perPage','pageno','pageoffset'));
    }

    public function packageAddition($id = '')
    {

        $package = '';
        $user = Auth::user();
        $categoryType = Helper::returnDataSet('m_flag',"is_active = 1 and flag_type='CATEGORYTYPE'");
        $category = Helper::returnDataSet('category',"is_active=1 ");
        $userProducts = Helper::returnDataSet('products',"is_active=1 and user_id=".$user->id);
        //dd($userProducts);
        $relatedpackage = Helper::returnDataSet('package',"is_active=1");
        //dd($relatedpackage);
        if(!empty($id))
        {
            $pack = Helper::firstRow('select p.* from package p where id="'.$id.'" ');
            //dd($pack);
            if($pack)
            {
                $relatedpackage = Helper::returnDataSet('package','is_active=1 and id <>'.$pack->id);
                //dd($relatedpackage);
                $package = $pack;
            }
            else
                return back()->with('notify_error',"This package is doesn't belongs to you");
        }
        //dd($product);
        return view('supplier.package_addition')
        ->with('packageAdditionMenu',true)
        ->with('header',true)
        ->with(compact('product','package','user','userProducts','relatedpackage'));
    }
    public function categoryAddition($category_slug = '')
    {

        $category = '';
        $user = Auth::user();
        $categoryType = Helper::returnDataSet('m_flag',"is_active = 1 and flag_type='CATEGORYTYPE'");
        $category = Helper::returnDataSet('categories',"is_active=1 ");
        //dd($category);
        if(!empty($category_slug))
        {
            $cat = Helper::firstRow('select * from categories where category_slug="'.$category_slug.'" and p.user_id='.$user->id);
            if($cat)
            {
                $relatedcategory = Helper::returnDataSet('categories','is_active=1 and user_id='.$user->id.' and id <>'.$cat->id);
                $category = $cat;
            }
            else
                return back()->with('notify_error',"This category is doesn't belongs to you");
        }
        return view('supplier.category_addition')
        ->with('categoryAdditionMenu',true)
        ->with('header',true)
        ->with(compact('category','user','categoryType','category'));
    }
    public function sizeAddition($size_slug = '')
    {

        $size = '';
        $user = Auth::user();
        $size = Helper::returnDataSet('sizes',"is_active=1 ");
        //dd($category);
        return view('supplier.size_addition')
        ->with('sizeAdditionMenu',true)
        ->with('header',true)
        ->with(compact('size','user'));
    }
    public function colorAddition($color_slug = '')
    {

        $color = '';
        $user = Auth::user();
        $color = Helper::returnDataSet('colors',"is_active=1 ");
        //dd($category);
        return view('supplier.color_addition')
        ->with('colorAdditionMenu',true)
        ->with('header',true)
        ->with(compact('color','user'));
    }
	public function getCategories(Request $request)
	{
		if($request->type)
		{
			$category = Helper::returnDataSet('categories','category_type='.$request->type);
			return $this->echoSuccess($category);
		}
		return $this->echoErrors('Data not found');
	}
    public function productSubmit(yTableproductsRequest $request, MessageBag $message_bag)
    {
            $errors_message = "";
            if($request->category == 0)
            {
              $errors_message .= "Please select category name <br>";
            }
            if($request->name == "")
            {
              $errors_message .= "Please enter product name <br>";
            }
            if($request->connection_type == "")
            {
              $errors_message .= "Please select connection type <br>";
            }
            if($request->connection_type == 1)
            {
                config(['database.connections.mysql_source.host' => $request->db_host]);
                config(['database.connections.mysql_source.database' => $request->db_database]);
                config(['database.connections.mysql_source.username' => $request->db_user]);
                config(['database.connections.mysql_source.password' => $request->db_pass]);
                try {
                    if(DB::connection('mysql_source')->select('SHOW TABLES LIKE "'.$request->usertable.'"'))
                    {
                       if(strlen(trim($request->firstname)) > 0)
                       {
                           $isColExist = Schema::connection("mysql_source")->hasColumn($request->usertable,$request->firstname);
                           if(empty($isColExist))
                           {
                              $errors_message .= $request->firstname." column is not exist in ".$request->usertable." table <br>";
                           } 
                       }
                       if(strlen(trim($request->lastname)) > 0)
                       {
                           $isColExist = Schema::connection("mysql_source")->hasColumn($request->usertable,$request->lastname);
                           if(empty($isColExist))
                           {
                              $errors_message .= $request->lastname." column is not exist in ".$request->usertable." table <br>";
                           } 
                       }
                       if(strlen(trim($request->username)) > 0)
                       {
                           $isColExist = Schema::connection("mysql_source")->hasColumn($request->usertable,$request->username);
                           if(empty($isColExist))
                           {
                              $errors_message .= $request->username." column is not exist in ".$request->usertable." table <br>";
                           } 
                       }
                       if(strlen(trim($request->password)) > 0)
                       {
                           $isColExist = Schema::connection("mysql_source")->hasColumn($request->usertable,$request->password);
                           if(empty($isColExist))
                           {
                              $errors_message .= $request->password." column is not exist in ".$request->usertable." table <br>";
                           } 
                       }
                       if(strlen(trim($request->extracolumn1)) > 0)
                       {
                           $isColExist = Schema::connection("mysql_source")->hasColumn($request->usertable,$request->extracolumn1);
                           if(empty($isColExist))
                           {
                              $errors_message .= $request->extracolumn1." column is not exist in ".$request->usertable." table <br>";
                           } 
                       }
                       if(strlen(trim($request->extracolumn2)) > 0)
                       {
                           $isColExist = Schema::connection("mysql_source")->hasColumn($request->usertable,$request->extracolumn2);
                           if(empty($isColExist))
                           {
                              $errors_message .= $request->extracolumn2." column is not exist in ".$request->usertable." table <br>";
                           } 
                       }
                    }else{
                       $errors_message .= $request->usertable." table is not exist in database <br>";
                    }
                    if(DB::connection('mysql_source')->select('SHOW TABLES LIKE "'.$request->substable.'"'))
                    {
                       if(strlen(trim($request->subscriptionid)) > 0)
                       {
                           $isColExist = Schema::connection("mysql_source")->hasColumn($request->substable,$request->subscriptionid);
                           if(empty($isColExist))
                           {
                               $errors_message .= $request->subscriptionid." column is not exist in ".$request->substable." table <br>";
                           } 
                       }
                       if(strlen(trim($request->plantype)) > 0)
                       {
                           $isColExist = Schema::connection("mysql_source")->hasColumn($request->substable,$request->plantype);
                           if(empty($isColExist))
                           {
                              $errors_message .= $request->subscriptionid." column is not exist in ".$request->substable." table <br>";
                           } 
                       }
                       if(strlen(trim($request->userid)) > 0)
                       {
                           $isColExist = Schema::connection("mysql_source")->hasColumn($request->substable,$request->userid);
                           if(empty($isColExist))
                           {
                              $errors_message .= $request->userid." column is not exist in ".$request->substable." table <br>";
                           } 
                       }
                       if(strlen(trim($request->expiredate)) > 0)
                       {
                           $isColExist = Schema::connection("mysql_source")->hasColumn($request->substable,$request->expiredate);
                           if(empty($isColExist))
                           {
                              $errors_message .= $request->expiredate." column is not exist in ".$request->substable." table <br>";
                           } 
                       }
                    }else{
                        $errors_message .= $request->substable." table is not exist in database <br>";
                    }
                } catch (\Exception $e) {
                        $errors_message .= "Database not connected please check host,username,password and database name <br>";
                }
                if($request->db_host == "")
                {
                  $errors_message .= "Please enter database host name <br>";
                }
                if($request->db_user == "")
                {
                  $errors_message .= "Please enter database username <br>";
                }
                if($request->db_pass == "")
                {
                  $errors_message .= "Please enter database password <br>";
                }
                if($request->db_database == "")
                {
                  $errors_message .= "Please enter database name <br>";
                }
                 if($request->usertable == "")
                {
                  $errors_message .= "Please enter User Table Name <br>";
                }
                 if($request->substable == "")
                {
                  $errors_message .= "Please enter Subscription Table Name <br>";
                }
                if($request->firstname == "")
                {
                  $errors_message .= "Please enter First Name <br>";
                }
                 if($request->username == "")
                {
                  $errors_message .= "Please enter Email <br>";
                }
                 if($request->password == "")
                {
                  $errors_message .= "Please enter Password <br>";
                }
                 if($request->userid == "")
                {
                  $errors_message .= "Please enter User ID<br>";
                }
                 if($request->subscriptionid == "")
                {
                  $errors_message .= "Please enter Package ID <br>";
                }
                if($request->expiredate == "")
                {
                  $errors_message .= "Please enter Expiration Date <br>";
                }
            }else if($request->connection_type == 2)
            { 
                if($request->regapi == "")
                {
                  $errors_message .= "Please enter Register Endpoint <br>";
                }
                if($request->usercancel == "")
                {
                  $errors_message .= "Please enter Deactive User Endpoint <br>";
                }
                if($request->subsapi == "")
                {
                  $errors_message .= "Please enter Subscription Endpoint <br>";
                }
                if($request->cancelapi == "")
                {
                  $errors_message .= "Please enter Cancel Subscription Endpoint <br>";
                }
                if($request->firstname == "")
                {
                  $errors_message .= "Please enter First Name <br>";
                }
                 if($request->username == "")
                {
                  $errors_message .= "Please enter Email <br>";
                }
                 if($request->password == "")
                {
                  $errors_message .= "Please enter Password <br>";
                }
                 if($request->userid == "")
                {
                  $errors_message .= "Please enter User ID<br>";
                }
                 if($request->subscriptionid == "")
                {
                  $errors_message .= "Please enter Package ID <br>";
                }
                if($request->expiredate == "")
                {
                  $errors_message .= "Please enter Expiration Date <br>";
                }
            }else if($request->connection_type == 3)
            {
                if($request->affiliate_url == "")
                {
                  $errors_message .= "Please enter Affiliate URL <br>";
                }
               
            }
            if(strlen($errors_message) > 0)
            {
                return back()->withInput($request->input())->with('notify_error',$errors_message);
            }
        $user = Auth::user();
        $request->validated();
        $allowedfileExtension=['jpeg','jpg','png','JPG','PNG','SVG','svg'];
        /*if(($request->hasFile('product_image')) || $request->productId)
        {*/  
            if($request->productId)
            {
                if($request->hasFile('product_image'))
                { 
                    if(!in_array($request->file('product_image')->getClientOriginalExtension(),$allowedfileExtension))
                    {
                        $message_bag->add('product_images', 'Product image is required and png,jpg, jpeg are accepted');
                        return back()->withInput($request->input())->withErrors($message_bag);
                    }
                }
                $products = products::find($request->productId);
            }
            else
            $products = new products;           
            $products->user_id = $user->id;
            $products->category_id = $request->category;     
            $products->name = $request->name;     
            $products->slug = str_slug($request->slug);     
            $products->product_by = $request->product_by;     
            $products->price = $request->price;          
            $products->dev_phone = $request->dev_phone;     
            $products->dev_email = $request->dev_email;     
            $products->dev_website = $request->dev_website;     
            $products->video_link = $request->video_link;     
            $products->functionality = $request->functionality;     
            $products->features = $request->features;     
            $products->description = $request->description;     
            $products->whoshould = $request->whoshould;     
            $products->pricing_information = $request->pricing_information;
            $products->connection_type  = $request->connection_type;
            $products->db_host = $request->db_host;
            $products->db_user = $request->db_user;
            $products->db_pass = $request->db_pass;
            $products->db_database = $request->db_database;
            $products->usertable  = $request->usertable;
            $products->substable  = $request->substable;
            $products->regapi  = $request->regapi;
            $products->usercancel  = $request->usercancel;
            $products->subsapi  = $request->subsapi;
            $products->cancelapi  = $request->cancelapi;
            $products->firstname  = $request->firstname;
            $products->lastname  = $request->lastname;
            $products->username  = $request->username;
            $products->password  = $request->password;
            $products->expiredate  = $request->expiredate;
            $products->userid  = $request->userid;
            $products->subscriptionid  = $request->subscriptionid;
            $products->plantype  = $request->plantype;
            $products->extracolumn1  = $request->extracolumn1;
            $products->extracolumn2  = $request->extracolumn2;
            $products->affiliate_url  = $request->affiliate_url;

            $products->is_active = 0;
            if($products->save())
            {
                /* product images*/
                if($request->hasFile('product_image'))
                {
                    //dd($request->all());
                    $imagetable = imagetable::where(['table_name'=>'products','type'=>1,'ref_id'=>$products->id])->first();
                    if(!$imagetable)
                    {
                        $imagetable = new imagetable;
                    }
                    else
                    {
                        $directories = explode('/', $imagetable->img_path);
                        Storage::disk('public')->delete($imagetable->img_path);
                        Storage::disk('public')->deleteDirectory($directories[(count($directories)-2)]);
                        try {
                            app("App\Http\Controllers\Adminiy\DNE\CoreDeletesController")->deleteResizedImage($imagetable->id);
                        }catch(\Exception $ex){
                            //dd($ex);
                        }
                        
                    }
                    $imagetable->table_name = 'products';
                    $imagetable->ref_id = $products->id;
                    $imagetable->type = 1;
                    $path = $request->file('product_image')->store('Uploads/products/'.md5(Str::random(20)), 'public');
                    $imagetable->img_path = $path;
                    $imagetable->save();
                }
                /* multi optional images */
                if(count($request->file('optional_images')) > 0 )
                {
                    //imagetable::where(['table_name'=>'products','type'=>2,'ref_id'=>$products->id])->delete();
                    $photos = $request->file('optional_images');
                    foreach($photos as $photo)
                    {
                        if(in_array($photo->getClientOriginalExtension(),$allowedfileExtension))
                        {
                            $imagetable = new imagetable;
                            $imagetable->table_name = 'products';
                            $imagetable->ref_id = $products->id;
                            $imagetable->type = 2;
                            $path = $photo->store('Uploads/products/'.md5(Str::random(20)), 'public');
                            $imagetable->img_path = $path;
                            $imagetable->save();
                        }
                    }
                }
            }
        /*}
        else
        {
            $message_bag->add('product_images', 'Product image is required and png,jpg, jpeg are accepted');
            return back()->withInput($request->input())->withErrors($message_bag);
        }*/

        return back()->with('notify_message','successfully Saved');
    }

    public function productDelete($id){
        if(!empty($id))
        {
            $user = Auth::user();
            $product = products::where(['id'=>$id,'user_id'=>$user->id])->first();
            //dd($product);
            if($product)
            {
                products::where(['id'=>$id,'user_id'=>$user->id])->update(['is_deleted'=>1,'is_active'=>0]);
            }
            return back()->with('notify_error',"We can't found your product");
        }
        return back()->with('notify_error','Something went wrong...!');
    }
    public function categorySubmit(yTablecategoriesRequest $request, MessageBag $message_bag)
    {
        $request->validated();
        $user = Auth::user();              
        $categories = new categories;           
        $categories->category_type = $request->category_type;    
        $categories->category_name = $request->category_name;     
        $categories->category_slug = str_slug($request->category_slug);     
        $categories->is_active = 0;
        $categories->save();

        return back()->with('notify_message','successfully Saved');
    }

    public function packageSubmit(yTablepackageRequest $request, MessageBag $message_bag)
    {
        //dd($request->all());
        $user = Auth::user();       
        $request->validated();
        Stripe::setApiKey(env('STRIPE_SECRET'));
        if($request->packageId)
          {
              $package = package::find($request->packageId);
              if($request->stripe_plan_id != "")
              {
                if($package->name != $request->name || $package->price != $request->price || $package->months != $request->months)
                {
                  $plan = \Stripe\Plan::retrieve(
                    $request->stripe_plan_id
                  );
                  $plan->delete();
                //plan updation email
                  $pack_users = Helper::fireQuery("SELECT users.name,users.first_name,users.last_name,users.email from orders_products,orders,users  where users.id = orders.user_id and orders_products.order_id = orders.order_id and orders_products.package_id =".$package->id." group by users.email");
                  foreach ($pack_users as $key => $value) {
                     Mail::send('mail/package_change', ['userdetail' => $value,'pachage_data' => $request], function ($sup) use ($request,$value){
                              $sup->from('info@sellersoftwares.com');
                              $sup->to('fahad_solangi@outlook.com')->subject('Seller Softwares Package changes by supplier');
                    });  
                  }
                  $StripPackAmnt = $request->price*100;
                  $Strplan =  \Stripe\Plan::create([
                          'amount' => $StripPackAmnt,
                          'currency' => 'usd',
                          'interval' => 'month',
                          'interval_count' => $request->months,
                          'product' => ['name' => $request->name],
                  ]);
                  if($Strplan->active == 'true')
                  {
                      $request->stripe_plan_id = $Strplan->id;
                  }
                }
              }else{
                $StripPackAmnt = $request->price*100;
                $Strplan =  \Stripe\Plan::create([
                        'amount' => $StripPackAmnt,
                        'currency' => 'usd',
                        'interval' => 'month',
                        'interval_count' => $request->months,
                        'product' => ['name' => $request->name],
                ]);
                if($Strplan->active == 'true')
                {
                    $request->stripe_plan_id = $Strplan->id;
                }
              }  
            }
            else
                $package = new package;               
                $package->user_id = $user->id;   
                $package->product_id = $request->product;     
                $package->name = $request->name;     
                $package->slug = str_slug($request->slug);     
                $package->price = $request->price;          
                $package->package_id = $request->package_id;          
                $package->stripe_plan_id = $request->stripe_plan_id;          
                $package->months = $request->months;          
                $package->free_trail = $request->free_trail;          
                $package->free_days = $request->free_days;          
                $package->otp = $request->otp;          
                $package->detail = $request->detail;
                $package->package_type = $request->package_type;
                $package->save();
                $package->is_active = 0;
            
   
        return back()->with('notify_message','successfully Saved');
    }
    public function packageDelete($id){
        if(!empty($id))
        {
            $user = Auth::user();
            $package = package::where(['id'=>$id,'user_id'=>$user->id])->first();
            if($package)
            {
            //dd($package);
                package::where(['id'=>$id,'user_id'=>$user->id])->update(['is_deleted'=>1,'is_active'=>0]);
            }
            return back()->with('notify_error',"We can't found your package");
        }
        return back()->with('notify_error','Something went wrong...!');
    }
    public function sizeSubmit(yTablesizesRequest $request, MessageBag $message_bag)
    {
        $request->validated();
        $user = Auth::user();              
        $sizes = new sizes;             
        $sizes->name = $request->name;        
        $sizes->is_active = 1;
        $sizes->save();

        return back()->with('notify_message','successfully Saved');
    }
    public function colorSubmit(yTablecolorsRequest $request, MessageBag $message_bag)
    {
        $request->validated();
        $user = Auth::user();              
        $colors = new colors;             
        $colors->name = $request->name;        
        $colors->is_active = 1;
        $colors->save();

        return back()->with('notify_message','successfully Saved');
    }
    public function categoryDelete($id){
        if(!empty($id))
        {
            $user = Auth::user();
            $category = categories::where(['category_slug'=>$id,'user_id'=>$user->id])->first();
            if($category)
            {
                categories::where(['id'=>$id,'user_id'=>$user->id])->update(['is_deleted'=>1]);
            }
            return back()->with('notify_error',"We can't found your category");
        }
        return back()->with('notify_error','Something went wrong...!');
    }
    public function imageDelete(Request $request)
    {
        $user = Auth::user();
        if(Helper::OneColData('products','id','id='.$request->productid.' and user_id='.$user->id))
        {
            imagetable::find($request->imgid)->delete();
            return $this->echoSuccess('image deleted');
        }
        return $this->echoErrors('Something went wrong');
    }

    public function logout(){
		Session::forget('cart');
        Auth::logout();
        return redirect()->route('home')->with('notify_success','Logged out successfully');
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
}
