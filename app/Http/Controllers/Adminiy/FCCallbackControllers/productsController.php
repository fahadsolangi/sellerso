<?php
namespace App\Http\Controllers\Adminiy\FCCallbackControllers;
use App\Http\Controllers\Controller;
use Helper;
use App\Model\products;
use App\Model\user;
use App\Model\product_colors;
use App\Model\product_sizes;
use App\Model\product_materials;
use App\Model\related_products;
use DB;
use Mail;
class productsController extends Controller
{
    public function __construct()
    {
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('v',config('app.vadminiy'));
        View()->share('favicon',$favicon);
    }
    public function beforeInsert($inputs){
    	//echo  implode(',',$inputs['product_patterntype']);
    	//dd($inputs);

    	$product_color = isset($inputs['product_color']) ? implode(',',$inputs['product_color']) : '';
		$product_size = isset($inputs['product_size']) ? implode(',',$inputs['product_size']) : '';
		$related_products = isset($inputs['related_products']) ? implode(',',$inputs['related_products']) : '';
		/*$product_length = isset($inputs['product_length']) ? implode(',',$inputs['product_length']) : '';
		$product_patterntype = isset($inputs['product_patterntype']) ? implode(',',$inputs['product_patterntype']) : '';
		$product_decoration = isset($inputs['product_decoration']) ? implode(',',$inputs['product_decoration']) : '';
		$product_style = isset($inputs['product_style']) ? implode(',',$inputs['product_style']) : '';
		$product_silhouette = isset($inputs['product_silhouette']) ? implode(',',$inputs['product_silhouette']) : '';
		$product_season = isset($inputs['product_season']) ? implode(',',$inputs['product_season']) : '';
		$product_occasion = isset($inputs['product_occasion']) ? implode(',',$inputs['product_occasion']) : '';
		$product_material = isset($inputs['product_material']) ? implode(',',$inputs['product_material']) : '';
		$product_sleeve = isset($inputs['product_sleeve']) ? implode(',',$inputs['product_sleeve']) : '';*/
		unset($inputs['product_color']);
		unset($inputs['product_size']);
		unset($inputs['related_products']);
		/*unset($inputs['product_length']);
		unset($inputs['product_patterntype']);
		unset($inputs['product_decoration']);
		unset($inputs['product_style']);
		unset($inputs['product_silhouette']);
		unset($inputs['product_season']);
		unset($inputs['product_occasion']);
		unset($inputs['product_material']);
		unset($inputs['product_sleeve']);*/
		$inputs['product_color']=$product_color;
		$inputs['product_size']=$product_size;
		$inputs['related_products']=$related_products;
		/*$inputs['product_length']=$product_length;
		$inputs['product_patterntype']=$product_patterntype;
		$inputs['product_decoration']=$product_decoration;
		$inputs['product_style']=$product_style;
		$inputs['product_silhouette']=$product_silhouette;
		$inputs['product_season']=$product_season;
		$inputs['product_occasion']=$product_occasion;
		$inputs['product_material']=$product_material;
		$inputs['product_sleeve']=$product_sleeve;*/
		//dd($inputs);
		return $inputs;

	}
	public function afterInsert($model){
		//dd($model);
		/* product colors*/
		if(strpos($model->product_color, ',') !== false)
		{
			DB::DELETE("DELETE FROM product_colors where product_id=".$model->id);
			$product_color = explode(',',$model->product_color);
			
			foreach($product_color as $proCol){
				try{
				$product_col = new product_colors;
				$product_col->product_id = $model->id;
				$product_col->color_id = $proCol;
				$product_col->save();
				}
			    catch(\Exception $e){
			       // do task when error
			       echo $e->getMessage();   // insert query
			    }
			}
		}
		/* product Sizes*/
		if(strpos($model->product_size, ',') !== false)
		{
			DB::DELETE("DELETE FROM product_sizes where product_id=".$model->id);
			$product_size = explode(',',$model->product_size);
			foreach($product_size as $proSiz){
				$product_sizes = new product_sizes;
				$product_sizes->product_id = $model->id;
				$product_sizes->size_id = $proSiz;
				$product_sizes->save();
			}
		}
		/* Related Products*/
		DB::DELETE("DELETE FROM related_products where product_id=".$model->id);
		$related_pro = explode(',',$model->related_products);
		foreach($related_pro as $rpro){
			
			$related_products = new related_products;
			$related_products->product_id = $model->id;
			$related_products->related_product_id = $rpro;
			$related_products->save();
		}	
		/* product Lengths*/
		/*if(strpos($model->product_length, ',') !== false)
		{
			DB::DELETE("DELETE FROM product_lengths where product_length=".$model->id);
			$product_length = explode(',',$model->product_length);
			foreach($product_length as $proLen){
				$product_lengths = new product_lengths;
				$product_lengths->product_id = $model->id;
				$product_lengths->length_id = $proLen;
				$product_lengths->save();
			}
		}*/
		/* product Heights*/
		/*if(strpos($model->product_patterntype, ',') !== false)
		{
			DB::DELETE("DELETE FROM product_patterntypes where product_id=".$model->id);
			$product_patterntype = explode(',',$model->product_patterntype);
			foreach($product_patterntype as $proPatt){
				$product_patterntypes = new product_patterntypes;
				$product_patterntypes->product_id = $model->id;
				$product_patterntypes->height_id = $proPatt;
				$product_patterntypes->save();
			}
		}*/
		/* product Decorations*/
		/*if(strpos($model->product_decoration, ',') !== false)
		{
			DB::DELETE("DELETE FROM product_decorations where product_id=".$model->id);
			$product_decoration = explode(',',$model->product_decoration);
			foreach($product_decoration as $proDec){
				$product_decorations = new product_decorations;
				$product_decorations->product_id = $model->id;
				$product_decorations->decoration_id = $proDec;
				$product_decorations->save();
			}
		}*/
		/* product Materials*/
		/*if(strpos($model->product_material, ',') !== false)
		{
			DB::DELETE("DELETE FROM product_materials where product_id=".$model->id);
			$product_material = explode(',',$model->product_material);
			foreach($product_material as $proMat){
				$product_materials = new product_materials;
				$product_materials->product_id = $model->id;
				$product_materials->material_id = $proMat;
				$product_materials->save();
			}
		}*/
		
	}
	/*
	public function sendTeamApprovalEmail($data = array()) {
		
			Mail::send('mailingtemplates.team-approvals',['data' => $data], function ($message) use ($data) {
	
				$message->from($data['fromemail'],"Oklahoma");
				$message->to($data['toemail']);
				$message->subject($data['subject']);
				
				
			});
		
	}*/
	
	
	
	
}