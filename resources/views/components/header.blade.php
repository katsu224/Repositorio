<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="Repositorio Institucional" name="description" />
    <meta content="" name="author" />
    <script src="https://kit.fontawesome.com/f6fe559650.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" href="{{ asset('images/logoCSR.ico') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/tailwind2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.css') }}">
</head>

<body data-mode="light" data-sidebar-size="lg" class="group sidebar" style="min-height: auto !important">
    <div
        class="fixed bottom-0 z-10 h-screen ltr:border-r rtl:border-l vertical-menu rtl:right-0 ltr:left-0 top-[70px] bg-slate-50 border-gray-50 print:hidden dark:bg-zinc-800 dark:border-neutral-700">
        <div data-simplebar class="h-full">
            <!--- Sidemenu -->
            <div class="metismenu pb-10 pt-2.5" id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul id="side-menu">
                    <li class="px-5 py-3 text-xs font-medium text-gray-500 cursor-default leading-[18px] group-data-[sidebar-size=sm]:hidden block"
                        data-key="t-menu">
                        Menu
                    </li>

                    <li>
                        <a href="/home"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-700 dark:active:text-white dark:hover:text-white">
                            <i data-feather="home" fill="#545a6d33"></i>
                            <span data-key="t-dashboard">Inicio</span>
                        </a>
                    </li>

                    <li>
                        <a href="/informes/add"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-700 dark:active:text-white dark:hover:text-white">
                            <i data-feather="share" fill="#545a6d33"></i>
                            <span data-key="t-dashboard">Añadir Proyecto</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-700 dark:active:text-white dark:hover:text-white">
                            <i data-feather="grid" class="align-middle" fill="#545a6d33"></i>
                            <span data-key="t-apps"> Administrar</span>
                        </a>
                        <ul>
                            <li>
                                <a href="/autor"
                                    class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-700 dark:active:text-white dark:hover:text-white">Autores</a>
                            </li>
                            <li>
                                <a href="/informes"
                                    class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-700 dark:active:text-white dark:hover:text-white">Proyectos</a>
                            </li>
                            <li>
                                <a href="/informes/publications"
                                    class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-700 dark:active:text-white dark:hover:text-white">Publicaciones</a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>

    <!-- Left Sidebar End -->
    <nav
        class="fixed top-0 left-0 right-0 z-10 flex items-center bg-white dark:bg-zinc-800 print:hidden dark:border-zinc-700 rtl:pl-6">
        <div class="flex justify-between w-full">
            <div class="flex items-center topbar-brand">
                <div
                    class="hidden lg:flex navbar-brand items-center justify-between shrink px-5 h-[70px] ltr:border-r rtl:border-l bg-[#fbfaff] border-gray-50 dark:border-zinc-700 dark:bg-zinc-800 shadow-none">
                    <a href="#"
                        class="flex items-center text-lg flex-shrink-0 font-bold dark:text-white leading-[69px]">
                        <img src="{{ asset('images/logocsr.png') }}" alt="Logo Carlos Salazar Romero"
                            class="inline-block w-7 h-7 align-middle ltr:xl:mr-2 rtl:xl:ml-2')" />
                        <span style="font-size: 1.0rem !important"
                            class="hidden font-bold text-gray-700 align-middle xl:block dark:text-gray-100 leading-[69px]">REPOSITORIO
                            CSR </span>
                    </a>
                </div>
                <button type="button"
                    class="group-data-[sidebar-size=sm]:border-b border-b border-[#e9e9ef] dark:border-zinc-600 dark:lg:border-transparent lg:border-transparent group-data-[sidebar-size=sm]:border-[#e9e9ef] group-data-[sidebar-size=sm]:dark:border-zinc-600 text-gray-800 dark:text-white h-[70px] px-4 ltr:-ml-[52px] rtl:-mr-14 py-1 vertical-menu-btn text-16"
                    id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </div>
            <div
                class="flex justify-between w-full items-center border-b border-[#e9e9ef] dark:border-zinc-600 ltr:pl-6 rtl:pr-6">
                <div>
                    <form class="hidden app-search xl:block">
                        <div class="relative inline-block">

                        </div>
                    </form>
                </div>
                <div class="flex">
                    <div>
                        <div class="relative block dropdown sm:hidden">
                            <!--<button type="button"-->
                            <!--    class="text-xl px-4 h-[70px] text-gray-600 dark:text-gray-100 dropdown-toggle"-->
                            <!--    data-dropdown-toggle="navNotifications">-->
                            <!--    <i data-feather="search" class="w-5 h-5"></i>-->
                            <!--</button>-->

                            <div class="absolute top-0 z-50 hidden px-4 mx-4 list-none bg-white border rounded shadow dropdown-menu -left-36 w-72 border-gray-50 dark:bg-zinc-800 dark:border-zinc-600 dark:text-gray-300"
                                id="navNotifications">
                                <form class="py-3 dropdown-item" aria-labelledby="navNotifications">
                                    <div class="m-0 form-group">
                                        <div class="flex w-full">
                                            <input type="text" name="search"
                                                class="border-gray-100 dark:border-zinc-600 dark:text-zinc-100 w-fit"
                                                placeholder="Search ...">
                                            <button
                                                class="text-white border-l-0 border-transparent rounded-l-none btn btn-primary bg-violet-500"
                                                type="submit">
                                                <i class="mdi mdi-magnify"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--<div>-->
                    <!--    <button type="button"-->
                    <!--        class="light-dark-mode text-xl px-3 h-[70px] text-gray-600 dark:text-gray-100 hidden sm:block">-->
                    <!--        <i data-feather="moon" class="block w-5 h-5 dark:hidden"></i>-->
                    <!--        <i data-feather="sun" class="hidden w-5 h-5 dark:block"></i>-->
                    <!--    </button>-->
                    <!--</div>-->
                    <div>
                        <div class="relative dropdown">
                            <button type="button"
                                class="flex items-center px-3 py-2 h-[70px] border-x border-gray-50 bg-gray-50/30 dropdown-toggle dark:bg-zinc-700 dark:border-zinc-600 dark:text-gray-100"
                                id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="true">
                                <img class="dark:border-zinc-400 rounded-full w-9 h-9 object-cover mr-2"
                                    src="{{ asset('storage/profile/' . Auth::user()->profile_photo) }}"
                                    alt="perfil" />
                                <span
                                    class="hidden font-medium xl:block dark:text-gray-100 text-black">{{ Auth::user()->username }}</span>
                                <i class="hidden align-bottom mdi mdi-chevron-down xl:block"></i>
                            </button>
                            <div class="absolute top-0 z-50 hidden w-40 list-none bg-white dropdown-menu dropdown-animation rounded shadow dark:bg-zinc-800"
                                id="profile/log">
                                <div class="border border-gray-50 dark:border-zinc-600"
                                    aria-labelledby="navNotifications">
                                    <div class="dropdown-item dark:text-gray-100 text-black">
                                        <a class="block px-3 py-2 hover:bg-gray-50/50 dark:hover:bg-zinc-700/50"
                                            href="/perfil">
                                            <i class="mr-1 align-middle mdi mdi-face-man text-16"></i>
                                            Perfil
                                        </a>
                                    </div>
                                    <hr class="border-gray-50 dark:border-gray-700" />
                                    <div class="dropdown-item dark:text-gray-100 text-black">
                                        <a class="block p-3 hover:bg-gray-50/50 dark:hover:bg-zinc-700/50"
                                            href="javascript:void(0);" data-tw-toggle="modal"
                                            data-tw-target="#logout-modal" type="button">
                                            <i class="mr-1 align-middle mdi mdi-logout text-16"></i>
                                            Salir
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px] p-2">
        <div class="page-content">
            <div class="container-fluid px-[0.625rem]">

                @yield('content')
                @include('components/alerts/salir')

            </div>
        </div>
    </div>
    <script src="{{ asset('libs/@popperjs/core/umd/popper.min.js') }}"></script>
    <script src="{{ asset('libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('libs/metismenujs/metismenujs.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
    <!-- Plugins js-->
    <script src="{{ asset('libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ asset('js/pages/dashboard.init.js') }}"></script>
    <script src="{{ asset('js/pages/nav%26tabs.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
