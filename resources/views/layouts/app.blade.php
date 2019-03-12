<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('theme/dashboard/assets/images/favicon.png') }}">
    <title>{{ config('app.name', Lang::get('titles.app')) }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('theme/dashboard/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ asset('theme/dashboard/assets/plugins/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/dashboard/assets/plugins/chartist-js/dist/chartist-init.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/dashboard/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="{{ asset('theme/dashboard/assets/plugins/c3-master/c3.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('theme/dashboard/html/css/style.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('theme/dashboard/html/css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('css')
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('partials.topNavigation')

        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('partials.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            @yield('content')
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
        </div>

        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('theme/dashboard/assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('theme/dashboard/assets/plugins/bootstrap/js/tether.min.js') }}"></script>
    <script src="{{ asset('theme/dashboard/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('theme/dashboard/html/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('theme/dashboard/html/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('theme/dashboard/html/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('theme/dashboard/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('theme/dashboard/html/js/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="{{ asset('theme/dashboard/assets/plugins/chartist-js/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('theme/dashboard/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <!--c3 JavaScript -->
    <script src="{{ asset('theme/dashboard/assets/plugins/d3/d3.min.js') }}"></script>
    <script src="{{ asset('theme/dashboard/assets/plugins/c3-master/c3.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('theme/dashboard/html/js/dashboard1.js') }}"></script>

    @yield('scripts')
</body>

</html>
