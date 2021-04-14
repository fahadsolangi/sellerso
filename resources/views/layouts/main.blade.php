<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Any config settings you want to fetch you will get in $config array, -->
    <?php //echo $config['COMPANY']; ?>
    <title>{{isset($title)?$title:''}}</title>
    <link rel="icon" type="image/png" href="{{asset(isset($favicon)?$favicon:'')}}">
    <link rel="icon" type="image/jpg" href="{{asset(isset($favicon)?$favicon:'')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.links')
    @yield('css')
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <?php
        //dd(request()->route()->getAction()['as']);
        $header = request()->route()->getAction()['as'];
        // dd($header);
    ?>
    @if($header == 'home' || $header == 'listapp')
        <body class="bg-patteren">
    @else
        <body class="bg-patteren inner-page">               
    @endif
    <input type="hidden" id="web_base_url" value="{{url('/')}}"/>    
        @if($header == 'home' || $header == 'listapp')
            @include('layouts.header')    
        @else
            @include('layouts.header2')    
        @endif
    @yield('content')
    @include('layouts.footer')
    @include('layouts.scripts')
    @yield('js')
    @include('layouts.errorhandler')
    @include('adminiy.core.editor')

  </body>
  <script type="text/javascript">
  $(document).ready(function(){
    $(".filters").click(function(){
        $("#prodfilere").submit();
    });
  })
</script>
</html>