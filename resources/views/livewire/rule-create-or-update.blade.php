<div class="max-w-md mx-auto bg-white min-h-screen shadow-lg flex flex-col justify-between font-sans">
    <div>
        <div class="bg-gradient-to-b from-blue-700 to-sky-500 p-5 text-white flex items-center justify-between rounded-b-xl shadow-md">
            <div>
                <h1 class="text-base font-bold tracking-wide">{{ $isEdit ? 'Ubah Matriks Aturan' : 'Tambah Hubungan Aturan' }}</h1>
                <p class="text-[10px] text-blue-100 uppercase tracking-widest">Pangkalan Pengetahuan (Knowledge Base)</p>
            </div>
            <a href="{{ route('admin.rule.index') }}" class="text-white/80 hover:text-white text-xs font-semibold flex items-center gap-0.5">
                ← Kembali
            </a>
        </div>

        <x-breadcrumbs :paths="['Admin' => '#', 'Aturan' => route('admin.rule.index'), ($isEdit ? 'Edit' : 'Create') => '#']" />

        <form wire:submit="save" class="p-5 space-y-4">

            @if (session()->has('error'))
                <div class="text-xs text-red-700 bg-red-50 p-4 rounded-xl border border-red-200 shadow-sm leading-relaxed text-justify">
                    <strong>⚠️ Peringatan Duplikasi:</strong> {{ session('error') }}
                </div>
            @endif

            <div>
                <label class="block text-xs font-bold text-blue-900 mb-1 uppercase tracking-wide">Langkah 1: Pilih Target Penyakit (IF)</label>
                <select wire:model.live="penyakit_id" 
                    class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl shadow-sm text-xs font-medium text-gray-700 focus:ring-2 focus:ring-sky-400 outline-none transition">
                    <option value="">-- Pilih Kode / Nama Penyakit Kelainan --</option>
                    @foreach($listPenyakit as $p)
                        <option value="{{ $p->id }}">{{ $p->kode_penyakit }} - {{ $p->nama_penyakit }}</option>
                    @endforeach
                </select>
                @error('penyakit_id') <span class="text-[10px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-blue-900 mb-1 uppercase tracking-wide">Langkah 2: Hubungkan Indikator Gejala (THEN)</label>
                
                @if($isEdit)
                    <select wire:model="gejala_id" 
                        class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl shadow-sm text-xs text-gray-700 focus:ring-2 focus:ring-sky-400 outline-none transition">
                        <option value="">-- Pilih Gejala --</option>
                        @foreach($listGejala as $g)
                            <option value="{{ $g->id }}">{{ $g->kode_gejala }} - {{ $g->nama_gejala }}</option>
                        @endforeach
                    </select>
                    @error('gejala_id') <span class="text-[10px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                @else
                    <p class="text-[10px] text-gray-400 mb-2 italic">*Anda bisa mencentang beberapa gejala sekaligus untuk penyakit yang dipilih di atas.</p>
                    <div class="grid grid-cols-1 gap-2 max-h-60 overflow-y-auto pr-1 border border-gray-100 rounded-xl p-3 bg-slate-50/50">
                        @foreach($listGejala as $g)
                            <label class="flex items-start gap-2.5 p-2 bg-white rounded-lg border border-gray-150 text-xs text-gray-700 font-medium cursor-pointer hover:bg-blue-50/40 transition">
                                <input type="checkbox" wire:model="gejala_ids" value="{{ $g->id }}"
                                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-400 mt-0.5">
                                <div>
                                    <span class="font-black text-blue-700 text-[10px] bg-blue-50 px-1 rounded mr-1">{{ $g->kode_gejala }}</span>
                                    <span>{{ $g->nama_gejala }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                    @error('gejala_ids') <span class="text-[10px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                @endif
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-4 rounded-xl shadow-md transition text-xs flex items-center justify-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    Simpan Relasi Logika Pakar
                </button>
            </div>

        </form>
    </div>

    <div class="px-5 py-4 text-center text-[10px] text-gray-400 border-t border-gray-50 bg-slate-50">
        Sistem Pakar Deteksi Penyakit Mata Fisiologis © {{ date('Y') }}
    </div>
</div>