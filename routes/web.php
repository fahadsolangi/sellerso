<?php
Route::get('/', 'IndexController@index')->name('home');
Route::get('/about-us', 'IndexController@aboutus')->name('aboutus');
Route::get('/blog', 'IndexController@blog')->name('blog');
Route::get('/product-listing/{slug?}', 'IndexController@product')->name('product');
Route::post('/product-listing-filters', 'IndexController@productfilters')->name('productfilters');
Route::get('/product-detail/{slug?}', 'IndexController@productdetail')->name('productdetail');
Route::get('/privacy-policy', 'IndexController@privacy')->name('privacy');
Route::get('/list-your-app', 'IndexController@listapp')->name('listapp');
Route::get('/faq', 'IndexController@faq')->name('faq');
Route::get('/free-trail', 'IndexController@freetrail')->name('freetrail');
Route::get('/subscription', 'IndexController@subscription')->name('subscription');
Route::get('/one-time-purchase', 'IndexController@otp')->name('otp');
Route::get('/how-to-order', 'IndexController@howtoorder')->name('howtoorder');
Route::get('/terms-and-conditions', 'IndexController@terms')->name('terms');
Route::get('/how-it-works', 'IndexController@howitworks')->name('howitworks');
Route::get('/contact-us', 'IndexController@contactus')->name('contactus');
Route::get('/supplier-login', 'IndexController@supplierLogin')->name('supplier_login');
Route::post('/contact-us-submit', 'IndexController@contactusSubmit')->name('contactusSubmit');
Route::post('/Auth/resetEmail', 'Auth\RegisterController@resetEmail')->name('Auth.resetEmail');
Route::post('/Auth/resetpassword', 'Auth\RegisterController@resetpassword')->name('Auth.resetpassword');
Route::post('/rating-submit', 'IndexController@ratingSubmit')->name('ratingSubmit');
Auth::routes();
Route::group(['middleware' => ['guest'],'prefix'=>'adminiy','namespace'=>'Adminiy'], function () {
Route::get('/login', 'LoginController@index')->name('adminiy.login');
Route::post('/performLogin', 'LoginController@performLogin')->name('adminiy.performLogin')->middleware('throttle:4,1');
});
Route::group(['middleware' => ['adminiy'],'prefix'=>'adminiy','namespace'=>'Adminiy'], function () {
Route::get('/login-by-id/{id}','FCCallbackControllers\usersController@loginbyid')->name('adminiy.customer.loginbyid');
/*DO NOT EDIT*/
Route::get('/',function(){
	return redirect('/adminiy/panel');
});
Route::get('/panel', 'IndexController@panel')->name('adminiy.panel');
/*change password admin*/
Route::post('/change-password',function(){
	if($_POST['change_password']==$_POST['change_confirm_password']){
		$adminiy=App\Model\Adminiy::find(adminiy()->id);
		$adminiy->password = Hash::make($_POST['change_password']);
		$adminiy->save();
		return back()->with('notify_success','Password Updated');
	}
	return back()->with('notify_error','Password does not match');
})->name('adminiy.changepassword');
/*change password admin end*/
/*create listing start*/
Route::get('/listing/{jsfile}', 'DNE\ListingController@ylisting')->name('adminiy.ylisting');
/*create listing end*/
/*Fetching Multiple Images on screen*/
Route::post('/multiimages-get', 'DNE\MultiImageCrudController@get')->name('adminiy.multiimages.fetch');
Route::get('/multiimages-get-one/{table}/{id}', 'DNE\MultiImageCrudController@getone')->name('adminiy.multiimages.fetchone');
/*Fetching Multiple Images on screen end*/
/*fetching list data start*/
Route::post('/ytable', 'DNE\ListingController@ytable')->name('ytable');
/*fetching list data end*/
Route::get('/send-mail', 'IndexController@sendmail')->name('adminiy.sendmail');
/*Fast Crud*/
Route::post('/fastCRUD', 'DNE\fastCRUDController@index')->name('adminiy.fastCRUD');
/*Fast Crud End*/
/*CONFIG CORE*/
Route::get('/config', 'DNE\ConfigController@config')->name('adminiy.config');
Route::post('/config', 'DNE\ConfigController@configSave')->name('adminiy.configSave');
/*CONFIG CORE END*/
/*DELETING CORE*/
Route::post('/delete/ylisting/image', 'DNE\CoreDeletesController@imageDelete')->name('adminiy.imageDelete');
Route::post('/delete/ylisting/{table}/{id?}', 'DNE\CoreDeletesController@ylistingDelete')->name('adminiy.delete.ylisting');
/*DELETING CORE END*/
/*FRONT END EDITOR*/
Route::post('/statusAjaxUpdateCustom', 'DNE\FrontEndEditorController@statusAjaxUpdateCustom');
Route::post('/statusAjaxUpdate', 'DNE\FrontEndEditorController@statusAjaxUpdate');
Route::post('/updateFlagOnKey', 'DNE\FrontEndEditorController@updateFlagOnKey');
/*FRONT END EDITOR End*/
/*FRONT END IMAGE Upload*/
Route::post('/imageUpload', 'DNE\FrontEndEditorController@imageUpload');
/*FRONT END IMAGE Upload END*/
/*ytable checkbox toggle*/
Route::post('/update-checkbox', 'DNE\ytableCheckboxController@update')->name('adminiy.ytable.checkbox');
/*ytable checkbox toggle end*/
/*Get Any Flag against type*/
Route::post('/getFlag', function(){
	$data = \collect(App\Model\m_flag::select('id','flag_value')->where('flag_type',$_POST['flag_type'])->where('is_active',1)->where('is_deleted',0)->get());
	$keyed = $data->mapWithKeys(function ($item) {
		return [$item['id'] => $item['flag_value']];
	});
	return $keyed;
});


Route::post('/getDropdown', function(){
	$table = $_POST['table'];
	$key = $_POST['key'];
	$value = $_POST['value'];
	$where = $_POST['where'];
	$model_name = 'App\Model\\'.$table;
	$fetching = $model_name::select($key,$value)->where('is_active',1)->where('is_deleted',0);
	if(!empty($where)){
		$fetching = $fetching->whereRaw($where);
	}
	$data = \collect($fetching->get());
	$array = array();
	foreach($data as $dd){
		$array[$dd->$key] = $dd->$value;
	}
	return $array;
});
/*Get Any Flag against type end*/
Route::get('/search', 'DNE\SearchController@index')->name('adminiy.mainsearch');
Route::get('/logout', 'LoginController@logout')->name('adminiy.logout');
/*Adminiy Panel Updater*/
// Route::post('update-panel','DNE\PanelUpdateController@updatePanel')->name('adminiy.updatePanel');
// Route::get('update-core-Json','DNE\PanelUpdateController@updateCoreJson')->name('adminiy.updateCoreJson');
// Route::get('check-git-version','DNE\PanelUpdateController@checkGitV')->name('adminiy.checkGitV');
/*Adminiy Panel Updater End*/
});
/* cart */
Route::get('/cart', 'CartController@cart')->name('cart');
Route::get('/checkout', 'CartController@checkout')->name('checkout');
Route::post('/checkout-submit', 'CartController@completeOrder')->name('checkout.submit');
Route::post('/complete-order', 'CartController@completeOrder');
Route::get('/thankyou', 'CartController@thankyou')->name('thankyou');
Route::get('/cartCount', 'Controller@getCartCount');
Route::post('/cart-add', 'CartController@saveCart')->name('cart_add');
Route::post('/updateCart', 'CartController@updateCart')->name('update_cart');
Route::post('/remove-cart', 'CartController@removeCart');
Route::post('/change-currency', 'CartController@ChangeCurrency');
Route::post('/verify-payment', 'CartController@verifypayment')->name('verifypayment');
Route::post('/saveaddress', 'CartController@saveaddress')->name('saveaddress');
/* cart */
Route::post('/states', 'IndexController@getStates');
Route::post('/cities', 'IndexController@getCities');
Route::group(['middleware' => ['customer'],'prefix'=>'customer','namespace'=>'Customer'], function () {
Route::get('/',function(){
	return redirect('/customer/panel');
});
/*change password customer*/
Route::post('/change-password',function(){
	if(!empty($_POST['change_password'])&&!empty($_POST['change_confirm_password'])){
		if($_POST['change_password']==$_POST['change_confirm_password']){
			$adminiy=App\Model\User::find(Auth::user()->id);
			$adminiy->password = Hash::make($_POST['change_password']);
			$adminiy->save();
			return back()->with('notify_success','Password Updated');
		}
		return back()->with('notify_error','Password does not match');
	}
	return back()->with('notify_error','Password and confirm password can not be empty');
})->name('customer.changepassword');
/*change password customer end*/
Route::get('/panel', 'IndexController@index')->name('customer.panel');
Route::post('/update-account', 'IndexController@UpdateAccount')->name('customer.update.user');
	Route::get('/update-password', 'IndexController@updatePassword')->name('customer.updatepass');
	Route::post('/submit-password', 'IndexController@submitPassword')->name('customer.submitpass');
	Route::get('/orders-management', 'IndexController@ordersManagement')->name('customer.orders');
	Route::get('/wishlist-management', 'IndexController@wishlistManagement')->name('customer.wishlist');
	Route::get('/dbconnect/{order_id}', 'IndexController@dbconnect')->name('dbconnect');
	Route::post('/saveUserData', 'IndexController@saveUserData')->name('saveUserData');
	Route::post('/order-details', 'IndexController@orderdetails')->name('orderdetails');
Route::get('/logout', 'IndexController@logout')->name('customer.logout');

});

/*Supplier Dashboard*/
Route::group(['middleware' => ['supplier'],'prefix'=>'supplier','namespace'=>'Supplier'], function () {
Route::get('/',function(){
	return redirect('/supplier/panel');
});
Route::get('/panel', 'IndexController@index')->name('supplier.panel');
Route::post('/update-account', 'IndexController@UpdateAccount')->name('supplier.update.user');
Route::get('/update-password', 'IndexController@updatePassword')->name('supplier.updatepass');
Route::post('/submit-password', 'IndexController@submitPassword')->name('supplier.submitpass');
Route::get('/invoice/{id}', 'IndexController@invoice')->name('supplier.invoice');
Route::get('/logout', 'IndexController@logout')->name('supplier.logout');
Route::get('/products-management', 'IndexController@productsManagement')->name('supplier.products');
Route::get('/package-management', 'IndexController@packageManagement')->name('supplier.package');
Route::get('/product-addition/{product_slug?}', 'IndexController@productAddition')->name('supplier.product.addition');
Route::get('/package-addition/{package_slug?}', 'IndexController@packageAddition')->name('supplier.package.addition');
Route::get('/category-addition/{category_slug?}', 'IndexController@categoryAddition')->name('supplier.category.addition');
Route::get('/size-addition}', 'IndexController@sizeAddition')->name('supplier.size.addition');
Route::get('/color-addition}', 'IndexController@colorAddition')->name('supplier.color.addition');
Route::post('/get-categories', 'IndexController@getCategories')->name('supplier.get_categories');
Route::post('/product-submityyuy', 'IndexController@productSubmit')->name('supplier.product.submit');
Route::post('/package-submityyuy', 'IndexController@packageSubmit')->name('supplier.package.submit');
Route::post('/category-submit', 'IndexController@categorySubmit')->name('supplier.category.submit');
Route::post('/size-submit', 'IndexController@sizeSubmit')->name('supplier.size.submit');
Route::post('/color-submit', 'IndexController@colorSubmit')->name('supplier.color.submit');
Route::get('/product-delete/{id}', 'IndexController@productDelete')->name('supplier.product.delete');
Route::get('/package-delete/{id}', 'IndexController@packageDelete')->name('supplier.package.delete');
Route::post('/image-delete', 'IndexController@imageDelete')->name('supplier.image.delete');
Route::group(['prefix'=>'orders'], function () {
	Route::get('/{productId?}', 'OrderController@index')->name('supplier.orders');
});	
Route::group(['prefix'=>'rating'], function () {
	Route::get('/{productId?}', 'RatingController@index')->name('supplier.rating');
});
Route::get('/logout', 'IndexController@logout')->name('supplier.logout');
});