@extends('components.header')

@section('title', 'Proyecto ' . $id->id)

@section('content')

    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse flex-wrap gap-y-2">
            <li class="inline-flex items-center">
                <a href="/home"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 mr-1 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Inicio
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="/informes/add"
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Añadir
                        Proyecto</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9    4-4-4-4" />
                    </svg>
                    <a href="/informes"
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Proyectos</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Proyecto
                        {{ $id->id }}</span>
                </div>
            </li>
        </ol>
    </nav>

    <section class="px-3 mt-8">
        <h2 class="mb-6 text-2xl text-center font-bold text-gray-900 dark:text-white">Administrar Proyecto :
            {{ $id->id }}
        </h2>

        <form action="/informes/{{ $id->id }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid gap-5 lg:grid-cols-3">
                <div class="w-full">
                    <label for="tipo_informe" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">TIPO
                        *</label>
                    <select name="tipo_informe" id="tipo_informe"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected hidden>Seleccionar</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{ $tipo->id }}"
                                {{ isset($id) && $id->tipo_informe_id == $tipo->id ? 'selected' : '' }}>
                                {{ $tipo->nombre }}
                            </option>
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
                            <option value="{{ $carrera->id }}"
                                {{ isset($id) && $id->carrera_id == $carrera->id ? 'selected' : '' }}>
                                {{ $carrera->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full hidden" id="cajaModulo">
                    <label for="modulo" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">MODÚLO
                        *</label>
                    <select name="modulo" id="modulo"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected hidden>Seleccione el modulo</option>
                        <option value="I" {{ $id->modulo === 'I' ? 'selected' : '' }}>I</option>
                        <option value="II" {{ $id->modulo === 'II' ? 'selected' : '' }}>II</option>
                        <option value="III" {{ $id->modulo === 'III' ? 'selected' : '' }}>III</option>
                        <option value="IV" {{ $id->modulo === 'IV' ? 'selected' : '' }} class="hidden">IV</option>
                    </select>
                </div>
            </div>
            <div class="w-full">
                <label for="titulo" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">TITÚLO
                    *</label>
                <input type="text" name="titulo" id="titulo" value="{{ $id->titulo }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ingrese el título del proyecto">
            </div>

            <div class="w-full">
                <label for="resumen" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">RESUMEN
                    *</label>
                <textarea id="resumen" name="resumen" rows="4"
                    class="block p-3 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-600 focus:border-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Escriba el resumen...">{{ $id->resumen }}</textarea>
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
                    class="border border-gray-300 rounded-lg p-3 mb-4 h-40 overflow-y-auto relative bg-gray-50">
                </div>
                <textarea id="dni-oculto" name="autores" hidden></textarea>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <div class="w-full">
                    <label for="anio" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">AÑO
                        *</label>
                    <input type="number" name="anio" id="anio" value="{{ $id->anio }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Ingrese el año">
                </div>

                <div class="w-full">
                    <label for="acceso" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">ACCESO
                        *</label>
                    <select name="acceso" id="acceso"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected hidden>Seleccione el Acceso</option>
                        <option value="Publico" {{ $id->acceso === 'Publico' ? 'selected' : '' }}>Publico</option>
                        <option value="Privado" {{ $id->acceso === 'Privado' ? 'selected' : '' }}>Privado</option>
                    </select>
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <div class="w-full">
                    <label class="block mb-2 text-base font-medium text-gray-900 dark:text-white"
                        for="caratula">SELECCIONE EL INFORME *</label>
                    <input name="pdf"
                        class="block w-full p-2 text-base text-gray-900 border rounded-lg cursor-pointer border-gray-300 bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="pdf" id="pdf" type="file">
                    <div class="flex justify-center mt-4">
                        <a href="{{ asset('storage/pdfs/' . $id->ruta_pdf) }}" id="ver-pdf" target="_blank"
                            class="text-blue-600 hover:text-blue-800">
                            Ver PDF
                        </a>
                    </div>
                </div>
                <div class="w-full">
                    <label class="block mb-2 text-base font-medium text-gray-900 dark:text-white"
                        for="caratula">SELECCIONE LA CARATULA *</label>
                    <input accept="image/*" name="caratula" onchange="previewImage(event, '#imgPreview')"
                        class="block w-full p-2 text-base text-gray-900 border rounded-lg cursor-pointer border-gray-300 bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="caratula" id="caratula" type="file">
                    <div
                        class="viewCaratula w-full
                    {{ $id->ruta_caratula ? '' : 'hidden' }} mt-4 flex justify-center items-center">
                        <img id="imgPreview"
                            src="{{ $id->ruta_caratula ? asset('storage/caratulas/' . $id->ruta_caratula) : '' }}"
                            class="max-w-xs max-h-100 object-cover rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl">
                    </div>
                </div>
            </div>

            <div class="flex justify-center space-x-4">
                <button type="submit"
                    class="inline-flex items-center p-3 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    ACTUALIZAR
                </button>
                <button type="button" onclick="window.location.href='/informes'"
                    class="inline-flex items-center p-3 text-sm font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:bg-gray-500 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                    CANCELAR
                </button>
            </div>
        </form>
    </section>

    @include('components.js-edit-form')
@endsection
