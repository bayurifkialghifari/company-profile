@php
    
    use App\Core\Request;
    use App\Models\Websites;

    $websites = Websites::all();
@endphp
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@foreach($websites as $w) 
        @if($w['name'] == 'website_name')
            {{ $w['content'] }}
        @endif
    @endforeach | {{ isset($title) ? $title : '' }} </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="{{ base_url }}assets/admin/img/favicon.ico"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link type="text/css" rel="stylesheet" href="{{ base_url }}assets/admin/css/app.css"/>
    <!-- end of global css -->
    <!--page level css -->
    <link rel="stylesheet" type="text/css" href="{{ base_url }}assets/admin/vendors/datatables/css/dataTables.bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="{{ base_url }}assets/admin/vendors/datatables/css/buttons.bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="{{ base_url }}assets/admin/vendors/datatables/css/colReorder.bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="{{ base_url }}assets/admin/vendors/datatables/css/dataTables.bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="{{ base_url }}assets/admin/vendors/datatables/css/rowReorder.bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="{{ base_url }}assets/admin/vendors/datatables/css/buttons.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ base_url }}assets/admin/vendors/datatables/css/scroller.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ base_url }}assets/admin/css/custom.css">
    <link rel="stylesheet" href="{{ base_url }}assets/admin/css/custom_css/skins/skin-default.css" type="text/css" id="skin"/>
    <!--end of page level css-->
    <!-- global js -->
    <script src="{{ base_url }}assets/admin/js/app.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <script type="text/javascript" src="{{ base_url }}assets/admin/vendors/datatables/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{{ base_url }}assets/admin/vendors/datatables/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="{{ base_url }}assets/admin/vendors/datatables/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="{{ base_url }}assets/admin/vendors/datatables/js/dataTables.colReorder.js"></script>
    <script type="text/javascript" src="{{ base_url }}assets/admin/vendors/datatables/js/dataTables.responsive.js"></script>
    <script type="text/javascript" src="{{ base_url }}assets/admin/vendors/datatables/js/dataTables.rowReorder.js"></script>
    <script type="text/javascript" src="{{ base_url }}assets/admin/vendors/datatables/js/buttons.colVis.js"></script>
    <script type="text/javascript" src="{{ base_url }}assets/admin/vendors/datatables/js/buttons.html5.js"></script>
    <script type="text/javascript" src="{{ base_url }}assets/admin/vendors/datatables/js/buttons.bootstrap.js"></script>
    <script type="text/javascript" src="{{ base_url }}assets/admin/vendors/datatables/js/buttons.print.js"></script>
    <script type="text/javascript" src="{{ base_url }}assets/admin/vendors/datatables/js/dataTables.scroller.js"></script>
    <script src="{{ base_url }}assets/admin/js/custom_js/advanced_datatables.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{ base_url }}assets/admin/vendors/sweetalert2/css/sweetalert2.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{ base_url }}assets/admin/css/custom_css/sweet_alert2.css">
    <script type="text/javascript" src="{{ base_url }}assets/admin/vendors/sweetalert2/js/sweetalert2.min.js"></script>
    <!-- end of page level js -->
</head>

<body class="skin-default">
<div class="preloader">
    <div class="loader_img"><img src="{{ base_url }}assets/admin/img/loader.gif" alt="loading..." height="64" width="64"></div>
</div>
<!-- header logo: style can be found in header-->
<header class="header">
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="{{ base_url }}admin/dashboard/" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <img src="{{ base_url }}assets/admin/img/logo.png" alt="logo"/>
        </a>
        <!-- Header Navbar: style can be found in header-->
        <!-- Sidebar toggle button-->
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                    class="fa fa-fw ti-menu"></i>
            </a>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown-->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle padding-user" data-toggle="dropdown">
                        <img src="{{ base_url }}assets/admin/img/authors/avatar1.jpg" width="35" class="img-circle img-responsive pull-left"
                             height="35" alt="User Image">
                        <div class="riot">
                            <div>
                                {{ Request::sess('nama') }}
                                <span>
                                        <i class="caret"></i>
                                    </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ base_url }}assets/admin/img/authors/avatar1.jpg" class="img-circle" alt="User Image">
                            <p> {{ Request::sess('nama') }}</p>
                        </li>
                        <!-- Menu Body -->
                        <li class="p-t-3">
                            <a href="#" id="logout">
                                <i class="fa fa-fw ti-shift-right"></i>
                                <b>Logout</b>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    @include('admin.partials._sidebar')

    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ isset($title) ? $title : '' }}
            </h1>
            <ol class="breadcrumb">
                @if(isset($breadcrumb_1) AND $breadcrumb_1 !== null)
                    <li><a href="{{ $breadcrumb_1_url }}">{{ $breadcrumb_1 }}</a></li>
                @endif
                @if(isset($breadcrumb_2) AND $breadcrumb_2 !== null)
                    <li><a href="{{ $breadcrumb_2_url }}">{{ $breadcrumb_2 }}</a></li>
                @endif
                @if(isset($breadcrumb_3) AND $breadcrumb_3 !== null)
                    <li><a href="{{ $breadcrumb_3_url }}">{{ $breadcrumb_3 }}</a></li>
                @endif
                @if(isset($breadcrumb_4) AND $breadcrumb_4 !== null)
                    <li><a href="{{ $breadcrumb_4_url }}">{{ $breadcrumb_4 }}</a></li>
                @endif
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- row-->
            @yield('content')
            <div class="background-overlay"></div>
        </section>
    </aside>
</div>
<!-- wrapper-->

<script type="text/javascript">
    $('#logout').on('click', ev =>
    {
        ev.preventDefault()

        swal({
            title: 'Apakah anda yakin?',
            text: "Data yang telah anda ubah tidak akan tersimpan!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#66cc99',
            cancelButtonColor: '#ff6666',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger'
        }).then(function () {
            location.href = '{{ base_url }}logout'
        }, function (dismiss) {
            // dismiss can be 'cancel', 'overlay',
            // 'close', and 'timer'
        })
    })

    $(window).on('load', function () {
        $('.preloader img').fadeOut();
        $('.preloader').fadeOut();
    });
</script>
</body>
</html>
