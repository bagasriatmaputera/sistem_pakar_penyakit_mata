<div class="max-w-md mx-auto bg-slate-50 min-h-screen shadow-lg flex flex-col justify-between font-sans pb-10">
    
    <div>
        <div class="bg-gradient-to-br from-slate-900 via-slate-800 to-blue-900 p-6 pt-8 pb-12 text-white rounded-b-[2.5rem] shadow-xl relative overflow-hidden">
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/5 rounded-full blur-2xl"></div>
            
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-2">
                    <div class="bg-white/10 p-2 rounded-xl backdrop-blur-md">
                        <svg class="w-5 h-5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-base font-black tracking-wide">Panel Admin</h1>
                        <p class="text-[9px] text-slate-400 uppercase tracking-widest font-medium">Sistem Pakar Penyakit Mata</p>
                    </div>
                </div>
                
                <span class="inline-flex items-center gap-1 bg-emerald-500/20 text-emerald-400 text-[10px] font-bold px-2.5 py-1 rounded-full border border-emerald-500/30 shadow-sm animate-pulse">
                    <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full"></span>
                    Sesi Aktif
                </span>
            </div>

            <div class="mt-4">
                <h2 class="text-xl font-bold">Selamat Datang, Admin</h2>
                <p class="text-[11px] text-slate-450 leading-relaxed mt-0.5">Kelola pangkalan pengetahuan (knowledge base) dan matriks aturan relasi forward chaining di sini.</p>
            </div>
        </div>

        <x-breadcrumbs :paths="['Admin Control' => '#', 'Dashboard' => '#']" />

        <div class="p-5 space-y-6">
            
            <div>
                <h3 class="text-xs font-black text-slate-700 uppercase tracking-wider mb-3">Ringkasan Data Konten</h3>
                <div class="grid grid-cols-2 gap-3">
                    
                    <div class="bg-white p-3.5 rounded-2xl border border-gray-150 shadow-sm flex items-center gap-3">
                        <div class="bg-blue-50 text-blue-600 p-2.5 rounded-xl border border-blue-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wide">Gejala</p>
                            <p class="text-base font-black text-gray-800">{{ $stats['total_gejala'] }} Data</p>
                        </div>
                    </div>

                    <div class="bg-white p-3.5 rounded-2xl border border-gray-150 shadow-sm flex items-center gap-3">
                        <div class="bg-emerald-50 text-emerald-600 p-2.5 rounded-xl border border-emerald-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wide">Penyakit</p>
                            <p class="text-base font-black text-gray-800">{{ $stats['total_penyakit'] }} Data</p>
                        </div>
                    </div>

                    <div class="bg-white p-3.5 rounded-2xl border border-gray-150 shadow-sm flex items-center gap-3">
                        <div class="bg-amber-50 text-amber-600 p-2.5 rounded-xl border border-amber-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a2 2 0 01-2 2H3m2 0h14a2 2 0 012 2v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wide">Aturan (Rule)</p>
                            <p class="text-base font-black text-gray-800">{{ $stats['total_rule'] }} Baris</p>
                        </div>
                    </div>

                    <div class="bg-white p-3.5 rounded-2xl border border-gray-150 shadow-sm flex items-center gap-3">
                        <div class="bg-purple-50 text-purple-600 p-2.5 rounded-xl border border-purple-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wide">Diagnosis</p>
                            <p class="text-base font-black text-gray-800">{{ $stats['total_riwayat'] }} Sesi</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="space-y-3">
                <h3 class="text-xs font-black text-slate-700 uppercase tracking-wider">Modul Navigasi Manajemen</h3>
                
                <a href="{{ route('admin.gejala.index') }}" class="group block bg-white p-4 rounded-2xl border border-gray-150 shadow-sm hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-2.5 h-2.5 bg-blue-600 rounded-full group-hover:scale-125 transition-transform"></div>
                            <span class="text-xs font-bold text-gray-800">Manajemen Kode & Data Gejala</span>
                        </div>
                        <svg class="w-4 h-4 text-gray-300 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </a>

                <a href="{{ route('admin.penyakit.index') }}" class="group block bg-white p-4 rounded-2xl border border-gray-150 shadow-sm hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-2.5 h-2.5 bg-emerald-600 rounded-full group-hover:scale-125 transition-transform"></div>
                            <span class="text-xs font-bold text-gray-800">Manajemen Entitas Penyakit Mata</span>
                        </div>
                        <svg class="w-4 h-4 text-gray-300 group-hover:text-emerald-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </a>

                <a href="{{ route('admin.rule.index') }}" class="group block bg-white p-4 rounded-2xl border border-gray-150 shadow-sm hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-2.5 h-2.5 bg-amber-500 rounded-full group-hover:scale-125 transition-transform"></div>
                            <span class="text-xs font-bold text-gray-800">Hubungan Matriks Aturan (Rule Base)</span>
                        </div>
                        <svg class="w-4 h-4 text-gray-300 group-hover:text-amber-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </a>

                <a href="{{ route('admin.artikel.index') }}" class="group block bg-white p-4 rounded-2xl border border-gray-150 shadow-sm hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-2.5 h-2.5 bg-sky-400 rounded-full group-hover:scale-125 transition-transform"></div>
                            <span class="text-xs font-bold text-gray-800">Kelola Artikel Edukasi Kesehatan</span>
                        </div>
                        <svg class="w-4 h-4 text-gray-300 group-hover:text-sky-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </a>

            </div>

        </div>
    </div>

    <div class="p-4 bg-white border-t border-gray-100 space-y-2">
        <button type="button" wire:click="logout" wire:confirm="Apakah Anda ingin keluar dari akun administrator?"
            class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2.5 rounded-xl shadow text-center text-xs tracking-wide transition block">
            🔒 Log Out / Keluar Panel Admin
        </button>
        <a href="{{ route('home') }}" class="w-full bg-slate-100 hover:bg-slate-200 text-slate-750 font-semibold py-2 rounded-xl text-center block text-[11px] transition">
            Lihat Tampilan Aplikasi Pasien
        </a>
    </div>

</div>