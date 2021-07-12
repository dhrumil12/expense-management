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
              <p class="login-box-msg">Sign In</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf


                <div class="input-group mb-3">
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus  placeholder="Email">
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
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required  placeholder="Password">
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

                <div class="row">
                  <div class="col-8">
                    <div class="icheck-primary">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label for="remember">
                        {{ __('Remember Me') }}
                      </label>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                  </div>
                  <!-- /.col -->
                </div>
                <div class="row">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
                <div class="row">
                    <a class="btn btn-link" href="{{ route('register') }}">
                        {{ __('Sign Up') }}
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
