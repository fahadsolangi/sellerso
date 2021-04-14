<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
<!--compiled version of bootstrap , slick , animated etc, make sure to use the sort html team have used-->

<script src="{{asset('js/front/jquery.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('css/fontawesome-all.css') }}">
<link rel="stylesheet" href="{{ asset('js/front/owl.carousel.min.css') }}">
<script src="{{asset('js/front/owl.carousel.js')}}"></script>
<script src="{{asset('js/front/bootstrap.min.js')}}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

{{-- <link rel="stylesheet" href="{{ asset('css/all.css') }}"> --}}

<!--style.css uncompiled so that when html team has to work , they can work without any issues-->
{{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
<!--DNE-->

<style>
*[contenteditable]:focus {
border:1px dashed black;
outline:none;
}
.custom-menu {
position: absolute;
z-index: 1001;
}
.custom-menu li a {
padding: 6px 14px;
margin-bottom: 1px;
background-color: rgba(0, 0, 0, 0.9);
border: 0;
color: white;
font-weight: 100;
font-size: 12px;
transition: all 1s linear;
display: block;
}
.custom-menu li a:hover {
background: #000;
}
.custom-menu li {
margin-bottom: 1px;
}
button.contentEditBtn {
position: absolute;
right: 0;
background: #e40a0a;
color: white;
padding: 7px 8px;
border: none;
}
button.contentEditBtn.contentEditBtnLess {
right: 46px;
}
</style>