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

	<!-- App CSS -->
	<link rel="stylesheet" href="{{ asset('/css/app.css') }}">

  <!-- Main styles for this application -->
	<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
	<link rel="stylesheet" href="https://www.jqueryscript.net/demo/Bootstrap-4-Dropdown-Select-Plugin-jQuery/dist/css/bootstrap-select.css">
	@elseif(Request::server('HTTP_X_FORWARDED_PROTO') == 'https')
	<!-- Icons -->
	<link href="{{ secure_asset('images/tab-logo.ico') }}" rel="shortcut icon"/>

	<!-- App CSS -->
	<link rel="stylesheet" href="{{ secure_asset('/css/app.css') }}">

  <!-- Main styles for this application -->
	<link rel="stylesheet" href="{{ secure_asset('/assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ secure_asset('/plugins/bootstrap-select-1.13.0-beta/css/bootstrap-select.min.css') }}">
	@else
	<!-- Icons -->
	<link href="{{ asset('images/tab-logo.ico') }}" rel="shortcut icon"/>

	<!-- App CSS -->
	<link rel="stylesheet" href="{{ asset('/css/app.css') }}">

  <!-- Main styles for this application -->
	<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('/plugins/bootstrap-select-1.13.0-beta/css/bootstrap-select.min.css') }}">
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
	<!-- App JS -->
	<script src="{{ asset('/js/app.js') }}"></script>
	
  <!-- CoreUI main scripts -->
	<script src="{{ asset('/assets/js/app.js') }}"></script>
	<script src="{{ asset('/assets/js/views/tooltips.js') }}"></script>
	<script src="https://www.jqueryscript.net/demo/Bootstrap-4-Dropdown-Select-Plugin-jQuery/dist/js/bootstrap-select.js"></script>
@elseif(Request::server('HTTP_X_FORWARDED_PROTO') == 'https')
	<!-- App JS -->
	<script src="{{ secure_asset('/js/app.js') }}" defer></script>
		
  <!-- CoreUI main scripts -->
	<script src="{{ secure_asset('/assets/js/app.js') }}" defer></script>
	<script src="{{ secure_asset('/assets/js/views/tooltips.js') }}" defer></script>
	<script src="{{ secure_asset('/plugins/bootstrap-select-1.13.0-beta/js/bootstrap-select.min.js') }}"></script>
@else
	<!-- App JS -->
	<script src="{{ asset('/js/app.js') }}" defer></script>
	
  <!-- CoreUI main scripts -->
	<script src="{{ asset('/assets/js/app.js') }}" defer></script>
	<script src="{{ asset('/assets/js/views/tooltips.js') }}" defer></script>
	<script src="{{ asset('/plugins/bootstrap-select-1.13.0-beta/js/bootstrap-select.min.js') }}"></script>
@endif
</body>
</html>
