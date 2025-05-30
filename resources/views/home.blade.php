<x-app-main >
    <div class="bg-black">
        
    </div>
    <div class="w-full text-center mt-6">

        <h1 class="text-4xl font-semibold mb-6 tracking-wider">Explora Nuestro Repositorio Institucional</h1>
    </div>

    <!-- TABS -->
    <div class="flex justify-center w-full mb-10 flex-wrap ">
        {{-- <div class=" text-center flex flex-wrap gap-0-2">
            <a href="view/repoz_carre.php" class="hover:shadow-xl shadow-lg hover:shadow-blue-500/50 border border-black nav  w-full sm:w-auto ">
                <h1 class="p-4 m-2">Programa de Estudio</h1>
            </a>
            <a href="" class="hover:shadow-xl shadow-lg hover:shadow-blue-500/50 border border-black nav w-full sm:w-auto">
                <h1 class="p-4 m-2">Investigación</h1>
            </a>
            <a href="" class="hover:shadow-xl shadow-lg hover:shadow-ablue-500/50 border border-black nav w-full sm:w-auto">
                <h1 class="p-4 m-2">Proyectos</h1>
            </a>
            <a href="" class="hover:shadow-xl shadow-lg hover:shadow-blue-500/50 border border-black nav w-full sm:w-auto">
                <h1 class="p-4 m-2">Informe de Prácticas</h1>
            </a>
        </div> --}}
        <x-search
            :parametro="'institucional'"
            :parametro2="'index'"
            :descrip="'Buscar en todo el repositorio'"
        />
    </div>
    <div class="w-full">
        <div class="w-full text-center mb-6 bg-color-repository3 p-6 rounded-lg shadow-lg">
            <h1 class="text-4xl font-semibold pb-2 text-sky-400">Repositorio Salazar Romero</h1>
            <p class="text-white">
                El repositorio del Instituto Superior Tecnológico Salazar Romero son una colección de recursos educativos que incluyen proyectos de módulos, trabajos de investigación y documentación de Ferias Institucionales. Este espacio también alberga materiales digitalizados y datos de investigaciones producidos por los miembros de nuestra comunidad Salazarina.
            </p>
        </div>
        <div class="border-b border-gray-200 dark:border-gray-700 w-full">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400 w-full">
                <li class="flex-grow">
                    <a href="#" data-tab="tab1" class="inline-flex items-center justify-center w-full p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group text-xl font-semibold gap-1" aria-current="page">
                        <box-icon name='category' type='solid' color='#3b60e4'></box-icon>
                        Categorías
                    </a>
                </li>
                <li class="flex-grow">
                    <a href="#" data-tab="tab2" class="inline-flex items-center justify-center w-full p-4 border-b-2 rounded-t-lg dark:text-blue-500 dark:border-blue-500 group text-xl font-semibold gap-1">
                        <box-icon name='news' color='#3b60e4'></box-icon>
                        Recientes
                    </a>
                </li>
            </ul>
        </div>
        <div class="w-full p-4">
            <div id="tab1" class="w-full flex flex-wrap" role="tabpanel" aria-labelledby="tab1-tab">
                <div class="shadow-lg flex flex-wrap justify-center items-center gap-4 mb-6 p-4 rounded-2xl w-full">
                    <a href="{{ route('institucional.index') }}">
                    <div class="notification">
                        <div class="notiglow"></div>
                        <div class="notiborderglow"></div>
                        <div class="notititle">Repositorio </div>
                        <div class="notibody">Unidad de Investigación</div>
                    </div>
                    </a>
                    <a href="{{ route('investigacion.index') }}">
                        <div class="notification flex flex-col justify-center items-center text-center bg-gray-100 rounded-lg shadow-md p-4">
                            <div class="notiglow"></div>
                            <div class="notiborderglow"></div>
                            <div class="notititle font-bold text-lg mb-2">Proyectos de Investigación</div>
                            <img src="{{ asset('images/analitica.png') }}" class="object-cover z-30">
                        </div>
                    </a>
                    <a href="{{ route('feria.index') }}">
                        <div class="notification flex flex-col justify-center items-center text-center bg-gray-100 rounded-lg shadow-md p-4">
                            <div class="notiglow"></div>
                            <div class="notiborderglow"></div>
                            <div class="notititle font-bold text-lg mb-2">Feria Tecnológica</div>
                            <img src="{{ asset('images/tecnologica.png') }}" class="object-cover z-30">
                        </div>
                    </a>
                    <a href="{{ route('filtros.category') }}">
                        <div class="notification flex flex-col justify-center items-center text-center bg-gray-100 rounded-lg shadow-md p-4">
                            <div class="notiglow"></div>
                            <div class="notiborderglow"></div>
                            <div class="notititle">Programas de Estudio</div>
                            <img src="{{ asset('images/sd.png') }}" class=" object-cover z-30">
                        </div>
                    </a>
                    <a href="{{ route('practicas.index') }}">
                        <div class="notification flex flex-col justify-center items-center text-center bg-gray-100 rounded-lg shadow-md p-4">
                            <div class="notiglow"></div>
                            <div class="notiborderglow"></div>
                            <div class="notititle font-bold text-lg mb-2">Informe de Titulación</div>
                            <img src="{{ asset('images/practica.png') }}" class="object-cover z-30">
                        </div>
                    </a>
                </div>
                
            </div>
            <div id="tab2" class="hidden w-full" role="tabpanel" aria-labelledby="tab2-tab">
                <div class="flex flex-col py-4 px-16 gap-4 w-full">
                    @foreach ($recientes as $reciente)
                        <x-card
                        :parametro="'institucional'"
                        :codigo="$reciente->id"
                        :image="$reciente->ruta_caratula"
                        :title="$reciente->titulo"
                        :resumen="$reciente->resumen"
                        :autores="$reciente->autores"
                        :acceso="$reciente->acceso"
                    />
                    @endforeach
                </div>
            </div>
        </div>


    </div>
</x-app-main>
