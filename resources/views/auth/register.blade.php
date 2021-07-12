<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{!! asset('assets/plugins/fontawesome-free/css/all.min.css') !!}">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="{!! asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!}">
<!-- Theme style -->
<link rel="stylesheet" href="{!! asset('assets/dist/css/adminlte.min.css') !!}">

<body class="hold-transition login-page">


<div class="register-box">
<div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1">Expense Management</a>
    </div>
<div class="card-body">
  <p class="login-box-msg">Register a new member</p>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-group mb-3">
                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                  @if ($errors->has('name'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="input-group mb-3">
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required  placeholder="Email">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                  @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="input-group mb-3">
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="input-group mb-3">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required  placeholder="Confirm Password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
                <div class="row">
                    <a class="btn btn-link" href="{{ route('login') }}">
                        {{ __('Sign In') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{!! asset('assets/plugins/jquery/jquery.min.js') !!}"></script>
<!-- Bootstrap 4 -->
<script src="{!! asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('assets/dist/js/adminlte.min.js') !!}"></script>
</body>
</html>
