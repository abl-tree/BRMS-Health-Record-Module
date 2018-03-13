<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<?php
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
	?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Barangay Mintal Record System">
  <meta name="keyword" content="Mintal Health Records">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }} | Home</title>

	@if(App::isLocal())
	<!-- Icons -->
	<link href="{{ asset('images/tab-logo.ico') }}" rel="shortcut icon"/>
	<link rel="stylesheet" href="{{ asset('/plugins/bootstrap/dist/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/flag-icon.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/font-awesome.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/simple-line-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('/plugins/dataTables.net-bs4/css/dataTables.bootstrap4.css') }}">

	<!-- Bootstrap Form Helpers -->
	<link rel="stylesheet" href="{{ asset('/plugins/bootstrap-form-helpers/css/bootstrap-formhelpers.min.css') }}" media="screen">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" media="screen">

  <!-- Main styles for this application -->
	<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
	@elseif(Request::server('HTTP_X_FORWARDED_PROTO') == 'https')
  <!-- Icons -->
	<link href="{{ secure_asset('images/tab-logo.ico') }}" rel="shortcut icon"/>
	<link rel="stylesheet" href="{{ secure_asset('/plugins/bootstrap/dist/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ secure_asset('/css/flag-icon.css') }}">
	<link rel="stylesheet" href="{{ secure_asset('/css/font-awesome.css') }}">
	<link rel="stylesheet" href="{{ secure_asset('/css/simple-line-icons.css') }}">
	<link rel="stylesheet" href="{{ secure_asset('/plugins/dataTables.net-bs4/css/dataTables.bootstrap4.css') }}">

	<!-- Bootstrap Form Helpers -->
	<link rel="stylesheet" href="{{ secure_asset('/plugins/bootstrap-form-helpers/css/bootstrap-formhelpers.min.css') }}" media="screen">

  <!-- Main styles for this application -->
	<link rel="stylesheet" href="{{ secure_asset('/assets/css/style.css') }}">
	@else
  <!-- Icons -->
	<link href="{{ asset('images/tab-logo.ico') }}" rel="shortcut icon"/>
	<link rel="stylesheet" href="{{ asset('/plugins/bootstrap/dist/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/flag-icon.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/font-awesome.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/simple-line-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('/plugins/dataTables.net-bs4/css/dataTables.bootstrap4.css') }}">

	<!-- Bootstrap Form Helpers -->
	<link rel="stylesheet" href="{{ asset('/plugins/bootstrap-form-helpers/css/bootstrap-formhelpers.min.css') }}" media="screen">

  <!-- Main styles for this application -->
	<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
	@endif

</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">

	<header class="app-header navbar">
	  <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <a class="navbar-brand" href="#"></a>
	  <button class="navbar-toggler sidebar-minimizer brand-minimizer d-md-down-none" type="button">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <ul class="nav navbar-nav ml-auto">
	    <li class="nav-item dropdown">
	      <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
	        <img src="{{ asset('/assets/img/avatars/7.jpg') }}" class="img-avatar" alt="admin@bootstrapmaster.com">
	      </a>
	      <div class="dropdown-menu dropdown-menu-right">
	        <div class="dropdown-header text-center">
	          <strong>Settings</strong>
	        </div>
	        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> Logout</a>
	        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
	      </div>
	    </li>
	  </ul>
	</header>

	<div class="app-body">
		<div class="sidebar">
		  <nav class="sidebar-nav">
		    <ul class="nav">
		      <li class="nav-item">
		        <a class="nav-link" href="home"><i class="icon-speedometer"></i> Dashboard</a>
		      </li>

		      <li class="nav-title">
		        Options
		      </li>
		      <li class="nav-item">
		        <a href="resident" class="nav-link"><i class="icon-home"></i> Resident Profile</a>
		      </li>
		      <li class="nav-item">
		        <a href="household" class="nav-link"><i class="icon-home"></i> Household</a>
		      </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Reports</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
								<a href="monthly_report" class="nav-link"><i class="icon-pie-chart"></i> Monthly</a>
              </li>
              <li class="nav-item">
                <a href="quarterly_report" class="nav-link"><i class="icon-pie-chart"></i> Quarterly</a>
              </li>
            </ul>
          </li>
		      <li class="nav-item">
		        <a href="account" class="nav-link"><i class="icon-user"></i> Users</a>
		      </li>
		    </ul>
		  </nav>
		  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
		</div>

		<!-- Main content -->
		<main class="main">

			<!-- Breadcrumb -->
			<ol class="breadcrumb">
			</ol>
  		@yield('content')
  	</main>
	</div>

  <footer class="app-footer">
    <span><a href="http://coreui.io">CoreUI</a> &copy; 2018 creativeLabs.</span>
    <span class="ml-auto">Powered by <a href="http://coreui.io">CoreUI</a></span>
  </footer>

@if(App::isLocal())
  <!-- Bootstrap and necessary plugins -->
	<script src="{{ asset('/js/jquery/dist/jquery.min.js') }}" defer></script>
	<script src="{{ asset('/js/popper.js/dist/umd/popper.min.js') }}" defer></script>
	<script src="{{ asset('/js/bootstrap/dist/js/bootstrap.min.js') }}" defer></script>
	<script src="{{ asset('/js/pace-progress/pace.min.js') }}" defer></script>

	<!-- Bootstrap Form Helpers -->
	<script src="{{ asset('/plugins/bootstrap-form-helpers/js/bootstrap-formhelpers.js') }}" defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js" defer></script>

  <!-- Plugins and scripts required by all views -->
	<script src="{{ asset('/js/chart.js/dist/Chart.min.js') }}" defer></script>
	<script src="{{ asset('/plugins/DataTables/media/js/jquery.dataTables.min.js') }}" defer></script>
	<script src="{{ asset('/plugins/dataTables.net-bs4/js/dataTables.bootstrap4.js') }}" defer></script>

  <!-- CoreUI main scripts -->
	<script src="{{ asset('/assets/js/app.js') }}" defer></script>
@elseif(Request::server('HTTP_X_FORWARDED_PROTO') == 'https')
  <!-- Bootstrap and necessary plugins -->
	<script src="{{ secure_asset('/js/jquery/dist/jquery.min.js') }}" defer></script>
	<script src="{{ secure_asset('/js/popper.js/dist/umd/popper.min.js') }}" defer></script>
	<script src="{{ secure_asset('/js/bootstrap/dist/js/bootstrap.min.js') }}" defer></script>
	<script src="{{ secure_asset('/js/pace-progress/pace.min.js') }}" defer></script>

	<!-- Bootstrap Form Helpers -->
	<script src="{{ secure_asset('/plugins/bootstrap-form-helpers/js/bootstrap-formhelpers.js') }}" defer></script>

  <!-- Plugins and scripts required by all views -->
	<script src="{{ secure_asset('/js/chart.js/dist/Chart.min.js') }}" defer></script>
	<script src="{{ secure_asset('/plugins/DataTables/media/js/jquery.dataTables.min.js') }}" defer></script>
	<script src="{{ secure_asset('/plugins/dataTables.net-bs4/js/dataTables.bootstrap4.js') }}" defer></script>

  <!-- CoreUI main scripts -->
	<script src="{{ secure_asset('/assets/js/app.js') }}" defer></script>
@else
  <!-- Bootstrap and necessary plugins -->
	<script src="{{ asset('/js/jquery/dist/jquery.min.js') }}" defer></script>
	<script src="{{ asset('/js/popper.js/dist/umd/popper.min.js') }}" defer></script>
	<script src="{{ asset('/js/bootstrap/dist/js/bootstrap.min.js') }}" defer></script>
	<script src="{{ asset('/js/pace-progress/pace.min.js') }}" defer></script>

	<!-- Bootstrap Form Helpers -->
	<script src="{{ asset('/plugins/bootstrap-form-helpers/js/bootstrap-formhelpers.js') }}" defer></script>

  <!-- Plugins and scripts required by all views -->
	<script src="{{ asset('/js/chart.js/dist/Chart.min.js') }}" defer></script>
	<script src="{{ asset('/plugins/DataTables/media/js/jquery.dataTables.min.js') }}" defer></script>
	<script src="{{ asset('/plugins/dataTables.net-bs4/js/dataTables.bootstrap4.js') }}" defer></script>

  <!-- CoreUI main scripts -->
	<script src="{{ asset('/assets/js/app.js') }}" defer></script>
@endif
</body>
</html>
