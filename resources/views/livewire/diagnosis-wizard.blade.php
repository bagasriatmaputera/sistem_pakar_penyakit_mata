<div class="max-w-md mx-auto bg-slate-50 min-h-screen shadow-lg flex flex-col justify-between font-sans">
    
    <div class="bg-gradient-to-b from-blue-700 to-sky-500 p-6 text-white text-center rounded-b-xl shadow-md">
        <div class="flex justify-center items-center gap-2 mb-1">
            <div class="bg-white/20 p-2 rounded-full">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
            </div>
            <h1 class="text-2xl font-bold tracking-wide">Sistem Pakar Penyakit Mata</h1>
        </div>
        <p class="text-xs text-blue-100 uppercase tracking-widest">Analisis Gejala (Mata)</p>
    </div>

    <div class="p-5 flex-1">
        
        <div class="flex items-center justify-between mb-6 px-4">
            @foreach([1 => 'Gejala', 2 => 'Detail', 3 => 'Tinjauan', 4 => 'Hasil'] as $step => $label)
                <div class="flex flex-col items-center flex-1 relative">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold shadow-sm transition-all duration-300
                        {{ $currentStep === $step ? 'bg-sky-500 text-white ring-4 ring-sky-100' : ($currentStep > $step ? 'bg-blue-600 text-white' : 'bg-white text-gray-400 border border-gray-200') }}">
                        {{ $step }}
                    </div>
                    <span class="text-[10px] mt-1 font-medium {{ $currentStep === $step ? 'text-sky-600 font-semibold' : 'text-gray-400' }}">{{ $label }}</span>
                    
                    @if($step < 4)
                        <div class="absolute top-4 left-[60%] right-[-40%] h-[2px] -z-10 {{ $currentStep > $step ? 'bg-blue-500' : 'bg-gray-200' }}"></div>
                    @endif
                </div>
            @endforeach
        </div>

        @if($currentStep === 1)
            <div>
                <h2 class="text-blue-900 font-semibold text-base mb-3">Apa saja gejala yang Anda rasakan?</h2>
                
                <div class="relative mb-4">
                    <input type="text" wire:model.live="search" placeholder="Cari gejala..." 
                        class="w-full pl-4 pr-10 py-3 bg-white border-none rounded-xl shadow-sm focus:ring-2 focus:ring-sky-400 text-sm placeholder-gray-400 text-gray-700 transition">
                    <span class="absolute right-3 top-3.5 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                </div>

                @if(count($selectedSymptoms) > 0)
                    <div class="mb-5">
                        <h3 class="text-xs font-semibold text-blue-900 mb-2 flex items-center gap-1">
                            <svg class="w-4 h-4 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            Gejala Terpilih ({{ count($selectedSymptoms) }})
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($selectedGejalaItems as $item)
                                <span class="inline-flex items-center gap-1 bg-sky-500 text-white text-xs font-medium px-3 py-1.5 rounded-full shadow-sm animation-all duration-200">
                                    {{ $item->nama_gejala }}
                                    <button type="button" wire:click="toggleSymptom({{ $item->id }})" class="focus:outline-none hover:bg-sky-600 rounded-full p-0.5">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="mb-4 text-xs text-red-600 bg-red-50 p-3 rounded-lg border border-red-200">
                        {{ session('error') }}
                    </div>
                @endif

                <h3 class="text-xs font-semibold text-blue-900 mb-2">Gejala Umum</h3>
                <div class="grid grid-cols-2 gap-3 max-h-72 overflow-y-auto pr-1">
                    @forelse($gejalas as $gejala)
                        @php
                            $isActive = in_array($gejala->id, $selectedSymptoms);
                        @endphp
                        <button type="button" wire:click="toggleSymptom({{ $gejala->id }})"
                            class="p-4 text-left rounded-xl shadow-sm transition text-xs font-medium border flex items-center justify-between
                            {{ $isActive ? 'bg-sky-500 text-white border-sky-500' : 'bg-white text-blue-900 hover:bg-blue-50 border-white' }}">
                            <span>{{ $gejala->nama_gejala }}</span>
                            @if($isActive)
                                <svg class="w-4 h-4 text-white shrink-0 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            @endif
                        </button>
                    @empty
                        <div class="col-span-2 text-center py-6 text-gray-400 text-xs">
                            Gejala tidak ditemukan.
                        </div>
                    @endforelse
                </div>
            </div>
        @endif

        @if($currentStep === 2)
            <div class="text-center py-10">
                <h2 class="text-lg font-bold text-blue-900 mb-2">Tahap 2: Detail Analisis</h2>
                <p class="text-sm text-gray-500 mb-4">Sistem sedang memproses data gejala yang Anda masukkan menggunakan metode *forward chaining*.</p>
                <button wire:click="$set('currentStep', 1)" class="text-xs text-sky-500 font-semibold hover:underline">← Kembali ke input gejala</button>
            </div>
        @endif
    </div>

    @if($currentStep === 2)
        <div class="p-5 bg-white border-t border-gray-100 text-center rounded-t-xl shadow-inner">
            <h2 class="text-blue-900 font-semibold text-base mb-1">Informasi Pengguna</h2>
            <p class="text-xs text-gray-500 mb-4">Mohon lengkapi biodata Anda sebelum melanjutkan proses diagnosis.</p>

            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-blue-900 mb-1">Nama Lengkap Pasien</label>
                    <input type="text" wire:model="nama_pasien" placeholder="Masukkan nama Anda..."
                        class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-sky-400 text-sm text-gray-700 transition">
                    @error('nama_pasien') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-semibold text-blue-900 mb-1">Usia (Tahun)</label>
                        <input type="number" wire:model="usia" placeholder="Contoh: 25"
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-sky-400 text-sm text-gray-700 transition">
                        @error('usia') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-blue-900 mb-1">Jenis Kelamin</label>
                        <select wire:model="jenis_kelamin" 
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-sky-400 text-sm text-gray-700 transition">
                            <option value="">Pilih...</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('jenis_kelamin') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <button type="button" wire:click="previousStep" class="mt-6 text-xs text-gray-500 font-semibold hover:underline flex items-center gap-1">
                ← Kembali ke Pilih Gejala
            </button>
        </div>
    @endif

    @if($currentStep === 3)
        <div class="p-5 bg-white border-t border-gray-100 text-center rounded-t-xl shadow-inner">
            <h2 class="text-blue-900 font-semibold text-base mb-1">Tinjau Data Sesi Konsultasi</h2>
            <p class="text-xs text-gray-500 mb-4">Periksa kembali kesesuaian data Anda sebelum sistem memproses diagnosis akhir.</p>

            <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 mb-4">
                <h3 class="text-xs font-bold text-blue-900 uppercase tracking-wider mb-2 pb-1 border-b border-gray-100">Profil Pasien</h3>
                <table class="text-xs w-full text-gray-600 space-y-1">
                    <tr>
                        <td class="py-1 w-24 font-medium">Nama</td>
                        <td class="py-1 text-gray-800 font-semibold">: {{ $nama_pasien }}</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-medium">Usia</td>
                        <td class="py-1 text-gray-800">: {{ $usia }} Tahun</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-medium">Jenis Kelamin</td>
                        <td class="py-1 text-gray-800">: {{ $jenis_kelamin }}</td>
                    </tr>
                </table>
            </div>

            <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 mb-4">
                <h3 class="text-xs font-bold text-blue-900 uppercase tracking-wider mb-2 pb-1 border-b border-gray-100">Gejala Yang Dikeluhkan</h3>
                <div class="flex flex-wrap gap-1.5 max-h-32 overflow-y-auto">
                    @foreach($selectedGejalaItems as $item)
                        <span class="bg-blue-50 text-blue-800 text-[11px] font-medium px-2.5 py-1 rounded-lg border border-blue-100">
                            ✓ {{ $item->nama_gejala }}
                        </span>
                    @endforeach
                </div>
            </div>

            <div class="bg-amber-50 border border-amber-200 rounded-xl p-3 text-amber-900 text-xs space-y-2 mb-4">
                <p class="font-semibold flex items-center gap-1">
                    ⚠️ PERNYATAAN / DISCLAIMER
                </p>
                <p class="text-[11px] text-amber-800 leading-relaxed">
                    Sistem pakar ini dirancang sebagai sarana edukasi dan identifikasi awal berdasarkan indikator klinis yang umum ditemui. Hasil aplikasi ini bukan merupakan resep atau vonis mutlak pengganti konsultasi klinis bersama dokter spesialis mata.
                </p>
                <label class="flex items-center gap-2 pt-1 font-medium text-amber-950 cursor-pointer">
                    <input type="checkbox" wire:model.live="setuju_disclaimer" class="rounded border-amber-300 text-amber-600 focus:ring-amber-400">
                    Saya memahami dan menyetujui.
                </label>
            </div>

            @if (session()->has('error'))
                <div class="text-xs text-red-600 bg-red-50 p-2 rounded-lg border border-red-200 mb-3">
                    {{ session('error') }}
                </div>
            @endif

            <button type="button" wire:click="previousStep" class="text-xs text-gray-500 font-semibold hover:underline flex items-center gap-1">
                ← Ubah Data Diri / Gejala
            </button>
        </div>
    @endif

    <div class="p-5 bg-white border-t border-gray-100 text-center rounded-t-xl shadow-inner">
        
        @if($currentStep < 4)
            <button type="button" wire:click="nextStep"
                class="w-full bg-sky-500 hover:bg-sky-600 text-white font-semibold py-3 px-4 rounded-xl shadow-md transition flex items-center justify-center gap-1 text-sm disabled:opacity-50">
                
                <span>
                    @if($currentStep === 1)
                        Lanjutkan ke Detail
                    @elseif($currentStep === 2)
                        Lanjutkan ke Tinjauan
                    @elseif($currentStep === 3)
                        Mulai Proses Diagnosis
                    @endif
                </span>

                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
        @else
            <button type="button" wire:click="$set('currentStep', 1)"
                class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 px-4 rounded-xl shadow-md transition flex items-center justify-center gap-1 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 12H21"></path></svg>
                <span>Konsultasi Ulang</span>
            </button>
        @endif

        <span class="text-[11px] text-gray-400 block mt-2 font-medium">
            {{ count($selectedSymptoms) }} gejala telah Anda pilih
        </span>
    </div>
</div>