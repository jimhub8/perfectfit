<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.0.0/collection/components/icon/icon.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    {{-- <link href="{{ asset('css/template/bundle.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/template/colors.css') }}" rel="stylesheet">
    <link href="{{ asset('css/template/css-plugins-call.css') }}" rel="stylesheet">
    <link href="{{ asset('css/template/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/template/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/template/responsive.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/template/font-awesome.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/template/bootstrap.min.css') }}" rel="stylesheet">

    {{-- Slider --}}
<link rel="stylesheet" href="http://dellmat.jim/css/util.css">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('css/slider/default/default.css') }}" type="text/css"  />
<link rel="stylesheet" href="{{ asset('css/slider/light/light.css') }}" type="text/css"  />
<link rel="stylesheet" href="{{ asset('css/slider/dark/dark.css') }}" type="text/css"  />
<link rel="stylesheet" href="{{ asset('css/slider/bar/bar.css') }}" type="text/css"  />
<link rel="stylesheet" href="{{ asset('css/nivo-slider.css') }}" type="text/css"  />
<link rel="stylesheet" href="{{ asset('css/slider/style.css') }}" type="text/css"  />
    {{-- <link href="{{ asset('css/template/nivo-slider.css') }}" rel="stylesheet"> --}}
    {{-- Slider --}}

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}


</head>
<body>
    <div id="app">
        <main class="py-4" style="padding: 0 0 0 1px !important;">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/template/popper.min.js') }}" defer></script>
    <script src="{{ asset('js/template/jquery.nivo.slider.pack.js') }}" defer></script>
    <script src="{{ asset('js/template/plugins.js') }}" defer></script>
    <script src="{{ asset('js/template/main.js') }}" defer></script>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="{{ asset('js/slider/jquery.nivo.slider.js') }}" defer></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script type="text/javascript">
    $(window).load(function() {
    $('#slider').nivoSlider({
    effect: 'random',
    slices: 15,
    boxCols: 8,
    boxRows: 4,
    animSpeed: 500,
    pauseTime: 3000,
    startSlide: 0,
    directionNav: true,
    controlNav: true,
    controlNavThumbs: true,
    pauseOnHover: true,
    manualAdvance: false,
    prevText: 'Prev',
    nextText: 'Next',
    randomStart: false,
    // beforeChange: function(){},
    // afterChange: function(){},
    // slideshowEnd: function(){},
    // lastSlide: function(){},
    // afterLoad: function(){}
    });
    });
    </script>
</body>
</html>
