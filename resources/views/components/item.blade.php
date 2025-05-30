<div class=" p-2 grid grid-cols-4 w-full gap-2 sm:gap-4">
    <div class="col-span-4 ">
        <h2 class="text-3xl font-semibold">{{$title}}</h1>
        <hr>
    </div>
    <div class="col-span-1 flex flex-col ">
        <img class="w-72 h-auto" src="{{ asset('storage/caratulas/'.$image) }}" alt="">
        <div class="flex flex-col justify-center py-2 gap-4 items-center">
            @if ($acceso == 'Privado')
                <br>  
                <div class="px-2">
                    <a href="#" class="p-2 bg-blue-500 w-auto text-white rounded hover:bg-blue-700">Descargar Documento</a>
                </div>
            @else
                <br>  
                <div class="px-2">
                    <a href="{{ asset('storage/pdfs/'.$ruta) }}" download
                        class="p-2 bg-blue-500 text-white rounded hover:bg-blue-700 w-full sm:w-auto text-center">
                        Descargar Documento
                    </a>
            </div>	                
            @endif
        </div>
    </div>
    <div class="col-span-3">
        <p class="w-full text-sm font-semibold">{{$resumen}}</p>
        <div class="flex flex-col pt-4">
            <div>
                <span class="text-lg font-semibold">
                    Autor(es):
                </span>
                <p>
                    @if(is_array($autores) || is_object($autores))
                        @foreach ($autores as $autor)
                            {{ $autor->nombre }} {{ $autor->apellidos }}
                            @if (!$loop->last), @endif
                        @endforeach
                    @else
                        <span>No hay autores disponibles.</span>
                    @endif
                </p>
                    
            </div>
            <div>
                <span class="text-lg font-semibold">
                    Año. Creación:
                </span>
                <p>{{ $anio ?? 'Año no disponible' }}</p>
            </div>
            <div>
                <span class="text-lg font-semibold">
                    Tipo de acceso:
                </span>
                <p>{{ $acceso}}</p>
            </div>
        </div>
    </div>
</div>
