<!-- jQuery ,bootstrap and any 3rd party script should be compiled into all.js -->

<script src="{{asset('js/front/owl.custom.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript">
  


$(function(){
  $('.owl-item a').click(function(){
  $('.owl-item').removeClass('current');
  $(this).parents('.owl-item').addClass('current');
  var target = $(this).attr('href');
  $('.tab-content').find('.tab-pane').removeClass('active');
  $('.tab-content').find(target).addClass('active');
  
  });
  })
  
</script>

<script src="{{asset('js/front/all.js')}}"></script>


<script src="{{asset('js/public.js')}}"></script>
<script src="{{asset('js/ycommon.js')}}"></script>
@if($header != 'listapp')
        <script type="text/javascript">
  $(".dropdowncategory").click(function(){
      $(".catdrop").toggleClass("show");
      $(".categorymenu").toggleClass("show");
  });
  $(".dropdownpricing").click(function(){
      $(".pricdrop").toggleClass("show");
      $(".pricemenu").toggleClass("show");
  });
</script>
@endif
<script type="text/javascript">

  function AddCartAfter(data,obj){
  if(obj!="counter"){
    var obj = JSON.parse(data);
    if(obj.msg=='success'){
    generateNotification('success','Package has been added in cart');  
    ReloadPage();
    } else {
      generateNotification('error',obj.msgTxt);
    }
    //$('#checkout_counter').html('').html(obj.count);
  }else {
  //$('#checkout_counter').html('').html(data);  
  }
}
function removeCart(id,obj){
  var keyArray = [];
  // var id = id;
  // console.log(id);
  // keyArray.push(id);
  // childFormSubmitAsync(keyArray,'POST','{{url('/')}}/remove-cart',removeCartAfter,obj);
  ajaxifyN({id:id,},'POST',base_url('remove-cart')).then(function(q){
  if(q.status==1){
    generateNotification('success','Package removed from the cart');  
    ReloadPage();
    } else {
      generateNotification('error',q.data);
    } 
});
}
function removeCartAfter(data,obj){
  if(data=='success'){
    $(obj).parent().parent().fadeOut(function(){ $(this).remove(); });
    //alert(cart)
    //$(".fa-shopping-cart").children('.badge').text(cart != "" ? cart : 0)
    generateNotification('success','Package removed from the cart');
    ReloadPage();
  }
}
(function($){
  $.fn.visible = function(partial){
      var $t        = $(this),
        $w        = $(window),
        viewTop     = $w.scrollTop(),
        viewBottom    = viewTop + $w.height(),
        _top      = $t.offset().top,
        _bottom     = _top + $t.height(),
        compareTop    = partial === true ? _bottom : _top,
        compareBottom = partial === true ? _top : _bottom;  
    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
    };
})(jQuery);
$(document).ready(function(){
showvisible();
$(window).scroll(function(){
        setTimeout(function(){ showvisible() }, 100);
    });
});
function showvisible(){
$('img').each(function(){
var visible = $(this).visible('partial');
var elem = $(this);
if (!elem.prop('complete')) {
  elem.on('load', function() {
    //console.log(this.complete);
  });
} else {
}
if(visible) { 
$(this).attr('src',$(this).data('url'));
}
});
}
$(document).on('ready', function() {
            $(".mainbanner").slick({
                dots: true,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1
            });
            
            $(".popularappsslider").slick({
                dots: true,
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [
                    {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                    {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });

            $(".freetrialsslider").slick({
                dots: true,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [
                    {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                    {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        });

            //FANCYBOX
            //https://github.com/fancyapps/fancyBox
            /*$(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });*/

function rating_error(res){
  if(res){
    if(isJSON(res)){
      res = JSON.parse(res);
      if(res.errors){
        var _errors='';
        for(j in res.errors){
          _errors+=res.errors[j].join('</br>')+'</br>';
        }
        generateNotification('0',_errors);
      }
    }
  }
}
function rating_success(_msg){
    if(_msg.status){
        generateNotification('1','Thank you for your input');
        $('#rating_form')[0].reset();
        location.reload();
    }
}
$(document).ready(function(){
    $("#currencyList").change(function(){
        var val = $(this).val();
        ajaxifyN({id:val,},'POST',base_url('change-currency')).then(function(q){
          if(q.status==1){
                ReloadPage();
            }
        });   
    })
})

$(function(){
$('.owl-item a').click(function(){
$('.owl-item').removeClass('current');
$(this).parents('.owl-item').addClass('current');
var target = $(this).attr('href');
$('.tab-content').find('.tab-pane').removeClass('active');
$('.tab-content').find(target).addClass('active');

});
})
</script>

@if(is_adminiy())
  <script src="{{asset('admin/vendors/ckeditor/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
  <script src="{{ asset('admin/js/content-management.js') }}"></script>

@endif