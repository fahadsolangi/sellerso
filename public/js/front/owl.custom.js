


//apps//

      var owl = $('#apps');
      owl.owlCarousel({
        margin: 0,
        loop: true,
        nav:true,
        responsive: {
         0: {
            items: 1
          },
           768: {
            items: 2
          },
          991: {
            items: 3
          },
          1199: {
            items: 4
          }
        }
      });


//apps2//

      var owl = $('#apps2');
      owl.owlCarousel({
        margin: 0,
        loop: true,
        nav:true,
        responsive: {
          0: {
            items: 1
          },
           768: {
            items: 2
          },
          991: {
            items: 3
          },
          1199: {
            items: 4
          }
        }
      });



//recommend//

      var owl = $('#recommend');
      owl.owlCarousel({
        margin: 0,
        loop: true,
        nav:true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
          }
        }
      });





//Categories//

  $(' #Categories').owlCarousel({
    loop: true,
    nav:true,
    margin:28,	
    autoWidth:true,
	responsiveClass:true,autoplayHoverPause:true,
	autoplay:false,
	 slideSpeed: 400,
      paginationSpeed: 400,
	 autoplayTimeout:3000,
    responsive:{
        0:{
            items:1,
            nav:true,
            autoWidth:false,
          margin:0,
		    loop:false	
        },
        600:{
            items:3,
            nav:true,
			  loop:false
        },
        1000:{
            items:3,
            nav:true,
            loop:false
        }
    }
})

$(document) .ready(function(){
var li =  $(".owl-item li ");
$(".owl-item li").click(function(){
li.removeClass('active');
});
});
  

//product-detail//

      var owl = $('#preview');
      owl.owlCarousel({
        margin: 0,
        loop: true,
        nav:true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
          }
        }
      });


// testimonials

      var owl = $('#testimonials');
      owl.owlCarousel({
        margin: 0,
        loop: true,
        nav: false,
		dots: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
          }
        }
      });
	  
	  
//navigation//

$(document).ready(function(){
  $(".navbar-toggler").click(function(){
    $("#navbarText").toggleClass("hide");
  });
});



$(document).ready(function(){
   $('.dropdown-toggle').dropdown()
});




