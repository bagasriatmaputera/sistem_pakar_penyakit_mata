@props(['paths' => []])

<nav class="flex px-5 py-3 text-gray-500 bg-slate-50" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 text-[11px] font-medium tracking-wide">
        
        <li class="inline-flex items-center">
            <a href="{{ url('/') }}" class="inline-flex items-center text-gray-400 hover:text-blue-600 transition">
                <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                </svg>
                Home
            </a>
        </li>

        @foreach($paths as $label => $url)
            <li>
                <div class="flex items-center">
                    <span class="text-gray-300 mx-1">/</span>
                    @if($loop->last || $url == '#')
                        <span class="text-blue-900 font-bold max-w-[180px] truncate" aria-current="page">
                            {{ $label }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="text-gray-400 hover:text-blue-600 transition">
                            {{ $label }}
                        </a>
                    @endif
                </div>
            </li>
        @endforeach

    </ol>
</nav>