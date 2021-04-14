@extends('supplier.layout.main')
@section('content')
@php
$name = old('name');
$product_id = old('product_id');
$slug = old('slug');
$price = old('price'); 
$detail = old('detail');
$package_id = old('package_id');
$stripe_plan_id = old('stripe_plan_id');
$months = old('months');
$free_trail = old('free_trail');
$free_days = old('free_days');
$otp = old('otp');
$package_type = old('package_type');


$relatatedPackageArray = array();
if(!empty($package))
{
  $name = $package->name;
  $product_id = $package->product_id;
  $slug = $package->slug;
  $price = $package->price;
  $detail = $package->detail;
  $package_id = $package->package_id;
  $stripe_plan_id = $package->stripe_plan_id;
  $months = $package->months;
  $free_trail = $package->free_trail;
  $free_days = $package->free_days;
  $otp = $package->otp;
  $package_type = $package->package_type;
}
//dd($userProducts); 
  //dd([$free_trail,$free_days]);
//dd($errors->all());
@endphp

<section class="main-people-say">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="people-img-text">
          <div class="signin_header">
            <h1>{{ empty($package) ? 'Add' : 'Update'}} Package</h1>
          </div>
          <div class="signinfrom-area">
            <form method="POST" action="{{ route('supplier.package.submit') }}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="packageId" value="{{ !empty($package) ? $package->id : '' }}">
              <input type="hidden" name="stripe_plan_id" value="{{$stripe_plan_id}}">

              <div class="form-group">
                <label>Product {{Helper::errorField('product',$errors)}}</label>
                <select name="product" class="select2_parent" id="product" required>
					      <option value="">Select Product</option>

				          @if(count($userProducts) > 0)
                    @foreach($userProducts as $upro)
                      <option value="{{ $upro->id }}" {{($upro->id == $product_id ? 'selected=""' : '' )}}>{{ $upro->name }}</option>
                    @endforeach
                  @endif
			
                </select>
              </div>
              <div class="form-group">
                <label>Package Name {{Helper::errorField('name',$errors)}}</label>
                <input class="form-control" name="name" placeholder="Enter Package Name" type="text" value="{{ $name }}" onkeyup="generateSlug('slug',this)" required>
              </div>
              <div class="form-group">
                <label>Package Slug {{Helper::errorField('slug',$errors)}}</label> 
                <input class="form-control" name="slug" placeholder="Enter Package Slug" type="text" value="{{ $slug }}" id="slug">
              </div>
              <div class="form-group">
                <label>One time payment</label>
                <label for="ot11">
                    <input type="radio" id="ot11" name="otp" value="1" {{ ($otp == 1 ? "checked='checked'" : '' )}} required /> Yes
                </label>
                &nbsp;&nbsp;
                <label for='ot12'>
                    <input type='radio' id='ot12' name='otp' value='0' {{ ($otp == 0 ? "checked='checked'" : '' )}} required /> No 
                </label>
              </div>
              <div class="form-group monthsdiv" {{($otp == 1 ? 'style=display:none;' : '')}}>
                <label>Number of Months</label>
                  <select name="months" class="select2_parent" id="months" required>
                    <option value="">Select Package month</option>
                    <option value="1" {{($months == 1 ? 'selected=""' : '')}}>1</option>
                    <option value="2" {{($months == 2 ? 'selected=""' : '')}}>2</option>
                    <option value="3" {{($months == 3 ? 'selected=""' : '')}}>3</option>
                    <option value="4" {{($months == 4 ? 'selected=""' : '')}}>4</option>
                    <option value="5" {{($months == 5 ? 'selected=""' : '')}}>5</option>
                    <option value="6" {{($months == 6 ? 'selected=""' : '')}}>6</option>
                    <option value="7" {{($months == 7 ? 'selected=""' : '')}}>7</option>
                    <option value="8" {{($months == 8 ? 'selected=""' : '')}}>8</option>
                    <option value="9" {{($months == 9 ? 'selected=""' : '')}}>9</option>
                    <option value="10" {{($months == 10 ? 'selected=""' : '')}}>10</option>
                    <option value="11" {{($months == 11 ? 'selected=""' : '')}}>11</option>
                    <option value="12" {{($months == 12 ? 'selected=""' : '')}}>12</option>
                  </select>
              </div>
               <div class="form-group" >
                <label>Package Price {{Helper::errorField('price',$errors)}}</label> 
                <input class="form-control" name="price" placeholder="Enter Price" type="text" value="{{ $price }}">
              </div>
               <div class="form-group packgiddiv" {{($otp == 1 ? 'style=display:none;' : '')}}>
                <label>Software Package ID</label> 
                <input class="form-control" name="package_id" placeholder="Enter Software Package ID" type="text" value="{{ $package_id }}" required>
              </div>


              <div class="form-group">
                <label>Details {{Helper::errorField('detail',$errors)}}</label> 
                <textarea name="detail" class="ckeditor">{{$detail}}</textarea>
              </div>
              <div class="form-group">
                <label>Free Trial available</label>
                <label for="r11">
                    <input type="radio" id="r11" name="free_trail" value="1" {{ ($free_trail == 1 ? "checked='checked'" : '' )}} required /> Yes
                </label>
                &nbsp;&nbsp;
                <label for='r12'>
                    <input type='radio' id='r12' name='free_trail' value='0' {{ ($free_trail == 0 ? "checked='checked'" : '' )}} required /> No 
                </label>
              </div>
               <div class="form-group traildaydiv" {{($free_trail == 0 ? 'style=display:none;' : '')}}>
                <label>Days of free Trial</label>
                  <select name="free_days" class="select2_parent" id="free_days">
                    <option value="">Select Package month</option>
                    <option value="15" {{($free_days == 15 ? 'selected=""' : '')}}>15 Days</option>
                    <option value="30" {{($free_days == 30 ? 'selected=""' : '')}}>30 Days</option>
                  </select>
              </div>
              <span style="color:red"><strong>Note:</strong> We offer deeper discounts to our clients on our platform for subscribing to more softwares. Our clients are more encouraged to subscribe to softwares that offer these additional discounts. 5% 10% and 15% discounts are offered to subscribers for 2, 3 or 4+ subscriptions consecutively. Your package would be listed under bundles if you check-mark this option. If you uncheck this option in the future, your existing subscribers at the time would still be offered the discounts but the new subscribers would not be offered the same.</span>
              <div class="form-group">
                <label>Package add in bundle</label>
                <label for="r13">
                    <input type="radio" id="r13" name="package_type" value="1" {{ ($package_type == 1 ? "checked='checked'" : '' )}} required /> Yes
                </label>
                &nbsp;&nbsp;
                <label for='r14'>
                    <input type='radio' id='r14' name='package_type' value='0' {{ ($package_type == 0 ? "checked='checked'" : '' )}} required /> No 
                </label>
              </div>
              <div class="form-group">
                <input class="btn btn-success" type="submit" value="Save Package">
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
$('#r11').on('click', function(){
  $(".traildaydiv").css('display','block');
})

$('#r12').on('click', function(){
  $(".traildaydiv").css('display','none');
})

$('#ot12').on('click', function(){
  $(".monthsdiv").css('display','block');
  $(".packgiddiv").css('display','block');
})

$('#ot11').on('click', function(){
  $(".monthsdiv").css('display','none');
  $(".packgiddiv").css('display','none');
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
  var packageId = $(obj).attr('data-packageId');
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
          return ajaxify({imgid:imgid,packageId:packageId},'POST',base_url('supplier/image-delete'));
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