<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="cache-control" content="private, max-age=0, no-cache">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="expires" content="0">
  <meta name="description" content="Barangay Mintal Record System">
  <meta name="keyword" content="Mintal Health Records">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name') }} | Login</title>

  @if(App::isLocal())
  <!-- Icons -->
	<link href="{{ asset('images/tab-logo.ico') }}" rel="shortcut icon"/>
  <link rel="stylesheet" href="{{ asset('/css/flag-icon.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/simple-line-icons.css') }}">

  <!-- Main styles for this application -->
  <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
  @elseif(Request::server('HTTP_X_FORWARDED_PROTO') == 'https')
  <!-- Icons -->
	<link href="{{ secure_asset('images/tab-logo.ico') }}" rel="shortcut icon"/>
  <link rel="stylesheet" href="{{ secure_asset('/css/flag-icon.min.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('/css/simple-line-icons.css') }}">

  <!-- Main styles for this application -->
  <link rel="stylesheet" href="{{ secure_asset('/assets/css/style.css') }}">
  @else
  <!-- Icons -->
	<link href="{{ asset('images/tab-logo.ico') }}" rel="shortcut icon"/>
  <link rel="stylesheet" href="{{ asset('/css/flag-icon.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/simple-line-icons.css') }}">

  <!-- Main styles for this application -->
  <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
  @endif

</head>
<body class="app flex-row align-items-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card-group">
          <div class="card p-4">            
            <form  method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-user"></i></span>
                  </div>
                  <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Username" required>
                </div>
                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-lock"></i></span>
                  </div>
                  <input type="password" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                  @if ($errors->has('username'))
                  <div class="invalid-feedback">
                  <strong>{{ $errors->first('username') }}</strong>
                      </div>
                @endif    
                </div>
                <div class="row">
                  <div class="col-6">
                    <button type="submit" class="btn btn-primary px-4">Login</button>
                  </div>
                  <div class="col-6 text-right">
                    <button type="button" class="btn btn-link px-0">Forgot password?</button>
                  </div>
                </div>
              </div>              
            </form>
          </div>
          <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
            <div>
              <img src="{{ asset('/images/brgy-health-records-logo.png') }}" class="img-fluid" alt="logo">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
  @if(App::isLocal())
  <!-- Bootstrap and necessary plugins -->
  <script src="{{ asset('/js/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('/js/popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('/js/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  @elseif(Request::server('HTTP_X_FORWARDED_PROTO') == 'https')
  <!-- Bootstrap and necessary plugins -->
  <script src="{{ secure_asset('/js/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ secure_asset('/js/popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ secure_asset('/js/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  @else
  <!-- Bootstrap and necessary plugins -->
  <script src="{{ asset('/js/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('/js/popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('/js/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  @endif
</html>
