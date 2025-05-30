@extends('components.header')

@section('title', 'Añadir Proyecto')

@section('content')

    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="/home"
                    class="inline-flex items-center text-gray-600 text-sm font-medium hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 mr-1 me-2.5 opacity-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Inicio
                </a>
            </li>


            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Añadir Proyecto</span>
                </div>
            </li>
        </ol>
    </nav>

    <section class="px-3 sm:px-2 mt-8">
        <h2 class="mb-6 text-3xl text-center font-bold text-gray-900 dark:text-white">AÑADIR PROYECTO</h2>

        <form action="/informes" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid gap-5 lg:grid-cols-3">
                <div class="w-full">
                    <label for="tipo_informe" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">TIPO
                        *</label>
                    <select name="tipo_informe" id="tipo_informe"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        <option value="" selected hidden>Seleccionar</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full hidden" id="cajaCarrera">
                    <label for="carrera" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">CARRERA
                        *</label>
                    <select name="carrera" id="carrera"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected hidden>Seleccione una carrera</option>
                        @foreach ($carreras as $carrera)
                            <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full hidden" id="cajaModulo">
                    <label for="modulo" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">MODÚLO
                        *</label>
                    <select name="modulo" id="modulo" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected hidden>Seleccione el modulo</option>
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV" class="hidden">IV</option>
                    </select>
                </div>
            </div>

            <div class="w-full">
                <label for="titulo" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">TITÚLO
                    *</label>
                <input type="text" name="titulo" id="titulo"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ingrese el título del proyecto" required>
            </div>

            <div class="w-full">
                <label for="resumen" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">RESUMEN
                    *</label>
                <textarea name="resumen" id="resumen" rows="4"
                    class="block p-3 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-600 focus:border-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Escriba el resumen..." required></textarea>
            </div>

            <div class="w-full space-y-6">
                <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-3">
                    <label for="dni" class="text-base font-medium text-gray-700">BUSCADOR :</label>
                    <div class="flex w-full md:w-auto space-x-3">
                        <input type="text" id="dni" placeholder="Ingresa el DNI del autor"
                            class="flex-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 text-sm transition duration-200 ease-in-out shadow-sm hover:shadow-md">
                        <button type="button"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg transition duration-200 ease-in-out shadow-md focus:ring-2 focus:ring-blue-700 focus:ring-opacity-50"
                            id="buscar">
                            Buscar
                        </button>
                    </div>
                </div>

                <input type="text" id="no-dar-importancia" name="no-dar-importancia" hidden>
                <label for="no-dar-importancia" class="block text-base font-medium text-gray-900">AUTORES *</label>

                <div id="autores-container"
                    class="border border-gray-300 rounded-lg p-4 h-28 overflow-y-auto relative bg-gray-50"
                    aria-live="polite" aria-relevant="additions removals">
                </div>

                <textarea id="dni-oculto" name="autores" hidden></textarea>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <div class="w-full">
                    <label for="anio" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">AÑO
                        *</label>
                    <input type="number" name="anio" id="anio"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Ingrese el año" required>
                </div>
                <div class="w-full">
                    <label for="acceso" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">ACCESO
                        *</label>
                    <select name="acceso" id="acceso"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        <option value="" selected hidden>Seleccionar</option>
                        <option value="Publico">Público</option>
                        <option value="Privado">Privado</option>
                    </select>
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <div class="w-full">
                    <label class="block mb-2 text-base font-medium text-gray-900 dark:text-white"
                        for="pdf">SELECCIONE EL INFORME *</label>
                    <input name="pdf" accept="application/pdf"
                        class="block w-full p-2 rounded-lg text-base text-gray-900 cursor-pointer border border-gray-300 bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="pdf" type="file">
                </div>
                <div class="w-full">
                    <label class="block mb-2 text-base font-medium text-gray-900 dark:text-white"
                        for="caratula">SELECCIONE LA CARATULA *</label>
                    <input name="caratula" accept="image/*" onchange="previewImage(event, '#imgPreview')"
                        class="block p-2 rounded-lg w-full text-base text-gray-900 border border-gray-300 cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="caratula" type="file" required>
                </div>
            </div>

            <div class="viewCaratula w-full mt-4 flex justify-center items-center">
                <img id="imgPreview"
                    class="max-w-xs max-h-100 object-cover rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl">
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="inline-flex items-center p-3 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    REGISTRAR <i class="fa-solid fa-plus pl-2"></i>
                </button>
            </div>
        </form>
    </section>

    <script src="{{ asset('js/form-add.js') }}"></script>
@endsection
