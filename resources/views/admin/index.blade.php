<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/select2/dist/css/select2.min.css') }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/admin/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('/admin/dist/css/skins/_all-skins.min.css') }}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet"
        href="{{ asset('/admin/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/iCheck/all.css') }}">

    <link rel="stylesheet" href="{{ asset('/admin/style.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
            <!-- jQuery 3 -->
    <script src="{{ asset('/admin/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/admin/dist/js/jquery.validate.js') }}"></script>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-blue sidebar-mini" @yield('event-js')>
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="{{ url('admincp') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">
                    <img class="d-md-none" src="{{ asset('/images/gve-logo-white.svg') }}" alt="logo" style="max-width: 100%">
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                    <img class="d-md-none" src="{{ asset('/images/gve-logo-white.svg') }}" alt="logo" style="height: 90px;margin-top: -18px;">
                </span>
            </a>

            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                {{-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a> --}}
                <div class="container-fluid">

                    <!-- /.navbar-collapse -->
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#modal-profile" style="color: black;">
                                    <!-- The user image in the navbar-->
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-custom-menu -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>
        <div class="modal fade" id="modal-profile">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="box box-primary">
                        <form class="form-profile"
                            method="POST"
                            action="{{ url('admincp/profile/update') }}"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Profile</h4>
                            </div>

                            <div class="box-body">
                                <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="control-label">Name</label>
                                    <input type="text" class="form-control" id="profile_name" name="profile_name" laceholder="Name" value="{{ Auth::user()->name }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <span class="help-block">{{ $errors->first('name') }}</span>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone" class="control-label">Contact number</label>
                                    <input type="text" class="form-control" id="profile_phone" name="profile_phone" laceholder="Contact number" value="{{ Auth::user()->phone }}">
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <span class="help-block">{{ $errors->first('phone') }}</span>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="{{ $errors->has('job_title') ? ' has-error' : '' }}">
                                    <label for="job_title" class="control-label">Job title</label>
                                    <input type="text" class="form-control" id="profile_job_title" name="profile_job_title" laceholder="Job title" value="{{ Auth::user()->job_title }}">
                                    @if ($errors->has('job_title'))
                                        <span class="help-block">
                                            <span class="help-block">{{ $errors->first('job_title') }}</span>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">Email Address</label>
                                    <input type="text" class="form-control" laceholder="Email Address" value="{{ Auth::user()->email }}" disabled>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <span class="help-block">{{ $errors->first('email') }}</span>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="control-label">Change password</label>
                                    <input type="text" class="form-control" id="profile_password" name="profile_password" laceholder="Create password" value="">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <span class="help-block">{{ $errors->first('password') }}</span>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="modal-footer" style="margin-top: 15px;">
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </form>
                        <script type="text/javascript">
                            jQuery('.form-profile').validate({
                                success: function(label) {},
                                rules: {
                                    profile_name: { required: true },
                                    profile_phone: { required: true },
                                    profile_job_title: { required: true }
                                }
                            });
                        </script>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- Full Width Column -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                @include('admin.menu')

            </section>
            <!-- /.sidebar -->
        </aside>


        <div class="content-wrapper">
            @if (session('profile'))
                <div class="alert alert-success alert-profile" style="border-radius: 0;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('profile') }}
                </div>
            @endif

            @yield('content')

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="container-fluid text-center">
                <strong>Copyright &copy; <?php echo date('Y'); ?> Madison.</strong> All rights reserved.
            </div>
            <!-- /.container -->
        </footer>
    </div>
    <!-- ./wrapper -->


    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('/admin/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('/admin/plugins/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/admin/dist/js/adminlte.min.js') }}"></script>

    <script src="{{ asset('/admin/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <!-- bootstrap datepicker -->
    <script src="{{ asset('/admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('/admin/plugins/iCheck/icheck.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('/admin/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="/admin/dist/js/demo.js"></script> -->

    <!-- InputMask -->
    <script src="{{ asset('/admin/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/admin/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('/admin/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <script>
        $(document).ready(function () {
            setTimeout(function(){
                $('.alert-profile').fadeOut( "slow" );
            }, 3000);
        })
    </script>

    @yield('script')
    @stack('js-partials')
</body>

</html>
