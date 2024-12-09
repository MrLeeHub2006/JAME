@extends('layouts.app')

@section('content')
<div class="vh-100 d-flex justify-content-center align-items-center" style="background-image: url('https://hoylecohen.com/wp-content/uploads/login-page-bg.jpg');">
    <div class="w-50 p-5">
        <div class="card shadow p-5 rounded-5">
            <div class="text-dark text-center mb-4">
                <i class="display-2 fa fa-paw" aria-hidden="true"></i>
                <h2>Registro Clinica Veterinaria</h2>
                <h2>Ciudad Canina</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Información del cliente -->
                    <h4 class="mb-3 text-center">Información del cliente</h4>

                    <!-- Nombre de usuario -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Usuario</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Usuario" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Correo electrónico -->
                        <div class="col-md-6">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Contraseña y Confirmación -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Contraseña</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="password-confirm" class="form-label">Confirmar Contraseña</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" required autocomplete="new-password">
                        </div>
                    </div>

                    <!-- Botón de registro -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-success w-100">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
