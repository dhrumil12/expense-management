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
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="#" class="h1">Expense Management</a>
        </div>
        <div class="card-body">
              <p class="login-box-msg">Reset Password</p>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="input-group mb-3">
                          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus placeholder="Email Address">
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
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
