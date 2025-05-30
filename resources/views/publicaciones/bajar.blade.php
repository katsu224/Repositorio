@foreach ($publicaciones as $info)
    <div class="relative z-50 hidden modal" id="despublicar-modal{{ $info->id }}" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <div class="fixed inset-0 z-50 overflow-hidden">
            <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50 modal-overlay"></div>
            <div class="p-4 mx-auto text-center animate-translate sm:max-w-lg">
                <div
                    class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl dark:bg-zinc-700 dark:border-zinc-600">
                    <div class="p-5 text-center bg-white dark:bg-zinc-700">
                        <div class="mx-auto bg-green-100 rounded-full h-14 w-14">
                            <i class="mdi mdi-check-all text-2xl text-green-600 leading-[2.4]"></i>
                        </div>
                        <h2 class="mt-5 text-xl font-semibold text-gray-700 dark:text-gray-100">Confimar Baja</h2>
                        <p class="mt-2 text-gray-500 dark:text-zinc-100/60" style="font-size: 1rem">Estas seguro que
                            deseas
                            despublicar este
                            proyecto
                            : <br>
                            <b>{{ $info->id }} : {{ $info->titulo }}</b>?
                        </p>
                           <form action="/informes/despublicar/{{ $info->id }} " method="POST">
                                @csrf
                                @method('PUT')
                                <div class="flex justify-center mt-6 gap-x-4">

                                <button type="submit" class="px-4 py-2 text-base font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                 Confirmar
                              </button>
                                <button type="button"
                                class="px-4 py-2 text-base font-medium text-white bg-red-600 rounded-lg hover:bg-red-700  dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                data-tw-dismiss="modal">Cancelar</button>
                              </div>

                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
