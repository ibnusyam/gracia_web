<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="description" content="PT. Gracia Pharmindo Pharmaceutical Company Indonesia" />
    <meta name="keywords"
        content="PT. Gracia Pharmindo, pharmacy, Indonesia, drug, doctor, health, medical, medicine,Pharmaceutical Company" />
    <meta name="author" content="Gracia Pharmindo" />

    <title>PT. Gracia Pharmindo - The Quality You Can Trust</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <link href="{{ asset('img/favicon.ico') }}" rel="shortcut icon" type="image/png">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/css-plugin-collections.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style-main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/preloader.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/js/revolution-slider/css/settings.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/js/revolution-slider/css/layers.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/js/revolution-slider/css/navigation.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/css/colors/theme-skin-blue8.css') }}" rel="stylesheet" type="text/css">

    <script src="{{ asset('assets/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-plugin-collection.js') }}"></script>

    <script src="{{ asset('assets/js/revolution-slider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('assets/js/revolution-slider/js/jquery.themepunch.revolution.min.js') }}"></script>

</head>

<body class="has-side-panel side-panel-right fullwidth-page">

    <div id="wrapper" class="clearfix">

        <header id="header" class="header">
            <div class="header-top bg-theme-colored sm-text-center">
                <div class="container">
                    <div class="row">
                    </div>
                </div>
            </div>

            @include('welcome.partials.header')

        </header>

        <div class="main-content">
            @yield('content')
        </div>

        @include('welcome.partials.footer')

        <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    </div>

    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script type="text/javascript"
        src="{{ asset('assets/js/revolution-slider/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/js/revolution-slider/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/js/revolution-slider/js/extensions/revolution.extension.video.min.js') }}"></script>

    @stack('scripts')

</body>

</html>
