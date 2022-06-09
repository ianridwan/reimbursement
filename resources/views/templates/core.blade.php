<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Reimbursement </title>

    <!-- Bootstrap -->
    <link href="{{ url('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ url('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ url('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ url('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{ url('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ url('vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ url('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ url('build/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Reimbursement</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home</a>
                  </li>
                  <li><a href="{{ url('/reimbursement') }}"><i class="fa fa-edit"></i> Reimbursement</a>
                  </li>
                  @can('isAdmin')
                  <li><a><i class="fa fa-bar-chart-o"></i>Pengaturan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/user') }}">User</a></li>
                    </ul>
                  </li>
                  @endcan
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        @include('templates.header')

       @yield('content')

       @include('templates.footer')
      </div>
    </div>
    @yield('child-scripts')
    <!-- jQuery -->
    <script src="{{ url('vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ url('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ url('vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ url('vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js') }} -->
    <script src="{{ url('vendors/Chart.js') }}/dist/Chart.min.js') }}"></script>
    <!-- gauge.js') }} -->
    <script src="{{ url('vendors/gauge.js') }}/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ url('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <!-- <script src="{{ url('vendors/iCheck/icheck.min.js') }}"></script> -->
    <!-- Skycons -->
    <script src="{{ url('vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ url('vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ url('vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ url('vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ url('vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ url('vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ url('vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ url('vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ url('vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ url('vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ url('vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ url('vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ url('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ url('vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ url('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ url('build/js/custom.min.js') }}"></script>
	
  </body>
</html>
