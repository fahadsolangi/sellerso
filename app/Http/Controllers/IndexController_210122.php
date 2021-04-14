<?php
namespace App\Http\Controllers;
use Helper;
use View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\yTableinquiryRequest;
use App\Http\Requests\yTablecareerRequest;
use App\Model\inquiry;
use App\Model\rating;
use App\Http\Requests\yTableratingRequest;
use Illuminate\Support\Facades\Validator;
use Auth;
class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
    public function index()
    {
        // $banners = Helper::fireQuery("select banner_management.*
        //     ,img_1.img_path as img_1_img
        //     ,img_2.img_path as img_2_img from banner_management 
        //     left join imagetable as img_1 on img_1.ref_id = banner_management.id and img_1.type=1 and img_1.table_name='banner_management'
        //     left join imagetable as img_2 on img_2.ref_id = banner_management.id and img_2.type=1 and img_2.table_name='banner_management_thumb'
        //     where banner_management.is_active=1 and banner_management.is_deleted=0");
        // $deals = Helper::getImageWithData('products','id','',"is_active=1 and is_deleted=0 and product_type='deals'",0,'order by id asc');
        $banner = Helper::getImageWithData('banner','id','',"is_active=1",0,'order by id asc');
        //dd($banner);
        $category = Helper::getImageWithData('category','id','',"is_active=1",0,'order by id asc');
        //dd($banner);
        $popuplarProduct = Helper::getImageWithData('products','id','',"is_active=1 and is_featured=1",0,'order by id asc');
        $trailProduct = Helper::getImageWithData('products','id','',"is_active=1 and is_trail=1",0,'order by id asc');
        $allproducts = Helper::getImageWithData('products','id','',"is_active=1",0,'order by id asc');
        foreach ($allproducts as $key => $value) {
            $ProductCategory[$value->category_id][] = $value;
        }
        // dd($trailProduct);
        //dd($popuplarProduct);
        return view('welcome')->with('title',Helper::returnFlag(123))
        ->with('homeMenu',true)->with(compact('banner','category','popuplarProduct','trailProduct','ProductCategory'));
        //->with(compact('banners','deals'))
    }
    public function aboutus()
    {
        $about = Helper::returnRow('imagetable',"table_name = 'aboutbanner'");     
        return view('aboutus')->with('title','About Us')->with('aboutusmenu',true)->with(compact('about'));
    }
    public function blog()
    {
        $blogbanner = Helper::returnRow('imagetable',"table_name = 'blogbanner'");  
        $blog = Helper::getImageWithData('blog','id','',"is_active=1",0,'order by id asc');   
        //dd($blog); 
        return view('blog')->with('title','Blogs')->with('blogmenu',true)->with(compact('blogbanner','blog'));
    }
    public function product($slug='')
    {
        //$product = Helper::getImageWithData('products','id','',"is_active=1",0,'order by id asc');  
        // dd($product);
        $where=" where p.is_active=1 and p.is_deleted=0 ";
        $where .= !empty($slug) ? ' AND sc.slug = "'.$slug.'"' : '';   
        $where .= (isset($_GET['search']) && !empty($_GET['search'])) ? ' AND p.name like "'.$_GET['search'].'%"' : '';
        $where .= !empty($_GET['category']) ? ' AND sc.slug = "'.$_GET['category'].'"' : '';  
        $product = Helper::fireQuery('Select sc.slug,p.*,i.img_path,i.id as img_id from products p left join imagetable i on i.ref_id = p.id and i.table_name="products" left join category sc on sc.id = p.category_id'.$where.'group by p.id'  ); 
        $category = Helper::getImageWithData('category','id','',"is_active=1",0,'order by id asc'); 
        $program_support = Helper::getImageWithData('program_support','id','',"is_active=1",0,'order by id asc'); 
        $language_support = Helper::getImageWithData('language_support','id','',"is_active=1",0,'order by id asc'); 
        return view('product')->with('title','Product Listing')->with('productmenu',true)->with(compact('product','category','program_support','language_support'));
    }
    public function productfilters(Request $request)
    {
        //$product = Helper::getImageWithData('products','id','',"is_active=1",0,'order by id asc');  
        // dd($product);
        $pids=0;
        $cate_whr = "";
        if(isset($request->category) && count($request->category) > 0)
        {
            $category_ids = implode(",",$request->category);
            $cate_whr = "AND p.category_id IN ($category_ids)";
            
        }
        if(isset($request->language_support) && count($request->language_support) > 0)
        {

        }
        if(isset($request->program_support) && count($request->program_support) > 0)
        {

        }
        if(isset($request->country) && count($request->country) > 0)
        {

        }
        if(isset($request->pricing_type) && count($request->pricing_type) > 0)
        {
            //free trail
            if(isset($request->pricing_type[1]))
            {
                $pricePackage = Helper::fireQuery('Select group_concat(product_id) as ids from package where is_active=1 and free_trail = 1 group by free_trail'); 
                if($pricePackage[0]->ids != "")
                    $pids .= ",".$pricePackage[0]->ids;
            }   
            //subscription
            if(isset($request->pricing_type[2]))
            {
                $pricePackage = Helper::fireQuery('Select group_concat(product_id) as ids from package where is_active=1 and otp = 0 group by otp'); 
                if($pricePackage[0]->ids != "")
                    $pids .= ",".$pricePackage[0]->ids;
            }
            //OTP
            if(isset($request->pricing_type[3]))
            {
                $pricePackage = Helper::fireQuery('Select group_concat(product_id) as ids from package where is_active=1 and otp = 0 group by otp'); 
                if($pricePackage[0]->ids != "")
                    $pids .= ",".$pricePackage[0]->ids;
            }

        }
        if(isset($request->reviewrate) && count($request->reviewrate) > 0)
        {

        }
        $where = "where p.id IN ($pids) $cate_whr";
        $product = Helper::fireQuery('Select sc.slug,p.*,i.img_path,i.id as img_id from products p left join imagetable i on i.ref_id = p.id and i.table_name="products" left join category sc on sc.id = p.category_id '.$where.' group by p.id');  
        $category = Helper::getImageWithData('category','id','',"is_active=1",0,'order by id asc'); 
        $program_support = Helper::getImageWithData('program_support','id','',"is_active=1",0,'order by id asc'); 
        $language_support = Helper::getImageWithData('language_support','id','',"is_active=1",0,'order by id asc'); 
        
        return view('product')->with('title','Product Listing')->with('productmenu',true)->with(compact('product','category','program_support','language_support','request'));
    }
    public function productdetail($slug='')
    {
        $users = Auth::user();
        $productd = Helper::returnRow('imagetable',"table_name = 'productbanner'");
        $productDetail = Helper::firstRow('Select p.*,i.id as img_id, i.img_path  from products p left join imagetable i on i.ref_id = p.id and i.table_name="products" where p.slug="'.$slug.'"');
        // dd($productDetail);
        // $all_images = Helper::returnDataSet('imagetable',"table_name = 'products' and type = 2 and ref_id =".$productDetail->id);
        // $related_product = Helper::fireQuery('Select p.*,i.img_path,i.id as img_id from products p left join imagetable i on i.ref_id = p.id and i.table_name="products" and type = 1 where p.category_id="'.$productDetail->category_id.'" limit 4'); 
        $pricePackage = Helper::fireQuery('Select * from package where product_id="'.$productDetail->id.'" and is_active=1  ');
        //dd($pricePackage);
        $all_images = Helper::returnDataSet('imagetable',"table_name = 'products' and type = 2 and ref_id =".$productDetail->id);
        //dd($all_images);
        $rating = Helper::fireQuery('Select * from rating where product_id="'.$productDetail->id.'" and is_active=1  ');
        return view('productdetail')->with('title','Product Detail')->with(compact('productd','productDetail','rating','pricePackage','all_images','users'));
    }
    public function supplierLogin()
    {
        if(isset($_GET['verified']))
        {
            $verified_tok = $_GET['verified'];
            $pricePackage = Helper::fireQuery('Select * from users where verified="'.$verified_tok.'" and   is_active=0');
            if(count($pricePackage) > 0)
            {
                $pricePackage = Helper::fireQuery('Update users set is_active = 1,verified="" where verified="'.$verified_tok.'"');
                return view('supplier')->with('title','supplier Login')->with('notify_success',"Email verified successfully");
            }
        }
        return view('supplier')->with('title','supplier Login');
    }
    public function privacy()
    {
        $privacy = Helper::returnRow('imagetable',"table_name = 'privacybanner'");     
        return view('privacy')->with('title','Privacy Policy')->with('privacymenu',true)->with(compact('privacy'));
    }
    public function terms()
    {
        $terms = Helper::returnRow('imagetable',"table_name = 'termsbanner'");     
        return view('terms')->with('title','Terms & Conditions')->with('termsmenu',true)->with(compact('terms'));
    }
    public function howitworks()
    {
        $howitworks = Helper::returnRow('imagetable',"table_name = 'howitworksbanner'");     
        return view('howitworks')->with('title','How It Works')->with('howitworksmenu',true)->with(compact('howitworks'));
    }
    public function freetrail()
    {
        /*$privacy = Helper::returnRow('imagetable',"table_name = 'privacybanner'");     
        return view('freetrail')->with('title','Free Trail')->with('privacymenu',true)->with(compact('privacy'));*/
        //$where=" where p.is_active=1 and p.is_deleted=0 ";
        //$where .= !empty($slug) ? ' AND sc.slug = "'.$slug.'"' : '';   
        //$where .= (isset($_GET['search']) && !empty($_GET['search'])) ? ' AND p.name like "'.$_GET['search'].'%"' : '';
        //$where .= !empty($_GET['category']) ? ' AND sc.slug = "'.$_GET['category'].'"' : ''; 
        $pricePackage = Helper::fireQuery('Select group_concat(product_id) as ids from package where is_active=1 and free_trail = 1 group by free_trail'); 
        if($pricePackage[0]->ids != "")
            $where = "where p.id IN (".$pricePackage[0]->ids.")";
        
        $product = Helper::fireQuery('Select sc.slug,p.*,i.img_path,i.id as img_id from products p left join imagetable i on i.ref_id = p.id and i.table_name="products" left join category sc on sc.id = p.category_id '.$where.'group by p.id'  ); 
        $category = Helper::getImageWithData('category','id','',"is_active=1",0,'order by id asc'); 
        return view('freetrail')->with('title','Free Trail Product Listing')->with('productmenu',true)->with(compact('product','category'));
    }
    public function subscription()
    {
        $pricePackage = Helper::fireQuery('Select group_concat(product_id) as ids from package where is_active=1 and otp = 0 group by otp'); 
        if($pricePackage[0]->ids != "")
            $where = "where p.id IN (".$pricePackage[0]->ids.")";
        
        $product = Helper::fireQuery('Select sc.slug,p.*,i.img_path,i.id as img_id from products p left join imagetable i on i.ref_id = p.id and i.table_name="products" left join category sc on sc.id = p.category_id '.$where.'group by p.id'  ); 
        $category = Helper::getImageWithData('category','id','',"is_active=1",0,'order by id asc'); 
        return view('subscription')->with('title','Subscription Product Listing')->with('productmenu',true)->with(compact('product','category'));/*
        $privacy = Helper::returnRow('imagetable',"table_name = 'privacybanner'");     
        return view('subscription')->with('title','Subscription')->with('privacymenu',true)->with(compact('privacy'));*/
    }
    public function otp()
    {
        $pricePackage = Helper::fireQuery('Select group_concat(product_id) as ids from package where is_active=1 and otp = 1 group by otp'); 
        if($pricePackage[0]->ids != "")
            $where = "where p.id IN (".$pricePackage[0]->ids.")";
        
        $product = Helper::fireQuery('Select sc.slug,p.*,i.img_path,i.id as img_id from products p left join imagetable i on i.ref_id = p.id and i.table_name="products" left join category sc on sc.id = p.category_id '.$where.'group by p.id'  ); 
        $category = Helper::getImageWithData('category','id','',"is_active=1",0,'order by id asc'); 
        return view('otp')->with('title','One Time Purchase Product Listing')->with('productmenu',true)->with(compact('product','category'));/*
        /*$privacy = Helper::returnRow('imagetable',"table_name = 'privacybanner'");     
        return view('otp')->with('title','One Time Purchase')->with('privacymenu',true)->with(compact('privacy'));*/
    }
    public function faq()
    {
        $faq = Helper::getImageWithData("faq","id","","is_active=1 and is_deleted=0");
        //dd($faq);
        $privacy = Helper::returnRow('imagetable',"table_name = 'privacybanner'");     
        return view('faq')->with('title','FAQ')->with('privacymenu',true)->with(compact('faq'));
    }
    public function howtoorder()
    {
        $privacy = Helper::returnRow('imagetable',"table_name = 'privacybanner'");     
        return view('howtoorder')->with('title','How to Order')->with('privacymenu',true)->with(compact('privacy'));
    }
    public function listapp()
    {
        $privacy = Helper::returnRow('imagetable',"table_name = 'privacybanner'");     
        return view('listapp')->with('title','List Your APP')->with('privacymenu',true)->with(compact('privacy'));
    }
    public function contactus()
    {
        return view('contactus')->with('title','Contact us')->with('contactmenu',true);
    }
    public function getStates(Request $request){
        //echo json_encode(array("states"=>$request->country_id)); exit;
        $states = DB::table('states')->where('country_id', $request->country_id)->get();
        echo json_encode(array("states"=> $states));
    }
    public function getCities(Request $request){
        $cities = DB::table('cities')->where('state_id', $request->state_id)->get();
        echo json_encode(array("cities"=> $cities));
    }
    public function ratingSubmit(yTableratingRequest $request){
        $validator = $request->validated();
        $rating = new rating;
        $rating->product_id = $request->product_id;
        $rating->rating_name = $request->rating_name;
        $rating->rating_email = $request->rating_email;
        $rating->rating_star = $request->rating_star;
        $rating->rating_content = $request->rating_content;        
        $rating->user_id = $request->user_id;        
        $rating->is_active = 1;        
        $rating->save();
        $this->echoSuccess("Rating Saved");
    }
    public function contactusSubmit(Request $request){
        // dd($request);
        //$validator = $request->validated();
        $inquiry = new inquiry;
        $inquiry->inquiries_name = $request->inquiries_name;
        $inquiry->inquiries_lname = $request->inquiries_lname;
        $inquiry->inquiries_email = $request->inquiries_email;
        $inquiry->extra_content = $request->extra_content;
        $inquiry->save();
        return back()->with('notify_message','successfully Saved');
    }
}
