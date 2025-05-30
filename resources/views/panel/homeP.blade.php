@extends('components.header')
@section('title', 'Inicio')
@section('content')
    <nav class="flex mb-5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 mr-1 me-2.5 opacity-60" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Inicio</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="grid grid-cols-1 gap-x-6 gap-y-4 lg:grid-cols-12">
        <a href="/informes" class="col-span-12 sm:col-span-6 xl:col-span-4">
            <div class="p-5 bg-blue-500 rounded-lg shadow-lg transition duration-300 transform hover:scale-105">
                <h5 class="mb-3 text-white" style="font-size:1rem;"><i class="mr-3 mdi mdi-folder-open text-lg"></i>Gestionar Proyectos</h5>
            </div>
        </a>

        <a href="/informes/publications" class="col-span-12 sm:col-span-6 xl:col-span-4">
            <div class="p-5 bg-red-600 rounded-lg shadow-lg transition duration-300 transform hover:scale-105">
                <h5 class="mb-3 text-white" style="font-size:1rem;"><i class="mr-3 mdi mdi-upload text-lg"></i>Publicaciones</h5>
            </div>
        </a>

        <a href="/autor" class="col-span-12 sm:col-span-6 xl:col-span-4">
            <div class="p-5 bg-yellow-500 rounded-lg shadow-lg transition duration-300 transform hover:scale-105">
                <h5 class="mb-3 text-white" style="font-size:1rem;"><i class="mr-3 mdi mdi-account text-lg"></i>Autores</h5>
            </div>
        </a>

        <a href="/informes/add" class="col-span-12 sm:col-span-6 xl:col-span-4">
            <div class="p-5 bg-green-600 rounded-lg shadow-lg transition duration-300 transform hover:scale-105">
                <h5 class="mb-3 text-white" style="font-size:1rem;"><i class="mr-3 mdi mdi-file-plus text-lg"></i>Añadir Proyecto</h5>
            </div>
        </a>

        <a href="#" class="col-span-12 sm:col-span-6 xl:col-span-4">
            <div class="p-5 bg-orange-500 rounded-lg shadow-lg transition duration-300 transform hover:scale-105">
                <h5 class="mb-3 text-white" style="font-size:1rem;"><i class="mr-3 mdi mdi-book-open text-lg"></i>Manual</h5>
            </div>
        </a>
    </div>
@endsection
