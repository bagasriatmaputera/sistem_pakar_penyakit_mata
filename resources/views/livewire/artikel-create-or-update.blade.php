<div class="max-w-md mx-auto bg-white min-h-screen shadow-lg flex flex-col justify-between font-sans">
    <div>
        <div class="bg-gradient-to-b from-blue-700 to-sky-500 p-5 text-white flex items-center justify-between rounded-b-xl shadow-md">
            <div>
                <h1 class="text-base font-bold tracking-wide">{{ $isEdit ? 'Edit Naskah Artikel' : 'Tulis Artikel Baru' }}</h1>
                <p class="text-[10px] text-blue-100 uppercase tracking-widest">Kanal Edukasi Informasi Mata</p>
            </div>
            <a href="{{ route('admin.artikel.index') }}" class="text-white/80 hover:text-white text-xs font-semibold flex items-center gap-0.5">
                ← Kembali
            </a>
        </div>

        <x-breadcrumbs :paths="['Admin' => '#', 'Artikel' => route('admin.artikel.index'), ($isEdit ? 'Edit' : 'Tulis') => '#']" />

        <form wire:submit="save" class="p-5 space-y-4">
            
            <div>
                <label class="block text-xs font-bold text-blue-900 mb-1 uppercase tracking-wide">Judul Artikel Edukasi</label>
                <input type="text" wire:model="title" placeholder="Contoh: Mengenal Bahaya Gadget Pada Mata Anak"
                    class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl shadow-sm text-xs text-gray-700 focus:ring-2 focus:ring-sky-400 outline-none transition">
                @error('title') <span class="text-[10px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-bold text-blue-900 mb-1 uppercase tracking-wide">Nama Penulis</label>
                    <input type="text" wire:model="penulis" placeholder="Nama Kontributor..."
                        class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl shadow-sm text-xs text-gray-700 focus:ring-2 focus:ring-sky-400 outline-none transition">
                    @error('penulis') <span class="text-[10px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-xs font-bold text-blue-900 mb-1 uppercase tracking-wide">Opsi Publikasi</label>
                    <select wire:model="is_active" 
                        class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl shadow-sm text-xs text-gray-700 focus:ring-2 focus:ring-sky-400 outline-none transition">
                        <option value="1">Terbitkan (Active)</option>
                        <option value="0">Simpan Draft (Inactive)</option>
                    </select>
                </div>
            </div>

            <div class="bg-slate-50 p-3 rounded-xl border border-gray-150">
                <label class="block text-xs font-bold text-blue-900 mb-1 uppercase tracking-wide">Key Insight (Poin Inti Sukses)</label>
                <div class="flex gap-2 mb-2">
                    <input type="text" wire:model="newInsightItem" placeholder="Tambah kesimpulan poin ringkas..."
                        class="flex-1 px-3 py-2 bg-white border border-gray-200 rounded-lg text-xs text-gray-700 focus:ring-2 focus:ring-sky-400 outline-none transition">
                    <button type="button" wire:click="addInsight" class="bg-sky-500 hover:bg-sky-600 text-white text-xs font-bold px-3 rounded-lg transition">+</button>
                </div>
                
                <div class="flex flex-wrap gap-1.5 max-h-24 overflow-y-auto">
                    @foreach($key_insights as $index => $insight)
                        <span class="inline-flex items-center gap-1 bg-white text-slate-700 border border-gray-200 text-[10px] font-medium px-2 py-1 rounded-md shadow-sm">
                            • {{ $insight }}
                            <button type="button" wire:click="removeInsight({{ $index }})" class="text-red-500 font-bold hover:text-red-700 ml-0.5">×</button>
                        </span>
                    @endforeach
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-blue-900 mb-1 uppercase tracking-wide">Sampul Gambar Artikel</label>
                
                <div class="mb-2">
                    @if ($gambar)
                        <div class="w-full h-32 rounded-xl border overflow-hidden bg-gray-50">
                            <img src="{{ $gambar->temporaryUrl() }}" class="w-full h-full object-cover">
                        </div>
                    @elseif ($existingGambar)
                        <div class="w-full h-32 rounded-xl border overflow-hidden bg-gray-50">
                            <img src="{{ asset('storage/' . $existingGambar) }}" class="w-full h-full object-cover">
                        </div>
                    @endif
                </div>

                <input type="file" wire:model="gambar" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                <div wire:loading wire:target="gambar" class="text-[10px] text-sky-500 mt-1">⏳ Sedang mengunggah pratinjau berkas gambar...</div>
                @error('gambar') <span class="text-[10px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-blue-900 mb-1 uppercase tracking-wide">Isi Naskah Lengkap Artikel</label>
                <textarea wire:model="content" rows="6" placeholder="Tulis esai naskah artikel kesehatan mata secara komprehensif di sini..."
                    class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl shadow-sm text-xs text-gray-700 focus:ring-2 focus:ring-sky-400 outline-none transition text-justify leading-relaxed"></textarea>
                @error('content') <span class="text-[10px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-4 rounded-xl shadow-md transition text-xs flex items-center justify-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    Simpan & Publikasikan Artikel
                </button>
            </div>

        </form>
    </div>

    <div class="px-5 py-4 text-center text-[10px] text-gray-400 border-t border-gray-50 bg-slate-50">
        Sistem Pakar Deteksi Penyakit Mata Fisiologis © {{ date('Y') }}
    </div>
</div>