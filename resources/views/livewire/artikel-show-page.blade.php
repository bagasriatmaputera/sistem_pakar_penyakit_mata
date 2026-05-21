<div class="max-w-md mx-auto bg-white min-h-screen shadow-lg flex flex-col justify-between font-sans pb-12">
    
    <div class="px-4 py-4 bg-white border-b border-gray-100 flex items-center justify-between sticky top-0 z-50 backdrop-blur-md bg-white/90">
        <a href="{{ route('artikel.index') }}" class="p-2 hover:bg-slate-100 rounded-full transition text-gray-650 flex items-center gap-1 text-xs font-semibold">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali
        </a>
        <span class="text-xs font-bold text-blue-900 tracking-wide">Detail Artikel</span>
        <div class="w-9 h-9"></div> </div>

    <div class="flex-1">
        
        <div class="h-56 w-full bg-slate-100 relative">
            @if($artikel->gambar)
                <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->title }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gradient-to-br from-blue-600 to-sky-400 flex flex-col items-center justify-center text-white/90 p-6 text-center">
                    <svg class="w-12 h-12 mb-2 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <span class="text-[10px] uppercase font-bold tracking-widest bg-white/20 px-3 py-1 rounded-full">Edukasi Literasi Medis</span>
                </div>
            @endif
        </div>

        <x-breadcrumbs :paths="[
            'Artikel' => route('artikel.index'),
            $artikel->title => '#'
        ]" />

        <div class="p-5">
            <span class="text-[10px] bg-blue-50 text-blue-600 font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">
                Kesehatan Mata
            </span>

            <h1 class="text-xl font-black text-blue-900 leading-tight mt-2.5 mb-4">
                {{ $artikel->title }}
            </h1>

            <div class="flex items-center gap-3 pb-4 border-b border-gray-100 mb-5">
                <div class="w-9 h-9 rounded-full bg-sky-100 flex items-center justify-center text-sky-600 font-bold text-sm shadow-inner">
                    {{ substr($artikel->penulis, 0, 1) }}
                </div>
                <div class="text-xs">
                    <p class="font-bold text-gray-800">{{ $artikel->penulis }}</p>
                    <p class="text-[10px] text-gray-400">Diterbitkan pada: {{ $artikel->created_at ? $artikel->created_at->translatedFormat('d F Y') : 'Baru saja' }}</p>
                </div>
            </div>

            @if(!empty($artikel->key_insight))
                <div class="bg-sky-50/70 rounded-2xl p-4 border border-sky-100 mb-6 shadow-sm">
                    <h3 class="text-xs font-bold text-blue-900 uppercase tracking-wider mb-2.5 flex items-center gap-1">
                        <svg class="w-4 h-4 text-amber-500 fill-amber-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l-.707-.707zM2 10a1 1 0 011-1h1a1 1 0 110 2H3a1 1 0 01-1-1zM14 10a1 1 0 011-1h1a1 1 0 110 2h-1a1 1 0 01-1-1zM7.172 14.243a1 1 0 11-1.414-1.414l.707-.707a1 1 0 111.414 1.414l-.707.707zM9.425 15.657a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414l.707.707z" />
                        </svg>
                        Intisari Informasi (Key Insights)
                    </h3>
                    <ul class="space-y-2">
                        @foreach($artikel->key_insight as $insight)
                            <li class="flex items-start gap-2 text-xs text-blue-950 leading-relaxed">
                                <span class="text-sky-500 font-bold mt-0.5 shrink-0">✓</span>
                                <span>{{ $insight }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="text-xs text-gray-700 leading-relaxed space-y-4 font-normal text-justify">
                {!! nl2br(e($artikel->content)) !!}
            </div>
        </div>
    </div>

    <div class="px-5 py-4 text-center text-[10px] text-gray-400 border-t border-gray-50 bg-slate-50">
        Sistem Pakar Deteksi Penyakit Mata Fisiologis © {{ date('Y') }}
    </div>

</div>