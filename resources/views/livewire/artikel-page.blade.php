<div class="max-w-md mx-auto bg-slate-50 min-h-screen shadow-lg flex flex-col justify-between font-sans pb-20">
    
    <div class="bg-gradient-to-b from-blue-700 to-sky-500 p-6 text-white text-center rounded-b-xl shadow-md">
        <div class="flex justify-center items-center gap-2 mb-1">
            <div class="bg-white/20 p-2 rounded-full">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-bold tracking-wide">Edukasi & Artikel</h1>
        </div>
        <p class="text-xs text-blue-100 uppercase tracking-widest">Informasi & Tips Kesehatan Mata</p>
    </div>

    <div class="p-5 flex-1">
        
        <div class="relative mb-6">
            <input type="text" wire:model.live="search" placeholder="Cari artikel kesehatan mata..." 
                class="w-full pl-4 pr-10 py-3 bg-white border border-gray-100 rounded-xl shadow-sm focus:ring-2 focus:ring-sky-400 text-sm placeholder-gray-400 text-gray-700 transition">
            <span class="absolute right-3 top-3.5 text-gray-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </span>
        </div>

        <x-breadcrumbs :paths="[
            'Artikel' => route('artikel.index'),
            'Semua Artikel' => '#'
        ]" />

        <div class="space-y-5">
            @forelse($artikels as $artikel)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-md">
                    
                    <div class="h-44 w-full bg-gray-200 relative">
                        @if($artikel->gambar)
                            <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center text-gray-400 bg-slate-100">
                                <svg class="w-12 h-12 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-[10px] uppercase font-semibold tracking-wider">Gambar Tidak Tersedia</span>
                            </div>
                        @endif

                        <span class="absolute bottom-3 left-3 bg-slate-900/70 backdrop-blur-sm text-white text-[10px] font-medium px-2.5 py-1 rounded-full shadow-sm">
                            👤 By: {{ $artikel->penulis }}
                        </span>
                    </div>

                    <div class="p-4">
                        <h2 class="text-base font-bold text-blue-900 leading-snug mb-3 hover:text-sky-600 transition cursor-pointer">
                            {{ $artikel->title }}
                        </h2>

                        @if(!empty($artikel->key_insight))
                            <div class="bg-slate-50 rounded-xl p-3 border border-gray-150 space-y-2">
                                <span class="text-[10px] text-sky-600 font-bold uppercase tracking-wider block">
                                    💡 Poin Penting Artikel:
                                </span>
                                <ul class="space-y-1.5">
                                    @foreach($artikel->key_insight as $insight)
                                        <li class="flex items-start gap-1.5 text-xs text-gray-650 leading-relaxed">
                                            <span class="text-sky-500 shrink-0 mt-0.5">•</span>
                                            <span>{{ $insight }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <div class="mt-4 pt-3 border-t border-gray-50 flex items-center justify-between text-[11px] text-gray-400">
                            <span>📅 {{ $artikel->created_at ? $artikel->created_at->translatedFormat('d M Y') : 'Baru saja' }}</span>
                            <a href="{{ route('artikel.show', ['id' => $artikel->id]) }}" class="text-sky-500 font-bold hover:text-sky-600 flex items-center gap-0.5 transition">
                                Baca Selengkapnya 
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12 bg-white rounded-2xl border border-dashed border-gray-200">
                    <div class="inline-flex bg-slate-100 p-3 rounded-full text-gray-400 mb-2">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-blue-900">Artikel Tidak Ditemukan</h3>
                    <p class="text-xs text-gray-400 mt-1 px-4">Kata kunci "{{ $search }}" tidak cocok dengan judul edukasi manapun.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-5 px-1">
            {{ $artikels->links() }}
        </div>
    </div>

</div>