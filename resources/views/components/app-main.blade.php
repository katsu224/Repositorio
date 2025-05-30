<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repositorio | {{$title??' Salazar Romero'}}</title>
    <link rel="shortcut icon" href="{{ asset('images/logoCSR.ico') }}" />
    {{-- Fuente --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&display=swap" rel="stylesheet">
    <!-- ESTILOS -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-ClzI0167.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/custom-kF7qn-G5.css') }}">
    
    <script src="{{ asset('build/assets/app-Db2zNc3B.js') }}" defer></script>
    <script src="{{ asset('build/assets/tabs-Dv9bWFrJ.js') }}" defer></script>
    <script src="https://unpkg.com/flowbite@1.6.4/dist/flowbite.js"></script>

    <!-- ICONOS -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <style>
        .nav {
          position: relative;
          font-weight: 700;
          letter-spacing: 0.0625rem;
        }

        .nav::after {
          content: '';
          background-color: #2051da;
          height: 3px;
          width: 0%;
          position: absolute;
          left: 0;
          border-radius: 0.5rem;
        }
        .nav:hover::after {
          width: 100%;
        }
      </style>
</head>

<body>
    <header class="bg-color-repository1 shadow-sm shadow-slate-600 font-sans tracking-wide relative z-50 h-28 flex items-center px-6 justify-between">
        <a href="/">
            <div class="display flex items-center gap-2">
                <img class="w-16 h-16" src="{{ asset('images/logoCSR.ico') }}" alt="">
                <h1 class="text-2xl font-black font-mono sm:text-3xl md:text-3xl lg:text-4xl xl:text-5xl  ">Repositorio Institucional Salazarinos</h1>
            </div>
        </a>
            <a href="{{ route('login') }}">
                <button class="button ">
                    <p>Ingresar</p>
                </button>
            </a>
        </div>
    </header>
    <main class="w-full bg-color1">
        <div class="max-w-7xl mx-auto mb-4">
            {{-- Contenido principal --}}
                {{ $slot }}
            {{-- Contenido principal --}}
        </div>
    </main>

    <main class="max-w-7xl mx-auto mb-4 bg-color1">


    </main>
</body>


</html>
