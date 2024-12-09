@extends('layouts.app')

@section('content')
<div class="vh-100 d-flex justify-content-center align-items-center" style="background-image: url('https://hoylecohen.com/wp-content/uploads/login-page-bg.jpg');">
    <div class="w-50 p-5">
        <div class="card shadow p-5 rounded-5">
            <div class="card-body">
                <div class="text-center mb-4">
                    <i class="display-1 fa fa-paw" aria-hidden="true"></i>
                    <h2 class="card-title">Clinica Veterinaria Ciudad Canina</h2>
                    <p class="text-muted">Iniciar Sesión</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Recordarme</label>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                    <br />
                    @if (Route::has('register'))
                        <a class="btn btn-link text-decoration-none" href="{{ route('register') }}">
                            ¿No tienes cuenta? Regístrate
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
