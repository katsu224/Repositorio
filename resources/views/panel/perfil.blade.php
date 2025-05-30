@extends('components.header')

@section('title', 'Perfil')

@section('content')
    @include('components.alerts.alert')

    <div class="container mx-auto mt-5">
        <div class="bg-white shadow-lg border border-gray-300 rounded-lg overflow-hidden mx-auto lg:w-2/3 xl:w-1/2">
            <div class="bg-gradient-to-r from-gray-800 to-gray-600 p-6 text-white">
                <div class="flex flex-col items-center mb-6">
                    <img class="w-32 h-32 rounded-full border-4 border-white mb-4 shadow-lg object-cover"
                        src="{{ asset('storage/profile/' . Auth::user()->profile_photo) }}" alt="Foto de Perfil">

                    <h2 class="text-3xl font-semibold">{{ Auth::user()->username }}</h2>
                    <p class="text-xl mt-1">{{ Auth::user()->full_name }}</p>
                </div>
            </div>

            <div class="p-8 bg-gray-100">
                <h3 class="text-2xl font-semibold text-gray-800 mt-6 mb-4">Cambiar Contraseña</h3>
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4">
                        <!-- Contraseña Actual -->
                        <div class="relative">
                            <label for="current_password" class="block text-gray-700">Contraseña Actual</label>
                            <input type="password" name="current_password"
                                class="mt-1 block w-full border border-gray-300 rounded-lg p-4 focus:border-gray-600 focus:ring focus:ring-gray-400 transition duration-150 ease-in-out"
                                placeholder="Contraseña Actual" required id="current_password">
                            <!-- Icono para mostrar/ocultar contraseña -->
                            <span id="toggleCurrentPassword"
                                class="absolute right-5 top-11 transform  cursor-pointer text-xl"> <i
                                    class="fas fa-eye"></i>
                            </span>
                        </div>

                        <!-- Nueva Contraseña -->
                        <div class="relative">
                            <label for="new_password" class="block text-gray-700">Nueva Contraseña:</label>
                            <input type="password" name="password"
                                class="mt-1 block w-full border border-gray-300 rounded-lg p-4 focus:border-gray-600 focus:ring focus:ring-gray-400 transition duration-150 ease-in-out"
                                placeholder="Nueva Contraseña" required id="new_password">
                            <span id="toggleNewPassword" class="absolute right-5 top-11 transform  cursor-pointer text-xl">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>

                        <!-- Confirmar Nueva Contraseña -->
                        <div class="relative">
                            <label for="confirm_password" class="block text-gray-700">Confirmar Contraseña:</label>
                            <input type="password" name="password_confirmation"
                                class="mt-1 block w-full border border-gray-300 rounded-lg p-4 focus:border-gray-600 focus:ring focus:ring-gray-400 transition duration-150 ease-in-out"
                                placeholder="Confirmar Contraseña" required id="confirm_password">
                            <!-- Icono para mostrar/ocultar contraseña -->
                            <span id="toggleConfirmPassword"
                                class="absolute right-5 top-11 transform  cursor-pointer text-xl">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>

                    <button type="submit"
                        class="mt-6 w-full px-6 py-3 bg-gray-700 text-white font-semibold rounded-lg shadow-md hover:bg-gray-800 transition duration-150 ease-in-out">
                        Guardar Cambios
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Función para alternar la visibilidad de las contraseñas
        function togglePasswordVisibility(inputId, toggleId) {
            var passwordField = document.getElementById(inputId);
            var icon = document.getElementById(toggleId).querySelector('i');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Agregar los eventos de clic para cada campo de contraseña
        document.getElementById('toggleCurrentPassword').addEventListener('click', function() {
            togglePasswordVisibility('current_password', 'toggleCurrentPassword');
        });

        document.getElementById('toggleNewPassword').addEventListener('click', function() {
            togglePasswordVisibility('new_password', 'toggleNewPassword');
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            togglePasswordVisibility('confirm_password', 'toggleConfirmPassword');
        });
    </script>
@endsection
