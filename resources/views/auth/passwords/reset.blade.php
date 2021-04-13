
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
            <p class="login-box-msg">Reset hasła</p>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="input-group mb-3">
                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input id="password" type="password" placeholder="Hasło" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-key"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input id="password-confirm" placeholder="powtórz hasło" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-key"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Resetuj</button>
                    </div>
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
