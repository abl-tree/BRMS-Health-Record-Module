<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="cache-control" content="private, max-age=0, no-cache">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="expires" content="0">
  <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
  <meta name="author" content="Lukasz Holeczek">
  <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

  <title>{{ config('app.name', 'Laravel') }}</title>

	@if(App::isLocal())
  <!-- Icons -->
	<link rel="stylesheet" href="{{ asset('/css/flag-icon.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/font-awesome.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/simple-line-icons.css') }}">

  <!-- Main styles for this application -->
	<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
	@elseif(Request::server('HTTP_X_FORWARDED_PROTO') == 'https')
  <!-- Icons -->
	<link rel="stylesheet" href="{{ secure_asset('/css/flag-icon.css') }}">
	<link rel="stylesheet" href="{{ secure_asset('/css/font-awesome.css') }}">
	<link rel="stylesheet" href="{{ secure_asset('/css/simple-line-icons.css') }}">

  <!-- Main styles for this application -->
	<link rel="stylesheet" href="{{ secure_asset('/assets/css/style.css') }}">
	@else
  <!-- Icons -->
	<link rel="stylesheet" href="{{ asset('/css/flag-icon.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/font-awesome.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/simple-line-icons.css') }}">

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
	  <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <ul class="nav navbar-nav d-md-down-none">
	    <li class="nav-item px-3">
	      <a class="nav-link" href="#">Dashboard</a>
	    </li>
	    <li class="nav-item px-3">
	      <a class="nav-link" href="#">Users</a>
	    </li>
	    <li class="nav-item px-3">
	      <a class="nav-link" href="#">Settings</a>
	    </li>
	  </ul>
	  <ul class="nav navbar-nav ml-auto">
	    <li class="nav-item d-md-down-none">
	      <a class="nav-link" href="#"><i class="icon-bell"></i><span class="badge badge-pill badge-danger">5</span></a>
	    </li>
	    <li class="nav-item d-md-down-none">
	      <a class="nav-link" href="#"><i class="icon-list"></i></a>
	    </li>
	    <li class="nav-item d-md-down-none">
	      <a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
	    </li>
	    <li class="nav-item dropdown">
	      <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
	        <img src="{{ asset('/assets/img/avatars/7.jpg') }}" class="img-avatar" alt="admin@bootstrapmaster.com">
	      </a>
	      <div class="dropdown-menu dropdown-menu-right">
	        <div class="dropdown-header text-center">
	          <strong>Account</strong>
	        </div>
	        <a class="dropdown-item" href="#"><i class="fa fa-bell-o"></i> Updates<span class="badge badge-info">42</span></a>
	        <a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> Messages<span class="badge badge-success">42</span></a>
	        <a class="dropdown-item" href="#"><i class="fa fa-tasks"></i> Tasks<span class="badge badge-danger">42</span></a>
	        <a class="dropdown-item" href="#"><i class="fa fa-comments"></i> Comments<span class="badge badge-warning">42</span></a>
	        <div class="dropdown-header text-center">
	          <strong>Settings</strong>
	        </div>
	        <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
	        <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
	        <a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Payments<span class="badge badge-secondary">42</span></a>
	        <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Projects<span class="badge badge-primary">42</span></a>
	        <div class="divider"></div>
	        <a class="dropdown-item" href="#"><i class="fa fa-shield"></i> Lock Account</a>
	        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> Logout</a>
	        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
	      </div>
	    </li>
	  </ul>
	  <button class="navbar-toggler aside-menu-toggler" type="button">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	</header>

	<div class="app-body">
		<div class="sidebar">
		  <nav class="sidebar-nav">
		    <ul class="nav">
		      <li class="nav-item">
		        <a class="nav-link" href="home"><i class="icon-speedometer"></i> Dashboard <span class="badge badge-primary">NEW</span></a>
		      </li>

		      <li class="nav-title">
		        Options
		      </li>
		      <li class="nav-item">
		        <a href="household" class="nav-link"><i class="icon-home"></i> Household</a>
		      </li>
		      <li class="nav-item">
		        <a href="account" class="nav-link"><i class="icon-user"></i> Users</a>
		      </li>
		      <li class="nav-item nav-dropdown">
		        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Pages</a>
		        <ul class="nav-dropdown-items">
		          <li class="nav-item">
		            <a class="nav-link" href="views/pages/login.html" target="_top"><i class="icon-star"></i> Login</a>
		          </li>
		          <li class="nav-item">
		            <a class="nav-link" href="views/pages/register.html" target="_top"><i class="icon-star"></i> Register</a>
		          </li>
		          <li class="nav-item">
		            <a class="nav-link" href="views/pages/404.html" target="_top"><i class="icon-star"></i> Error 404</a>
		          </li>
		          <li class="nav-item">
		            <a class="nav-link" href="views/pages/500.html" target="_top"><i class="icon-star"></i> Error 500</a>
		          </li>
		        </ul>
		      </li>
		      <li class="nav-item mt-auto">
		        <a class="nav-link nav-link-success" href="http://coreui.io" target="_top"><i class="icon-cloud-download"></i> Download CoreUI</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link nav-link-danger" href="http://coreui.io/pro/" target="_top"><i class="icon-layers"></i> Try CoreUI <strong>PRO</strong></a>
		      </li>
		    </ul>
		  </nav>
		  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
		</div>

  	@yield('content')
	</div>

  <footer class="app-footer">
    <span><a href="http://coreui.io">CoreUI</a> &copy; 2018 creativeLabs.</span>
    <span class="ml-auto">Powered by <a href="http://coreui.io">CoreUI</a></span>
  </footer>
</body>

@if(App::isLocal())
  <!-- Bootstrap and necessary plugins -->
	<script src="{{ asset('/js/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('/js/popper.js/dist/umd/popper.min.js') }}"></script>
	<script src="{{ asset('/js/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/pace-progress/pace.min.js') }}"></script>

  <!-- Plugins and scripts required by all views -->
	<script src="{{ asset('/js/chart.js/dist/Chart.min.js') }}"></script>

  <!-- CoreUI main scripts -->
	<script src="{{ asset('/assets/js/app.js') }}"></script>
@elseif(Request::server('HTTP_X_FORWARDED_PROTO') == 'https')
  <!-- Bootstrap and necessary plugins -->
	<script src="{{ secure_asset('/js/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ secure_asset('/js/popper.js/dist/umd/popper.min.js') }}"></script>
	<script src="{{ secure_asset('/js/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ secure_asset('/js/pace-progress/pace.min.js') }}"></script>

  <!-- Plugins and scripts required by all views -->
	<script src="{{ secure_asset('/js/chart.js/dist/Chart.min.js') }}"></script>

  <!-- CoreUI main scripts -->
	<script src="{{ secure_asset('/assets/js/app.js') }}"></script>
@else
  <!-- Bootstrap and necessary plugins -->
	<script src="{{ asset('/js/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('/js/popper.js/dist/umd/popper.min.js') }}"></script>
	<script src="{{ asset('/js/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/pace-progress/pace.min.js') }}"></script>

  <!-- Plugins and scripts required by all views -->
	<script src="{{ asset('/js/chart.js/dist/Chart.min.js') }}"></script>

  <!-- CoreUI main scripts -->
	<script src="{{ asset('/assets/js/app.js') }}"></script>
@endif
</html>
