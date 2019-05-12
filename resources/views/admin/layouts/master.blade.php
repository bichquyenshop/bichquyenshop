<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bich Quyên Jewelry</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/static/components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/static/components/font-awesome/css/font-awesome.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/static/components/select2/dist/css/select2.min.css">

    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="/static/components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/static/components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/static/plugins/jquery.growl/jquery.growl.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="/static/components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/static/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @yield('header')
    <!-- Theme style -->
    <link rel="stylesheet" href="/static/css/AdminLTE.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>BQ</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Bích Quyên</b> Jewelry</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/static/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->email }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="/static/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                    <p>
                                        {{ Auth::user()->email }}
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left" >
                                        <a href="{{ route('users_edit_password', Auth::user()->id) }}" class="btn btn-default btn-flat">Đổi mật khẩu</a>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}">
                                            {{ 'Đăng xuất' }}
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->
        {!!view('admin/common/sidebar',['menu_active' => isset($menu_active) ? $menu_active : ''])!!}
        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')            
        </div>
        <!-- /.content-wrapper -->

        {{--<footer class="main-footer">--}}
            {{--<strong>Copyright &copy; 2019</strong> All rights reserved.--}}
        {{--</footer>--}}
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="/static/components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="/static/components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    {{--<script src="/static/components/select2/dist/js/select2.full.min.js"></script>--}}
    <!-- bootstrap datepicker -->
    {{--<script src="/static/components/moment/min/moment.min.js"></script>--}}
    {{--<script src="/static/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>--}}

    <!-- DataTables -->
    <script src="/static/components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/static/components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="/static/components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/static/components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/static/js/adminlte.min.js"></script>
    <script src="/static/plugins/jquery.growl/jquery.growl.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

    <!-- CK Editor -->
    {{--<script src="/static/components/ckeditor/ckeditor.js"></script>--}}
    <!-- AdminLTE for demo purposes -->
    <script src="/static/js/common.js"></script>

    @if(session('message_success'))
    <script type="text/javascript">
        $.growl.notice({title: "Success", message: "{{session('message_success')}}" });
    </script>
    @endif
    
    @yield('script')
</body>

</html>