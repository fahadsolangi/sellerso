@extends('supplier.layout.main')
@section('content')
@php
$name = old('name');
$slug = old('slug');
$category_id = old('category_id');
$product_by = old('product_by');
$dev_phone = old('dev_phone');
$dev_email = old('dev_email');
$dev_website = old('dev_website'); 
$video_link = old('video_link'); 
$functionality = old('functionality');
$features = old('features');
$description = old('description');
$whoshould = old('whoshould');
$pricing_information = old('pricing_information');
$db_host = old('db_host');
$db_user = old('db_user');
$db_pass = old('db_pass');
$db_database = old('db_database');
$usertable  = old('usertable');
$substable  = old('substable');
$regapi  = old('regapi');
$usercancel  = old('usercancel');
$subsapi  = old('subsapi');
$cancelapi  = old('cancelapi');
$firstname  = old('firstname');
$lastname  = old('lastname');
$username  = old('username');
$password  = old('password');
$expiredate  = old('expiredate');
$userid  = old('userid');
$subscriptionid  = old('subscriptionid');
$plantype  = old('plantype');
$connection_type  = old('connection_type');
$extracolumn1  = old('extracolumn1');
$extracolumn2  = old('extracolumn2');
$affiliate_url  = old('affiliate_url');



$relatatedProductArray = array();
if(!empty($product))
{
  $name = $product->name;
  $slug = $product->slug;
  $category_id = $product->category_id;
  $product_by = $product->product_by;
  $dev_phone = $product->dev_phone;
  $dev_email = $product->dev_email;
  $dev_website = $product->dev_website;
  $video_link = $product->video_link;
  $functionality = $product->functionality;
  $features = $product->features;
  $description = $product->description;
  $whoshould = $product->whoshould;
  $db_host = $product->db_host;
  $db_user = $product->db_user;
  $db_pass = $product->db_pass;
  $db_database = $product->db_database;
  $usertable  = $product->usertable;
  $substable  = $product->substable;
  $regapi  = $product->regapi;
  $usercancel  = $product->usercancel;
  $subsapi  = $product->subsapi;
  $cancelapi  = $product->cancelapi;
  $firstname  = $product->firstname;
  $lastname  = $product->lastname;
  $username  = $product->username;
  $password  = $product->password;
  $expiredate  = $product->expiredate;
  $userid  = $product->userid;
  $subscriptionid  = $product->subscriptionid;
  $plantype  = $product->plantype;
  $connection_type  = $product->connection_type;
  $extracolumn1  = $product->extracolumn1;
  $extracolumn2  = $product->extracolumn2;
  $affiliate_url  = $product->affiliate_url;


}
// dd($errors->all());
@endphp

<section class="main-people-say">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="people-img-text">
          <div class="signin_header">
            <h1>{{ empty($product) ? 'Add' : 'Update'}} Software</h1>
          </div>
          <div class="signinfrom-area">
            <form method="POST" action="{{ route('supplier.product.submit') }}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="productId" value="{{ !empty($product) ? $product->id : '' }}">
                <div class="form-group">
                <label>Category Name *{{Helper::errorField('category',$errors)}}</label>
                <select name="category" class="select2_parent" id="category">
					         <option value="0">Select Category</option>

				          @if(count($category) > 0)
                    @foreach($category as $cat)
                     @if($cat->id == $category_id)
                      <option value="{{ $cat->id }}" selected="">{{ $cat->name }}</option>
                     @else 
                      <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                      @endif
                    @endforeach
                  @endif
			
                </select>
              </div>
              <div class="form-group">
                <label>Product Name *{{Helper::errorField('name',$errors)}}</label>
                <input class="form-control" name="name" placeholder="Enter Product Name" type="text" value="{{ $name }}" onkeyup="generateSlug('slug',this)">
              </div>
              <div class="form-group">
                <label>Product Slug {{Helper::errorField('slug',$errors)}}</label> 
                <input class="form-control" name="slug" placeholder="Enter Product Slug" type="text" value="{{ $slug }}" id="slug">
              </div>
              <div class="form-group">
                <label>Product By *{{Helper::errorField('product_by',$errors)}}</label> 
                <input class="form-control" name="product_by" placeholder="Enter Product By" type="text" value="{{ $product_by }}">
              </div>
               
               <div class="form-group">
                <label>Developer Phone {{Helper::errorField('dev_phone',$errors)}}</label> 
                <input class="form-control" name="dev_phone" placeholder="Developer Phone" type="text" value="{{ $dev_phone }}">
              </div>
              <div class="form-group">
                <label>Developer Email {{Helper::errorField('dev_email',$errors)}}</label> 
                <input class="form-control" name="dev_email" placeholder="Enter Developer Email" type="text" value="{{ $dev_email }}">
              </div>
              <div class="form-group">
                <label>Developer Website {{Helper::errorField('dev_website',$errors)}}</label> 
                <input class="form-control" name="dev_website" placeholder="Enter Developer Website" type="text" value="{{ $dev_website }}">
              </div>
              <div class="form-group">
                <label>Video Link {{Helper::errorField('video_link',$errors)}}</label> 
                <input class="form-control" name="video_link" placeholder="Enter Video Link" type="text" value="{{ $video_link }}">
              </div>

              <div class="form-group">
                <label>Functionality {{Helper::errorField('functionality',$errors)}}</label> 
                <textarea name="functionality" class="ckeditor">{{$functionality}}</textarea>
              </div>

              <div class="form-group">
                <label>Features {{Helper::errorField('features',$errors)}}</label> 
                <textarea name="features" class="ckeditor">{{$features}}</textarea>
              </div>

              <div class="form-group">
                <label>Product Description {{Helper::errorField('description',$errors)}}</label> 
                <textarea name="description" class="ckeditor">{{$description}}</textarea>
              </div>

              <div class="form-group">
                <label>Who should use this? {{Helper::errorField('whoshould',$errors)}}</label> 
                <textarea name="whoshould" class="ckeditor">{{$whoshould}}</textarea>
              </div>

              <div class="form-group">
                <label>Pricing Information {{Helper::errorField('pricing_information',$errors)}}</label> 
                <textarea name="pricing_information" class="ckeditor">{{$pricing_information}}</textarea>
              </div>

              <div class="form-group">
                <label>Product Image</label> 
                <input name="product_image" type="file">
                @if(!empty($product))
                  <img src="{{ ImageUtil::getHref($product->img_id,'200','200')}}" class="img-responsive" id="product_image">
                @endif
              </div>
              <div class="form-group">
                <label>Optional Images {{Helper::errorField('product_stock',$errors)}}</label> 
                <input name="optional_images[]" type="file" multiple>
                @if(!empty($product))
                  <?php $optional_images = Helper::returnDataSet('imagetable',"type=2 and table_name='products' and ref_id=".$product->id); ?>
                  @if(count($optional_images) > 0)
                    <ul class="multi-images">
                    @foreach($optional_images as $img)
                      <li><a class="image" href="javascript:void(0)" title="Remove Image" onclick="deleteImage(this)" data-productid="{{ $product->id}}" data-imageid="{{ $img->id }}">
                        <img src="{{ ImageUtil::getHref($img->id,'200','200')}}" class="img-responsive" class="optional_images">
                        <div class="overlay-product"></div>
                      </a></li>  
                    @endforeach
                    </ul>
                  @endif
                @endif
              </div>
              <!-- Connectivity -->
                    <div class="panel-group" id="accordion">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                              <label for="r11" style="width: 350px;">
                                <input type="radio" id="r11" name="connection_type" value="1" {{ ($connection_type == 1 ? "checked='checked'" : '' )}} /> Connect With Database *
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"></a>
                              </label>
                          </h4>
                          <h4>
                            <label for='r12' style='width: 350px;'>
                                <input type='radio' id='r12' name='connection_type' value='2' {{ ($connection_type == 2 ? "checked='checked'" : '' )}} /> Connect With API *
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"></a>
                              </label>
                          </h4>
                          <h4>
                            <label for='r13' style='width: 350px;'>
                                <input type='radio' id='r13' name='connection_type' value='3' {{ ($connection_type == 3 ? "checked='checked'" : '' )}} /> Afaffiliate Program *
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"></a>
                              </label>
                          </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in {{($connection_type > 0 ? "show" : '' )}}">
                          <div class="panel-body">
                            <div class="form-group affdiv" {{($connection_type != 3 ? "style=display:none;" : '' )}}>
                              <label>Afaffiliate Url *</label> 
                              <input class="form-control affval" name="affiliate_url"  type="url" value="{{$affiliate_url}}" {{($connection_type != 3 ? "disbabled" : '' )}}>
                            </div>
                            <h4 class="dbhead" {{($connection_type != 1 ? "style=display:none;" : '' )}}>Database and Table Details</h4>
                            <h4 class="endpointhead" {{($connection_type != 2 ? "style=display:none;" : '' )}}>Endpoint and Parameter Details</h4>
                            <div class="form-group dbdiv" {{($connection_type != 1 ? "style=display:none;" : '' )}}>
                              <label>DB Host *</label> 
                              <input class="form-control dbval" name="db_host"  type="text" value="{{$db_host}}" {{($connection_type != 1 ? "disbabled" : '' )}}>
                            </div>
                            <div class="form-group dbdiv" {{($connection_type != 1 ? "style=display:none;" : '' )}}>
                              <label>DB User *</label> 
                              <input class="form-control dbval" name="db_user" type="text" value="{{$db_user}}" {{($connection_type != 1 ? "disbabled" : '' )}}>
                            </div>
                            <div class="form-group dbdiv" {{($connection_type != 1 ? "style=display:none;" : '' )}}>
                              <label>DB Password *</label> 
                              <input class="form-control dbval" name="db_pass" type="text" value="{{$db_pass}}" {{($connection_type != 1 ? "disbabled" : '' )}}>
                            </div>
                            <div class="form-group dbdiv" {{($connection_type != 1 ? "style=display:none;" : '' )}}>
                              <label>DB Name *</label> 
                              <input class="form-control dbval" name="db_database" type="text" value="{{$db_database}}" {{($connection_type != 1 ? "disbabled" : '' )}}>
                            </div>
                            <div class="form-group endpointdiv" {{($connection_type != 2 ? "style=display:none;" : '' )}}>
                              <label>Register Endpoint *</label> 
                              <input class="form-control endpointval" name="regapi" type="text" value="{{$regapi}}" {{($connection_type != 2 ? "disbabled" : '' )}}>
                            </div>
                            <div class="form-group endpointdiv" {{($connection_type != 2 ? "style=display:none;" : '' )}}>
                              <label>Deactive User Endpoint *</label> 
                              <input class="form-control endpointval" name="usercancel" type="text" value="{{$usercancel}}" {{($connection_type != 2 ? "disbabled" : '' )}}>
                            </div>
                            <div class="form-group endpointdiv" {{($connection_type != 2 ? "style=display:none;" : '' )}}>
                              <label>Subscription Endpoint *</label> 
                              <input class="form-control endpointval" name="subsapi" type="text" value="{{$subsapi}}" {{($connection_type != 2 ? "disbabled" : '' )}}>
                            </div>
                            <div class="form-group endpointdiv" {{($connection_type != 2 ? "style=display:none;" : '' )}}>
                              <label>Cancel Subscription Endpoint *</label> 
                              <input class="form-control endpointval" name="cancelapi" type="text" value="{{$cancelapi}}" {{($connection_type != 2 ? "disbabled" : '' )}}>
                            </div>
                            <div class="form-group dddiv">
                              <label>User Table Name *</label> 
                              <input class="form-control" name="usertable" type="text" value="{{$usertable}}">
                            </div>
                            <div class="form-group dddiv">
                              <label>Subscription Table Name *</label> 
                              <input class="form-control" name="substable" type="text" value="{{$substable}}">
                            </div>
                            <h4 class="dbhead" {{($connection_type != 1 ? "style=display:none;" : '' )}}>User Table Columns</h4>
                            <h4 class="endpointhead" {{($connection_type != 2 ? "style=display:none;" : '' )}}>User Parameter Name</h4>
                            <div class="form-group dddiv">
                              <label>First Name *</label> 
                              <input class="form-control" name="firstname" type="text" value="{{$firstname}}">
                            </div>
                            <div class="form-group dddiv">
                              <label>Last Name</label> 
                              <input class="form-control" name="lastname" type="text" value="{{$lastname}}">
                            </div>
                            <div class="form-group dddiv"> 
                              <label>Email *</label> 
                              <input class="form-control" name="username" type="text" value="{{$username}}">
                            </div>
                            <div class="form-group dddiv"> 
                              <label>Password *</label> 
                              <input class="form-control" name="password" type="text" value="{{$password}}">
                            </div>
                            <div class="form-group dddiv"> 
                              <label>Extra Column 1</label> 
                              <input class="form-control" name="extracolumn1" type="text" value="{{$extracolumn1}}">
                            </div>
                            <div class="form-group dddiv"> 
                              <label>Extra Column 2</label> 
                              <input class="form-control" name="extracolumn2" type="text" value="{{$extracolumn2}}">
                            </div>
                             <h4 class="dbhead" {{($connection_type != 1 ? "style=display:none;" : '' )}}>Subscription Table Columns</h4>
                             <h4 class="endpointhead" {{($connection_type != 2 ? "style=display:none;" : '' )}}>Subscription Parameter Name</h4>
                            <div class="form-group dddiv">
                              <label>User ID *</label> 
                              <input class="form-control" name="userid" type="text" value="{{$userid}}">
                            </div>
                            <div class="form-group dddiv">
                              <label>Package ID *</label> 
                              <input class="form-control" name="subscriptionid" type="text" value="{{$subscriptionid}}">
                            </div>
                            <div class="form-group dddiv"> 
                              <label>Package Type</label> 
                              <input class="form-control" name="plantype" type="text" value="{{$plantype}}">
                            </div>
                            <div class="form-group dddiv"> 
                              <label>Expiration Date *</label> 
                              <input class="form-control" name="expiredate" type="text" value="{{$expiredate}}">
                            </div>
                            <!-- Dynamic Payment Rows -->
                          </div>
                        </div>
                      </div>
                    </div>
              <!-- Connectivity -->
              <div class="form-group">
                <input class="btn btn-success" type="submit" value="Save Product">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/select2/css/select2.min.css')}}">
<style type="text/css">
	/*in page css here*/
.bs-example{
      margin: 20px;
    }
</style>

@endsection
@section('js')
 <script src="{{asset('admin/vendors/ckeditor/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
 <script src="{{asset('admin/vendors/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  var radioValue = $("input[name='connection_type']:checked"). val();
  if(radioValue == 3)
  {
    $(".dbdiv").css("display","none");
    $(".dbhead").css("display","none");
    $(".dbval").attr("disbabled","disbabled");
    $(".endpointdiv").css("display","none");
    $(".endpointhead").css("display","none");
    $(".endpointval").attr("disbabled","disbabled");
    $(".affdiv").css("display","block");
    $(".affval").css("display","block");
    $(".dddiv").css("display","none");
    $(".affval").removeAttr("disbabled")
    $("#collapseOne").addClass("show");
  }
});
$('#r11').on('click', function(){
  $(".endpointdiv").css("display","none");
  $(".endpointhead").css("display","none");
  $(".endpointval").attr("disbabled","disbabled");
  $(".dbdiv").css("display","block");
  $(".dbhead").css("display","block");
  $(".dbval").removeAttr("disbabled");
  $(".affdiv").css("display","none");
  $(".affval").css("display","none");
  $(".affval").attr("disbabled","disbabled");
  $(".dddiv").css("display","block");
  $("#collapseOne").addClass("show");
})

$('#r12').on('click', function(){
  $(".dbdiv").css("display","none");
  $(".dbhead").css("display","none");
  $(".dbval").attr("disbabled","disbabled");
  $(".endpointdiv").css("display","block");
  $(".endpointhead").css("display","block");
  $(".endpointval").removeAttr("disbabled");
  $(".affdiv").css("display","none");
  $(".affval").css("display","none");
  $(".affval").attr("disbabled","disbabled");
  $(".dddiv").css("display","block");
  $("#collapseOne").addClass("show");
})

$('#r13').on('click', function(){
  $(".dbdiv").css("display","none");
  $(".dbhead").css("display","none");
  $(".dbval").attr("disbabled","disbabled");
  $(".endpointdiv").css("display","none");
  $(".endpointhead").css("display","none");
  $(".endpointval").attr("disbabled","disbabled");
  $(".affdiv").css("display","block");
  $(".affval").css("display","block");
  $(".dddiv").css("display","none");
  $(".affval").removeAttr("disbabled")
  $("#collapseOne").addClass("show");
})



$(document).ready(function () {
    var counter = 0;
    $("#addrow1").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input type="text" class="form-control" name="table1data[]"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list1").append(newRow);
        counter++;
    });
    $("table.order-list1").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });
});
function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();
}
function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list1").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}

$(document).ready(function () {
    var counter = 0;
    $("#addrow2").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input type="text" class="form-control" name="table2data[]"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list2").append(newRow);
        counter++;
    });
    $("table.order-list2").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });
});
function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();
}
function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list2").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}

$(document).ready(function () {
    var counter = 0;
    $("#addrow3").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input type="text" class="form-control" name="table3data[]"/></td>';


        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list3").append(newRow);
        counter++;
    });
    $("table.order-list3").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });
});
function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();
}
function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list3").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}

$(document).ready(function () {
    var counter = 0;
    $("#addrow4").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input type="text" class="form-control" name="table4data[]"/></td>';


        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list4").append(newRow);
        counter++;
    });
    $("table.order-list4").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });
});
function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();
}
function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list4").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
$(document).ready(function(){
	@if(isset($product))
		$("#category_type").change();
	@endif
})
$("select.select2_parent").each(function(){
    //var a = $(this).parent();
    $(this).select2({
      dropdownAutoWidth: !0,
      width: "100%",
      //dropdownParent: a
    })
  })
var deleteImage=(obj)=>{
  var imgid = $(obj).attr('data-imageid');
  var productid = $(obj).attr('data-productid');
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this image",
    icon: "warning",
    button: {
      text: "Delete Record",
      closeModal: false,
    },
    dangerMode: true,
  }).then((delRecord)=>{
      if(delRecord){
        //_mainNode.parentElement.parentElement.classList='animated fadeOutRight';
          return ajaxify({imgid:imgid,productid:productid},'POST',base_url('supplier/image-delete'));
      }
  })
  .then((willDelete) => {
    if (willDelete) {
      if(willDelete.status == 1){
          swal("Poof! Your image has been deleted!", {
            icon: "success",
            timer:1000,
          });
          $(obj).parent('li').remove();
      }
      else
      {
        swal(willDelete.data, {
            icon: "error",
            timer:1000,
          });
      }
    }
  });
}
/* get categories*/
$('#category_type').change(async function(){
	@if(isset($product->category))
		selected = {{$product->category}};
	@else
		selected = '';
	@endif	
	ajaxifyN({type:$(this).val()},'POST',base_url('supplier/get-categories')).then(_data=>{
		console.log(_data)
	var _html = '<option value="">Select Category</option>';
	$.each(_data.data,function (ind,val){
		if(val.id == selected)
			_html+='<option value="'+val.id+'" selected>'+val.category_name+'</option>';
		else	
			_html+='<option value="'+val.id+'">'+val.category_name+'</option>';
	})
	/*for(data in _data){
		_data[data]
		_html+='<option value="'+data+'">'+_data[data]+'</option>';
	}*/
        $('[name="category"]').html(_html);
    });
});
$('.ckeditor').ckeditor();

</script>
@endsection