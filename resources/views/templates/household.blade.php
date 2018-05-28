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

  <title>{{ config('app.name', 'Laravel') }} | Household</title>

	@if(App::isLocal())
	<!-- Icons -->
	<link href="{{ asset('images/tab-logo.ico') }}" rel="shortcut icon"/>

	<!-- App CSS -->
	<link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <!-- Main styles for this application -->
	<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
	@elseif(Request::server('HTTP_X_FORWARDED_PROTO') == 'https')
	<!-- Icons -->
	<link href="{{ secure_asset('images/tab-logo.ico') }}" rel="shortcut icon"/>

	<!-- App CSS -->
	<link rel="stylesheet" href="{{ secure_asset('/css/app.css') }}">

    <!-- Main styles for this application -->
	<link rel="stylesheet" href="{{ secure_asset('/assets/css/style.css') }}">
	@else
	<!-- Icons -->
	<link href="{{ asset('images/tab-logo.ico') }}" rel="shortcut icon"/>

	<!-- App CSS -->
	<link rel="stylesheet" href="{{ asset('/css/app.css') }}">

	<!-- Main styles for this application -->
	<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
	@endif

</head>
<body class="app">
	<header class="app-header navbar">
	  <a class="navbar-brand" href="#"></a>

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

	<div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        Republic of the Philippines
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        MUNICIPALITY/CITY/DISTRICT OF 
                        <ins>
                            @if($households[0]->district)
                            {{ $households[0]->district }}
                            @else
                            &lt;MUNICIPALITY&gt;
                            @endif
                        </ins>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        Province/City of 
                        <ins>
                            @if($households[0]->province)
                            {{ $households[0]->province }}
                            @else
                            &lt;PROVINCE&gt;
                            @endif
                        </ins>, Davao Region
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        2018 FAMILY/HOUSEHOLD PROFILE FORM
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="col-md-12">
                            BARANGAY: 
                            <ins>
                                @if($households[0]->info->brgy_id)
                                {{ $households[0]->info->brgy()->get()[0]->brgy_name }}
                                @else
                                &lt;BARANGAY&gt;
                                @endif
                            </ins>
                        </div>
                        <div class="col-md-12">
                            BARANGAY CHAIRMAN:
                            <ins>
                                @if($households[0]->info->brgy_chairman_id)
                                {{ $households[0]->info->brgy_chairman()->get()[0]->firstname." ".$households[0]->info->brgy_chairman()->get()[0]->lastname }}
                                @else
                                &lt;BARANGAY CHAIRMAN&gt;
                                @endif
                            </ins>
                        </div>
                        <div class="col-md-12">
                            COMMITTEE ON HEALTH:
                            <ins>
                                @if($households[0]->info->committee)
                                {{ $households[0]->info->committee }}
                                @else
                                &lt;COMMITTEE&gt;
                                @endif
                            </ins>
                        </div>
                        <div class="col-md-12">
                            MIDWIFE/NDP ASSIGNED:
                            <ins>
                                @if($households[0]->info->brgy_chairman_id)
                                {{ $households[0]->info->brgy_chairman()->get()[0]->firstname." ".$households[0]->info->brgy_chairman()->get()[0]->lastname }}
                                @else
                                &lt;MIDWIFE/NDP&gt;
                                @endif
                            </ins>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="col-md-12">
                            PUROK:
                            <ins>
                                @if($households[0]->info->purok_id)
                                {{ $households[0]->info->purok()->get()[0]->name }}
                                @else
                                &lt;MIDWIFE/NDP&gt;
                                @endif
                            </ins>
                        </div>
                        <div class="col-md-12">
                            DATE PROFILED:
                            <ins>
                                @if($households[0]->info->date_profiled)
                                {{ $households[0]->info->date_profiled }}
                                @else
                                &lt;MIDWIFE/NDP&gt;
                                @endif
                            </ins>
                        </div>
                        <div class="col-md-12">
                            PROFILED/INTERVIEWED BY:
                            <ins>
                                @if($households[0]->info->brgy_chairman_id)
                                {{ $households[0]->info->brgy_chairman()->get()[0]->firstname." ".$households[0]->info->brgy_chairman()->get()[0]->lastname }}
                                @else
                                &lt;MIDWIFE/NDP&gt;
                                @endif
                            </ins>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-6">
                                NHTS:
                                <ins>
                                    @if($households[0]->info->nhts_no)
                                    {{ $households[0]->info->nhts_no }}
                                    @else
                                    &lt;MIDWIFE/NDP&gt;
                                    @endif
                                </ins>
                            </div>
                            <div class="col-md-6">
                                CCT:
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                NHTS ID NO:
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                IP's:
                            </div>
                            <div class="col-md-6">
                                TRIBE:
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            NON NHTS:
                        </div>
                        <div class="row">
                            PHILHEALTH NO:
                        </div>
                        <div class="row">
                            IP ID NO:
                        </div>
                    </div>
                </div>
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td rowspan="2">Family Serial No.</td>
                                <td colspan="3">Name of Household Members</td>
                                <td rowspan="2">Relationship to the Head of the Family</td>
                                <td rowspan="2">Date of Birth and Age</td>
                                <td rowspan="2">Place of Birth</td>
                                <td rowspan="2">Sex</td>
                                <td rowspan="2">Civil Status</td>
                                <td rowspan="2">Educ. Attainment and Occupation</td>
                                <td rowspan="2">Philhealth ID Number & Date of Expiration</td>
                                <td>Health Status</td>
                                <!-- <td>WRA (15-49 Y.O.)</td>
                                <td>Child Health Status</td>
                                <td rowspan="2">Trained on Basic Life Support/First Aid</td> -->
                            </tr>
                            <tr>
                                <td>LAST NAME</td>
                                <td>FIRST NAME</td>
                                <td>MIDDLE NAME</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
	</div>

    <footer class="app-footer">
        <span><a href="http://coreui.io">CoreUI</a> &copy; 2018 creativeLabs.</span>
        <span class="ml-auto">Powered by <a href="http://coreui.io">CoreUI</a></span>
    </footer>

@if(App::isLocal())
	<!-- App JS -->
	<script src="{{ asset('/js/app.js') }}" defer></script>

  <!-- CoreUI main scripts -->
	<script src="{{ asset('/assets/js/app.js') }}" defer></script>
	<script src="{{ asset('/assets/js/views/tooltips.js') }}" defer></script>	
	<script src="{{ asset('/assets/js/moment.min.js') }}" defer></script>
	<script src="{{ asset('/assets/js/jquery.validate.min.js') }}" defer></script>
	<script src="{{ asset('/assets/js/bootstrap-datetimepicker.min.js') }}" defer></script>
	<script src="{{ asset('/assets/js/sweetalert.min.js') }}" defer></script>
	<script src="{{ asset('/plugins/bootstrap-select/js/bootstrap-select.js') }}" defer></script>
	<script src="{{ asset('/plugins/pnotify/pnotify.custom.min.js') }}" defer></script>

@elseif(Request::server('HTTP_X_FORWARDED_PROTO') == 'https')
	<!-- App JS -->
	<script src="{{ secure_asset('/js/app.js') }}" defer></script>
		
  <!-- CoreUI main scripts -->
	<script src="{{ secure_asset('/assets/js/app.js') }}" defer></script>
	<script src="{{ secure_asset('/assets/js/views/tooltips.js') }}" defer></script>
	<script src="{{ secure_asset('/assets/js/moment.min.js') }}" defer></script>
	<script src="{{ secure_asset('/assets/js/jquery.validate.min.js') }}" defer></script>
	<script src="{{ secure_asset('/assets/js/bootstrap-datetimepicker.min.js') }}" defer></script>
	<script src="{{ secure_asset('/assets/js/sweetalert.min.js') }}" defer></script>
	<script src="{{ secure_asset('/plugins/bootstrap-select-1.13.0-beta/js/bootstrap-select.min.js') }}" defer></script>
@else
	<!-- App JS -->
	<script src="{{ asset('/js/app.js') }}" defer></script>

  <!-- CoreUI main scripts -->
	<script src="{{ asset('/assets/js/app.js') }}" defer></script>
	<script src="{{ asset('/assets/js/views/tooltips.js') }}" defer></script>
	<script src="{{ asset('/assets/js/moment.min.js') }}" defer></script>
	<script src="{{ asset('/assets/js/jquery.validate.min.js') }}" defer></script>
	<script src="{{ asset('/assets/js/bootstrap-datetimepicker.min.js') }}" defer></script>
	<script src="{{ asset('/assets/js/sweetalert.min.js') }}" defer></script>
	<script src="{{ asset('/plugins/bootstrap-select-1.13.0-beta/js/bootstrap-select.min.js') }}" defer></script>
@endif
</body>
</html>
