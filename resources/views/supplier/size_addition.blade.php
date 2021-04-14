@extends('supplier.layout.main')
@section('content')
@php
$name = old('name');
@endphp
<section class="main-people-say">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="people-img-text">
          <div class="signin_header">
            <h1>Add Size</h1>
          </div>
          <div class="signinfrom-area">
            <form method="POST" action="{{ route('supplier.size.submit') }}" enctype="multipart/form-data">
              @csrf
              {{-- <input type="hidden" name="categoryId" value="{{ !empty($category) ? $category->id : '' }}"> --}}
              <div class="form-group">
                <label>Size Name {{Helper::errorField('name',$errors)}}</label>
                <input class="form-control" name="name" placeholder="Enter Size Name" type="text" value="{{ $name }}" >
              </div>
              <div class="form-group">
                <input class="btn btn-success" type="submit" value="Save Size">
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
</style>

@endsection
@section('js')
 <script src="{{asset('admin/vendors/ckeditor/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
 <script src="{{asset('admin/vendors/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
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