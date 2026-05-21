<div class="max-w-md mx-auto bg-white min-h-screen shadow-lg flex flex-col font-sans pb-10">
    
    <div class="bg-gradient-to-br from-blue-700 via-blue-600 to-sky-500 p-8 pt-12 pb-16 text-white rounded-b-[3rem] shadow-xl relative overflow-hidden">
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute top-20 -left-10 w-32 h-32 bg-sky-300/10 rounded-full blur-2xl"></div>

        <div class="relative z-10 space-y-4">
            <div class="inline-flex bg-white/20 backdrop-blur-md p-3 rounded-2xl shadow-inner mb-2">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-black leading-tight tracking-tight">
                Deteksi Kesehatan <br> <span class="text-sky-200">Mata Anda</span> Secara Mandiri.
            </h1>
            <p class="text-sm text-blue-50/80 leading-relaxed max-w-[280px]">
                Identifikasi awal gangguan penglihatan fisiologis dengan metode pakar yang akurat dan mudah.
            </p>
        </div>
    </div>

    <div class="px-6 -mt-10 space-y-4 z-999">
        <a href="{{ route('diagnosis.wizard') }}" class="group block bg-white p-5 rounded-3xl shadow-lg border border-blue-50 transition-all duration-300 hover:shadow-sky-200 hover:-translate-y-1">
            <div class="flex items-center gap-4">
                <div class="bg-blue-600 p-4 rounded-2xl text-white shadow-blue-200 shadow-lg group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-base font-bold text-blue-900">Mulai Diagnosa</h3>
                    <p class="text-[11px] text-gray-400">Analisis gejala mata Anda sekarang</p>
                </div>
                <svg class="w-5 h-5 text-gray-300 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>
        </a>

        <a href="{{ route('artikel.index') }}" class="group block bg-white p-5 rounded-3xl shadow-lg border border-blue-50 transition-all duration-300 hover:shadow-sky-200 hover:-translate-y-1">
            <div class="flex items-center gap-4">
                <div class="bg-sky-500 p-4 rounded-2xl text-white shadow-sky-200 shadow-lg group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-base font-bold text-blue-900">Edukasi & Artikel</h3>
                    <p class="text-[11px] text-gray-400">Pelajari cara menjaga kesehatan mata</p>
                </div>
                <svg class="w-5 h-5 text-gray-300 group-hover:text-sky-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>
        </a>
    </div>

    <div class="px-6 mt-10">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-sm font-black text-blue-900 uppercase tracking-wider">Artikel Terbaru</h2>
            <a href="{{ route('artikel.index') }}" class="text-[10px] font-bold text-sky-600 hover:underline">Lihat Semua</a>
        </div>
        
        <div class="grid grid-cols-1 gap-4">
            @foreach($latestArtikels as $artikel)
                <div class="flex items-center gap-4 bg-slate-50 p-3 rounded-2xl border border-gray-100">
                    <div class="w-16 h-16 bg-blue-100 rounded-xl flex-shrink-0 overflow-hidden">
                        @if($artikel->gambar)
                            <img src="{{ asset('storage/' . $artikel->gambar) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-blue-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1">
                        <h4 class="text-xs font-bold text-blue-900 line-clamp-1">{{ $artikel->title }}</h4>
                        <p class="text-[10px] text-gray-400 mt-1">Oleh: {{ $artikel->penulis }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="px-6 mt-12 mb-6">
        <div class="p-6 bg-slate-900 rounded-[2rem] text-center space-y-4 shadow-xl">
            <p class="text-xs text-slate-400">Punya akses khusus sistem?</p>
            <a href="{{ url('/admin/login') }}" class="inline-flex items-center gap-2 bg-white text-slate-900 text-xs font-black px-6 py-3 rounded-xl transition hover:bg-slate-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                Sign In as Admin
            </a>
        </div>
    </div>

    <div class="px-8 text-center">
        <p class="text-[10px] text-gray-400 leading-relaxed italic">
            *Aplikasi ini adalah media skrining awal dan bukan pengganti diagnosa medis resmi dari dokter spesialis mata.
        </p>
    </div>

</div>