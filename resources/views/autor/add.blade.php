<div class="relative z-50 hidden modal" id="add-modal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 z-50 overflow-hidden">
        <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50 modal-overlay"></div>
        <div class="p-6 mx-auto animate-translate sm:max-w-lg">
            <div
                class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl dark:bg-zinc-800">
                <div class="bg-white dark:bg-zinc-800">
                    <button type="button"
                        class="absolute top-3 right-3 text-gray-500 hover:bg-gray-100 hover:text-gray-900 rounded-lg p-1 focus:outline-none focus:ring focus:ring-blue-300"
                        data-tw-dismiss="modal">
                        <i class="text-xl mdi mdi-close"></i>
                    </button>

                    <div class="p-4 text-center border-b border-gray-300">
                        <h3 class="mt-4 text-2xl font-semibold text-gray-800 dark:text-gray-200">AÑADIR AUTOR</h3>
                    </div>

                    <div class="p-6 text-center">
                        <form action="/autor" method="POST">
                            @csrf
                            <div class="grid gap-4">
                                <div class="w-full">
                                    <label for="dni"
                                        class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-200">Nro.
                                        Documento (DNI) *</label>
                                    <input type="text" name="dni" id="dni"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Ingrese el DNI" required>
                                </div>

                                <div class="w-full">
                                    <label for="nombres"
                                        class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-200">Nombres
                                        *</label>
                                    <input type="text" name="nombres" id="nombres"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Ingrese los nombres" required>
                                </div>

                                <div class="w-full">
                                    <label for="apellidos"
                                        class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-200">Apellidos
                                        *</label>
                                    <input type="text" name="apellidos" id="apellidos"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Ingrese los apellidos" required>
                                </div>
                            </div>

                            <div class="flex justify-center mt-6 gap-x-4">
                                <button type="submit"
                                    class="px-4 py-2 text-base font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Añadir
                                </button>
                                <button type="button"
                                    class="px-4 py-2 text-base font-medium text-white bg-red-600 rounded-lg hover:bg-red-700  dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                    data-tw-dismiss="modal">Cancelar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
