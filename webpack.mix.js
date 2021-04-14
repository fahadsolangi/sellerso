const mix = require('laravel-mix');

mix.styles([
    'public/css/bootstrap.min.css',
    'public/css/frontend.css',
	'public/css/responsive.css',
    'public/css/fontawesome-all.css',
    'public/css/owl.carousel.min.css',


    // 'public/css/magnific-popup.css',
    // 'public/css/font-awesome.css',
    // 'public/css/element.css',    
    // 'public/css/jquery.fancybox.css',
    // 'public/css/slick.css',
    // 'public/css/slick-theme.css',
    //'public/css/animate.css',
], 'public/css/all.css');

mix.scripts([
    // 'public/js/front/jquery.min.js',
    'public/js/front/owl.carousel.js',
    'public/js/front/bootstrap.min.js',
    'public/js/front/owl.custom.js',
    'public/js/front/owl.custom1.js',
    'public/js/front/owl.carousel.js',    
    'public/js/front/owl.carousel1.js',    
    
    // 'public/js/front/jquery.magnific-popup.min.js',
    // 'public/js/front/scripts.js',
    // 'public/js/front/smoothscroll.js',
    // 'public/js/front/waypoints.min.js',
    // 'public/js/front/slick.js',
    // 'public/js/front/jquery.fancybox.pack.js',
    //'public/js/front/wow.min.js',
    //'public/js/front/jquery.fancybox.min.js',
    'public/js/front/bootstrap-notify.min.js',
], 'public/js/front/all.js');

