<nav class="flex px-5 w-full py-3 text-white border-gray-200 bg-black dark:bg-black dark:border-gray-700 shadow-lg" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
    @if(!empty($breadcrumbs))
        @foreach ($breadcrumbs as $index => $breadcrumb)
            <li class="inline-flex items-center">
                @if ($index < count($breadcrumbs) - 1) <!-- Excluimos el último breadcrumb, que es solo texto -->
                    <a href="{{ $breadcrumb->url }}" class="inline-flex items-center text-base font-semibold text-white hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        @if ($index === 0) 
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                        @endif
                        {{ $breadcrumb->title }}
                    </a>
                @else <!-- El último breadcrumb será solo texto -->
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $breadcrumb->title }}</span>
                @endif
            </li>

            @if ($index < count($breadcrumbs) - 1) <!-- Excluimos el último breadcrumb, que es solo texto -->
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </div>
                </li>
            @endif
        @endforeach
    @endif
    </ol>
</nav>
