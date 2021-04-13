
<!DOCTYPE html>
<html>
<head>
    @include('layouts.partials.head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <img style="text-align: center;" width="25%" src="{{ asset('images/garage.png') }}">
        <a href="">Warsztat</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Logowanie</p>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                {{ __('Potwierdź swoje hasło aby przejść dalej') }}


                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Resetuj</button>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Zapomniałeś hasła?') }}
                        </a>
                @endif
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

@include('layouts.partials.scripts')
</body>
</html>
