<x-app-main title="Informe de Practicas">
    <div class="bg-black">
        <x-breadcrumb name="practicas.index"></x-breadcrumb>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-4 w-full gap-2 sm:gap-4">

        {{-- Columna izquierda --}}
        <div class="container hidden md:block">
           <x-filter></x-filter>
        </div>
        {{-- Columna derecha --}}
        <div class="md:col-span-3 flex flex-col w-full px-4">

            <!-- Sección de búsqueda -->
            <h3 class="text-3xl font-semibold py-2">Buscars</h3>
            <x-search
                :parametro="'institucional'"
                :parametro2="'index'"
                :descrip="'Buscar en todo el repositorio'"
            />
            <x-count :contador="$contador" :paginator="$practicas" />
            <div class="w-full flex justify-end py-2">
                <x-advanced-filter route="practicas.index" defaultSort="asc" defaultItemsPerPage="10" />
            </div>
            <div class="py-2">
                <form class="max-w-lg w-full" method="GET" action="{{ route('practicas.index') }}">
                    <div class="relative flex items-center w-full">
                        <input 
                            type="search" 
                            id="search-dropdown" 
                            name="search" 
                            class="block w-full p-3 pl-10 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            placeholder="{{$descrip?? 'Buscar en el repositorio'}}" 
                            required />
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                        <button 
                            type="submit" 
                            class="absolute right-0 top-0 bottom-0 p-3 text-sm font-medium text-white bg-blue-700 rounded-r-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <span class="">{{$text ?? 'Buscar'}}</span>
                        </button>
                    </div>
                </form>
            </div>
            <!-- Sección de cards-->
            <div class="py-2 gap-4 w-full ">
                @foreach ($practicas as $informe)
                    @php
                        $icon = match ($informe->acceso) {
                            'Publico' => 'lock-open-alt',
                            'Privado' => 'lock-alt',
                            default => 'help-circle',
                        };

                        $color = match ($informe->acceso) {
                            'Publico' => 'green',
                            'Privado' => 'red',
                            default => 'gray',
                        };
                    @endphp

                    <a href="{{ route('practicas.show', ['practicas' => $informe->id]) }}" class="flex items-center w-full mb-2 bg-zinc-200 border border-gray-300 rounded-lg shadow-lg md:flex-row md:w-full hover:bg-zinc-300 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="border border-black object-cover rounded-lg w-48 h-48 md:h-48 md:w-48 md:rounded-none md:rounded-s-lg" src="{{ asset('storage/caratulas/'.$informe->ruta_caratula) }}" alt="">
                        <div class="w-full flex flex-col justify-between px-4 leading-normal">
                            <h5 class="mb-1 text-2xl font-bold tracking-tight text-black dark:text-white">{{ $informe->titulo }}</h5>
                            <p class="text-sm text-black">{{ $informe->autores }}</p>
                            <p class="{{ $color }} font-semibold">
                                <box-icon name="{{ $icon }}" type="solid" color="{{ $color }}" style="width: 20px; height: 20px;"></box-icon>
                                {{ $informe->acceso }}
                            </p>
                            <p class="w-full mb-3 font-normal text-black dark:text-gray-400">{{ $informe->resumen }}</p>
                        </div>
                    </a>
                @endforeach

            </div>
            <x-pagination :paginator="$practicas" />

        </div>

    </div>
</x-app-main>
