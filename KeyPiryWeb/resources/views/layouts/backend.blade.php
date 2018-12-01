<!doctype html>
<html class="fixed sidebar-left-xs">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>@yield("pageTitle") - KeyPiry Admin Paneli </title>
    <meta name="keywords" content="Keypiry"/>
    <meta name="description" content="Keypiry Admin Paneli">
    <meta name="author" content="Mehmet CANHOROZ">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
          rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset("assets/backend/vendor/bootstrap/css/bootstrap.css")}}"/>
    <link rel="stylesheet" href="{{asset("assets/backend/vendor/animate/animate.css")}}">

    <link rel="stylesheet" href="{{asset("assets/backend/vendor/font-awesome/css/fontawesome-all.min.css")}}"/>
    <link rel="stylesheet" href="{{asset("assets/backend/vendor/magnific-popup/magnific-popup.css")}}"/>
    <link rel="stylesheet" href="{{asset("assets/backend/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css")}}"/>

    @stack("customCss")

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset("assets/backend/css/theme.css")}}"/>

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{asset("assets/backend/css/skins/default.css")}}"/>

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{asset("assets/backend/css/custom.css")}}">

    <!-- Head Libs -->
    <script src="{{asset("assets/backend/vendor/modernizr/modernizr.js")}}"></script>

</head>
<body>
<section class="body">

    @include("backend.include.header")

    <div class="inner-wrapper">
        <!-- start: sidebar -->
        <aside id="sidebar-left" class="sidebar-left">

            <div class="sidebar-header">
                <div class="sidebar-title">
                    Navigation
                </div>
                <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed"
                     data-target="html" data-fire-event="sidebar-left-toggle">
                    <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            @include("backend.include.sidebar")

        </aside>
        <!-- end: sidebar -->

        <section role="main" class="content-body">
            <header class="page-header">
                <h2>@yield("pageTitle")</h2>

                <div class="right-wrapper text-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="/">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        @yield("pageHeaderBreadCrumbs")
                    </ol>

                    <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
                </div>
            </header>
            <!-- start: page -->
        @yield("content")
        <!-- end: page -->
        </section>
    </div>
    @include("backend.include.right_sidebar")
</section>

<!-- Vendor -->
<script src="{{asset("assets/backend/vendor/jquery/jquery.js")}}"></script>
<script src="{{asset("assets/backend/vendor/jquery-browser-mobile/jquery.browser.mobile.js")}}"></script>
<script src="{{asset("assets/backend/vendor/popper/umd/popper.min.js")}}"></script>
<script src="{{asset("assets/backend/vendor/bootstrap/js/bootstrap.js")}}"></script>
<script src="{{asset("assets/backend/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js")}}"></script>
<script src="{{asset("assets/backend/vendor/common/common.js")}}"></script>
<script src="{{asset("assets/backend/vendor/nanoscroller/nanoscroller.js")}}"></script>
<script src="{{asset("assets/backend/vendor/magnific-popup/jquery.magnific-popup.js")}}"></script>
<script src="{{asset("assets/backend/vendor/jquery-placeholder/jquery-placeholder.js")}}"></script>

@stack("customVendorJs")

<!-- Theme Base, Components and Settings -->
<script src="{{asset("assets/backend/js/theme.js")}}"></script>

<!-- Theme Custom -->
<script src="{{asset("assets/backend/js/custom.js")}}"></script>

<!-- Theme Initialization Files -->
<script src="{{asset("assets/backend/js/theme.init.js")}}"></script>


<script src="{{asset("assets/backend/vendor/sweetalert2/sweetalert2.all.min.js")}}"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>


@stack("customJs")

<script>
    for (val of document.getElementsByClassName("nav-main")[0].getElementsByTagName("li")) {

        if (val.getElementsByTagName("a")[0].href === window.location.href)
        {
            $(val).addClass("nav-active");
            $(val).parents('li').addClass("nav-active nav-expanded");
        }
    }

</script>

</body>
</html>