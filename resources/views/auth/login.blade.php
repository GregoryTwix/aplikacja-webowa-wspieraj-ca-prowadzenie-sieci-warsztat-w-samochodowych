
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
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
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
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Zapamiętaj mnie
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Zaloguj</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="{{ route('password.request') }}">Zapomniałem hasła</a>
            </p>
            <p class="mb-0">
                <a href="{{route('register')}}" class="text-center">Zarejestruj się</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<p class="login-logo">Praca inżynierska</p>
<p class="login-logo">"Projekt i implementacja aplikacji webowej wspierającej prowadzenie sieci warsztatów samochodowych"</p>
<p class="login-logo">Michał Naji - 2021</p>
<!-- /.login-box -->

@include('layouts.partials.scripts')
</body>
</html>
