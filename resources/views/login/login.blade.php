<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Repositorio</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
    @include('components.alerts.alert')

    <!-- Enlace fuera del contenedor principal -->
    <a href="/" id="submit-link">Ir al Índisssces</a>

    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form method="POST" action="{{ route('login') }}" id="login-form">
                @csrf
                <h1>Iniciar Sesión</h1>
                <div class="password-container">
                    <input type="text" name="username" placeholder="Usuario" required />
                    <span class="toggle-password" toggle="#login-password"><i class="fas fa-user"></i></span>
                </div>
                <div class="password-container">
                    <input type="password" name="password" placeholder="Contraseña" required id="login-password" />
                    <span class="toggle-password" toggle="#login-password"><i class="fas fa-eye"></i></span>
                </div>
                <button type="submit">Iniciar Sesión</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>¡BIENVENIDO!</h1>
                    <h3>Repositorio Institucional</h3>
                    <img src="{{ asset('images/logocsr.png') }}" alt="Logo Carlos Salazar Romero" class="logo">
                    <h3>"Carlos Salazar Romero"</h3>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/login.js') }}"></script>

    @if ($errors->any())
        <script>
            const errors = @json($errors->all());

            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });

            errors.forEach(error => {
                Toast.fire({
                    icon: "error",
                    text: error
                });
            });
        </script>
    @endif

</body>

</html>
