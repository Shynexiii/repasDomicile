@extends('layouts.auth')

@section('title',"S'enregistrer")
@section('class_css','register')

@section('content')
<div class="register-box">
    <div class="card card-outline card-secondary">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Register a new membership</p>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                        value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Nom">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                        value="{{ old('first_name') }}" required autocomplete="first_name" autofocus
                        placeholder="Prénom">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
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
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        required autocomplete="new-password" placeholder="Password">
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
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div> --}}

                    <div class="col">
                        <button type="submit" class="btn btn-outline-secondary btn-block">Register</button>
                    </div>

                </div>
            </form>
            <div class="mt-2">
                Vous avez déjà un compte ? <a href=" {{ route('login') }}">Connectez-vous.</a>
            </div>
        </div>

    </div>
</div>

@endsection
