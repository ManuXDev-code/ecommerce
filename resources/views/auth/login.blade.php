@php
$ajuste = \App\Models\Ajuste::first();
$imagen_login = ($ajuste && !empty($ajuste->imagen_login)) ? 'storage/' . $ajuste->imagen_login : null;
@endphp

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ $ajuste->nombre ?? env('APP_NAME') }}</title>
    <link rel="shortcut icon" href="{{ asset('./assets/compiled/sv/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('./assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/compiled/css/auth.css') }}">
</head>

<body style="background-color: #f3f4f6;">

    <div class="row h-100">
        <!-- Columna izquierda (Formulario de Login) -->
        <div class="col-lg-5 col-12 d-flex justify-content-center align-items-center">
            <div class="auth-form p-4" style="width: 100%; max-width: 400px; background-color: white; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="auth-logo text-center mb-4">
                    @if ($ajuste)
                        <img src="{{ asset('storage/'.$ajuste->logo) }}" style="width: 100px" alt="Logo">
                    @else
                        <img src="{{ asset('./assets/compiled/svg/logo.svg') }}" alt="Logo">
                    @endif
                </div>
                <h1 class="auth-title text-center mb-3">{{ $ajuste->nombre ?? env('APP_NAME') }}</h1>
                <p class="auth-subtitle text-center mb-4">Ingreso al sistema</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group position-relative has-icon-left mb-4">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo electrónico">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>

                    <div class="form-group position-relative has-icon-left mb-4">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>

                    <div class="form-check form-check-lg d-flex align-items-center mb-4">
                        <input type="checkbox" class="form-check-input me-2" value="" id="flexCheckDefault">
                        <label class="form-check-label text-gray-600" for="flexCheckDefault">
                            Mantenerme conectado
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-4">Acceso</button>
                </form>

                <div class="text-center mt-4 text-lg fs-6">
                    <p class="text-gray-600">¿No tienes una cuenta? <a href="{{ route('register') }}" class="font-bold">Regístrate</a></p>
                    <p><a class="font-bold" href="{{ route('password.request') }}">¿Has olvidado tu contraseña?</a></p>
                </div>
            </div>
        </div>

        <!-- Columna derecha (Imagen de fondo) -->
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right" style="background-image: url('{{ asset($imagen_login) }}'); background-size: cover; background-position: center; height: 100%; width: 100%; border-top-right-radius: 10px; border-bottom-right-radius: 10px;"></div>
        </div>
    </div>

    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
</body>

</html>