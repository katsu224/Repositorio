<form class="max-w-lg w-full" method="GET" action="{{ route($parametro . '.' . $parametro2) }}">
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

