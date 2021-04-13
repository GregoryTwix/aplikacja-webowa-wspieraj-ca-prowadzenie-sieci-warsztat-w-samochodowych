
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
        <div class="card-body register-card-body">
            <p class="login-box-msg">Rejestracja</p>

            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Imię i nazwisko">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Email">
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
                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Hasło">
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
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Powtórz hasło">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                            <label for="agreeTerms">
                                Akceptuję regulamin
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Rejestruj</button>
                    </div>
                </div>
            </form>
            <a href="{{route('login')}}" class="text-center">Mam już konto!</a>
        </div>
    </div>
</div>

@include('layouts.partials.scripts')
</body>
</html>
