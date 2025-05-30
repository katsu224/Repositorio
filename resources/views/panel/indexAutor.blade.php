@extends('components.header')

@section('title', 'Autores')

@section('content')
    @include('components.alerts.alert')
    @include('autor.add')
    @include('autor.edit')
    @include('autor.delete')

    <nav class="flex mb-6" aria-label="Breadcrumb">
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
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Autores</span>
                </div>
            </li>
        </ol>
    </nav>

    <h2 class="mb-6 text-3xl font-bold text-center text-gray-900 dark:text-white">GESTIONAR AUTORES</h2>

      <div class="mb-5 flex flex-col lg:flex-row items-center justify-between gap-4">
        <form method="GET" class="w-full lg:w-3/4 flex items-center gap-4">
            <input type="text" name="buscador" id="buscador"
                class="w-full p-3 pl-5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                placeholder="Buscador" value="{{ request('buscador') }}">
            <button type="submit"
                class="w-32 py-3 bg-blue-700 text-white rounded-lg transition duration-150 ease-in-out hover:bg-blue-800 hover:shadow-lg">
                Buscar
            </button>
        </form>
        <a href="javascript:void(0);" data-tw-toggle="modal" data-tw-target="#add-modal"
            class="mt-4 lg:mt-0 text-white bg-green-700 rounded-lg p-3 transition duration-150 ease-in-out hover:bg-green-800 hover:shadow-lg">
            Agregar <i class="fa-solid fa-plus"></i>
        </a>
    </div>

    <div id="resultados" class="overflow-x-auto mb-6">
        <!-- Contenido dinámico de resultados -->
        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="py-3 px-5 border-b">DNI</th>
                    <th class="py-3 px-5 border-b">NOMBRES</th>
                    <th class="py-3 px-5 border-b">APELLIDOS</th>
                    <th class="py-3 px-5 border-b">ACCIONES</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 border">
                @if ($autores->isEmpty())
                    <tr>
                        <td colspan="4"
                            class="text-center text-gray-700 bg-gray-100 hover:bg-gray-200 p-4 text-lg transition-colors duration-300 shadow-md">
                            <h4>No hay datos disponibles.</h4>
                        </td>
                    </tr>
                @else
                    @foreach ($autores as $autor)
                        <tr class="hover:bg-gray-100 transition duration-200 border-b">
                            <td class="py-3 px-5 text-center">{{ $autor->dni }}</td>
                            <td class="py-3 px-5 text-center">{{ $autor->nombre }}</td>
                            <td class="py-3 px-5 text-center">{{ $autor->apellidos }}</td>
                            <td class="py-3 px-5 flex justify-center gap-1">
                                <a href="javascript:void(0);" data-tw-toggle="modal"
                                    data-tw-target="#edit-modal{{ $autor->dni }}"
                                    class="text-white bg-yellow-500 rounded-lg p-3 transition duration-150 ease-in-out hover:bg-yellow-600 hover:shadow-lg">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="javascript:void(0);" data-tw-toggle="modal"
                                    data-tw-target="#delete-modal{{ $autor->dni }}"
                                    class="text-white bg-red-500 rounded-lg p-3 transition duration-150 ease-in-out hover:bg-red-600 hover:shadow-lg">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    {{ $autores->links() }}

@endsection
