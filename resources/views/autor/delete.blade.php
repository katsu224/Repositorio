@foreach ($autores as $autor)
    <div class="relative z-50 hidden modal" id="delete-modal{{ $autor->dni }}" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <div class="fixed inset-0 z-50 overflow-hidden">
            <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50 modal-overlay"></div>
            <div class="p-4 mx-auto animate-translate sm:max-w-lg">
                <div
                    class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl dark:bg-zinc-600">
                    <div class="bg-white dark:bg-zinc-700 p-2">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 border-transparent hover:bg-gray-50/50 hover:text-gray-900 rounded-lg text-sm px-2 py-1 ltr:ml-auto rtl:mr-auto inline-flex items-center dark:hover:bg-zinc-600 dark:text-gray-100"
                            data-tw-dismiss="modal">
                            <i class="text-xl text-gray-500 mdi mdi-close dark:text-zinc-100/60"></i>
                        </button>
                        <div class="p-4 text-center">
                            <i class="text-6xl text-gray-300 mdi mdi-alert-circle-outline dark:text-gray-100"></i>
                            <h5 class="mt-4 text-gray-600 dark:text-gray-100" style="font-size: 1rem">Estas seguro que
                                deseas eliminar el autor con
                                DNI : <b>{{ $autor->dni }}</b>?</h5>
                        </div>
                        <div class="px-4 py-3 text-center">
                            <form action="/autor/{{ $autor->dni }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Confirmar
                                </button>
                                <button type="button"
                                    class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                    data-tw-dismiss="modal">
                                    Cancelar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
