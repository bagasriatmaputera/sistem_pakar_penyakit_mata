<div class="max-w-md mx-auto bg-white min-h-screen shadow-lg flex flex-col justify-between font-sans">
    <div>
        <div class="bg-gradient-to-b from-blue-700 to-sky-500 p-5 text-white flex items-center justify-between rounded-b-xl shadow-md">
            <div>
                <h1 class="text-base font-bold tracking-wide">{{ $isEdit ? 'Ubah Data Gejala' : 'Tambah Gejala Baru' }}</h1>
                <p class="text-[10px] text-blue-100 uppercase tracking-widest">Formulir Isian Entitas Aturan</p>
            </div>
            <a href="{{ route('admin.gejala.index') }}" class="text-white/80 hover:text-white text-xs font-semibold flex items-center gap-0.5">
                ← Kembali
            </a>
        </div>

        <x-breadcrumbs :paths="['Admin' => '#', 'Gejala' => route('admin.gejala.index'), ($isEdit ? 'Edit' : 'Create') => '#']" />

        <form wire:submit="save" class="p-5 space-y-4">
            
            <div>
                <label class="block text-xs font-bold text-blue-900 mb-1 uppercase tracking-wide">Kode Gejala</label>
                <input type="text" wire:model="kode_gejala" {{ $isEdit ? '' : 'readonly' }}
                    class="w-full px-4 py-3 bg-slate-50 border border-gray-200 rounded-xl shadow-inner text-xs font-black text-blue-900 tracking-wider focus:ring-2 focus:ring-sky-400 focus:bg-white outline-none transition">
                @error('kode_gejala') <span class="text-[10px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-blue-900 mb-1 uppercase tracking-wide">Nama Indikator Gejala</label>
                <input type="text" wire:model="nama_gejala" placeholder="Contoh: Mata perih saat melihat jauh"
                    class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl shadow-sm text-xs text-gray-700 focus:ring-2 focus:ring-sky-400 outline-none transition">
                @error('nama_gejala') <span class="text-[10px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-blue-900 mb-1 uppercase tracking-wide">Deskripsi Tambahan / Patologis</label>
                <textarea wire:model="deskripsi_gejala" rows="4" placeholder="Tulis rincian atau keterangan tambahan tentang gejala ini jika diperlukan..."
                    class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl shadow-sm text-xs text-gray-700 focus:ring-2 focus:ring-sky-400 outline-none transition text-justify"></textarea>
                @error('deskripsi_gejala') <span class="text-[10px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-sky-500 hover:bg-sky-600 text-white font-bold py-3 px-4 rounded-xl shadow-md transition text-xs flex items-center justify-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    Simpan Perubahan Aturan
                </button>
            </div>

        </form>
    </div>

    <div class="px-5 py-4 text-center text-[10px] text-gray-400 border-t border-gray-50 bg-slate-50">
        Sistem Pakar Deteksi Penyakit Mata Fisiologis © {{ date('Y') }}
    </div>
</div>