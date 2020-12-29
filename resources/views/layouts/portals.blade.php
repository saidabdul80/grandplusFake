
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Home') }}</title>
     <!-- <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css"> -->
     <link type="text/css" rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.css') }}">
     <link type="text/css" rel="stylesheet" href="{{ asset('aos/aos.css') }}">
     <link type="text/css" rel="stylesheet" href="{{ asset('css/grandplus.css') }}">
     <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
     <link type="text/css" rel="stylesheet" href="{{ asset('css/styles.css') }}">
     <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdi-icon.css') }}" rel="stylesheet">
     <link type="text/css" rel="stylesheet" href="{{ asset('js/datepicker/datepicker.css') }}">
     <link type="text/css" rel="stylesheet" href="{{ asset('engine0/style.css') }}">
 <script src="{{ asset('aos/aos.js') }} "></script>
 <script src="{{ asset('engine0/jquery.js') }} "></script>

 <script src="{{ asset('assets/js/application.js') }} "></script>
 <script src="{{ asset('js/datepicker/datepicker.js') }}"></script>
 <style type="text/css">
    .active{
        background-color:rgba(200,200,240,.3) !important;
    }
    div.datepicker, div.datepicker--content{
        background-color: #fff !important;
    }
    .effectK{
    background:
    radial-gradient(rgba(60,20,150, .6)  3px, transparent 4px),
    radial-gradient(rgba(60,20,150, .6)  3px, transparent 4px),
    linear-gradient(#fff 4px, transparent 0),
    linear-gradient(45deg, transparent 74px, transparent 75px, rgba(60,20,150, .6)   75px, rgba(60,20,150, .6)   76px, transparent 77px, transparent 109px),
    linear-gradient(-45deg, transparent 75px, transparent 76px, rgba(60,20,150, .6)  76px, rgba(60,20,150, .6)   77px, transparent 78px, transparent 109px),
    #fff;
    background-size: 109px 109px, 109px 109px,100% 6px, 109px 109px, 109px 109px;
    background-position: 54px 55px, 0px 0px, 0px 0px, 0px 0px, 0px 0px;
}
 </style>
</head>
<body>
    <div  @if(session('portals')) class="effectK" @endif>
        
    
<div  class="mx-auto shadow bg-white" style="width: 80%; height: 100% !important;">

    <div class="mx-3" style="border-left: 1px  solid #2064a8; border-right: 1px  solid #2064a8;">
                
     @include('layouts.portal_header')
     <div class="row px-4 page-body">
        @yield('page-body')
     </div>
     @include('layouts.footer')
    </div>
            
</div>
 <!-- <script src="{{ asset('js/jquery-1.11.3.min.js') }} "></script> -->
 <script src="{{ asset('js/bootstrap.min.js') }} "></script>


@yield('js')

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '.dropdown-menu', function (e) {
          e.stopPropagation();
        });

    AOS.init();
    
    })
        function unveil(a) {
            window.location.href = '#'+a;
            $('.department-cards').slideUp(200);
            $('.rel').removeClass('fa-minus');
            $('#rel'+a).addClass('fa-minus');
            $('#'+a).slideToggle(200);
        }
        function slideToggleA(a){
            $(a).slideToggle(200);
        }
        $('#my-date').datepicker({
            language: 'en',
            dateFormat:'yyyy-mm-dd'
        });
</script>
    
 <!--    
     
     <script src="{{ asset('js/app.js') }} "></script> -->

     <!-- @yield('scripts') -->
</div>
</body>
</html>
