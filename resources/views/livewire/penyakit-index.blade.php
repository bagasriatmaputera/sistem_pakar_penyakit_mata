<div class="max-w-md mx-auto bg-slate-50 min-h-screen shadow-lg flex flex-col justify-between font-sans">
    <div>
        <div class="bg-gradient-to-b from-blue-700 to-sky-500 p-5 text-white flex items-center justify-between rounded-b-xl shadow-md">
            <div>
                <h1 class="text-lg font-bold tracking-wide">Basis Penyakit Mata</h1>
                <p class="text-[10px] text-blue-100 uppercase tracking-widest">Daftar Solusi & Intervensi Medis</p>
            </div>
            <a href="{{ route('admin.penyakit.create') }}" class="bg-white text-blue-700 hover:bg-blue-50 text-xs font-bold px-3 py-2 rounded-xl shadow transition flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                Tambah
            </a>
        </div>

        <x-breadcrumbs :paths="['Admin' => '#', 'Penyakit' => '#']" />

        <div class="p-4 space-y-4">
            <div class="relative">
                <input type="text" wire:model.live="search" placeholder="Cari kode atau nama penyakit..." 
                    class="w-full pl-4 pr-10 py-2.5 bg-white border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-sky-400 text-xs text-gray-700 transition">
                <span class="absolute right-3 top-3 text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </span>
            </div>

            @if (session()->has('success'))
                <div class="text-xs text-emerald-700 bg-emerald-50 p-3 rounded-xl border border-emerald-100 shadow-sm">
                    ✨ {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-2xl border border-gray-150 shadow-sm overflow-hidden">
                <table class="w-full text-left border-collapse text-[11px]">
                    <thead>
                        <tr class="bg-blue-950 text-white uppercase tracking-wider font-bold">
                            <th class="px-3 py-3 w-16 text-center">Kode</th>
                            <th class="px-3 py-3">Nama Penyakit Kelainan</th>
                            <th class="px-2 py-3 w-20 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($penyakits as $penyakit)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-3 py-3 text-center font-black text-emerald-700 bg-slate-50/50">
                                    {{ $penyakit->kode_penyakit }}
                                </td>
                                <td class="px-3 py-3">
                                    <div class="font-bold text-blue-900 leading-tight text-xs">{{ $penyakit->nama_penyakit }}</div>
                                    <div class="text-[10px] text-gray-500 mt-0.5 line-clamp-1 text-justify">
                                        <span class="font-medium text-gray-400">Info:</span> {{ $penyakit->deskripsi_penyakit }}
                                    </div>
                                    <div class="text-[10px] text-gray-400 line-clamp-1 text-justify">
                                        <span class="font-medium text-gray-400">Solusi:</span> {{ $penyakit->saran_perawatan }}
                                    </div>
                                </td>
                                <td class="px-2 py-3 text-center">
                                    <div class="flex items-center justify-center gap-1">
                                        <a href="{{ route('admin.penyakit.edit', $penyakit->id) }}" class="p-1 text-sky-600 bg-sky-50 hover:bg-sky-100 rounded-md transition" title="Ubah">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                        </a>
                                        <button type="button" wire:click="deletePenyakit({{ $penyakit->id }})" wire:confirm="Apakah Anda yakin ingin menghapus data penyakit mata ini secara permanen?" 
                                            class="p-1 text-red-600 bg-red-50 hover:bg-red-100 rounded-md transition" title="Hapus">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-8 text-gray-400 text-xs bg-white">
                                    Tidak ada data penyakit mata ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pt-2 text-xs">
                {{ $penyakits->links() }}
            </div>
        </div>
    </div>

    <div class="p-4 bg-white border-t border-gray-100">
        <a href="{{ route('home') }}" class="w-full bg-slate-800 hover:bg-slate-900 text-white font-semibold py-2.5 rounded-xl shadow transition flex items-center justify-center gap-1 text-xs">
            ← Kembali ke Dashboard Utama
        </a>
    </div>
</div>