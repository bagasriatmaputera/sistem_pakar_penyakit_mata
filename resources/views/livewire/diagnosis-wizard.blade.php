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

    @php
        $stepLabels = [
            1 => 'Pilih Gejala',
            2 => 'Detail Pasien',
            3 => 'Tinjauan Data',
            4 => 'Hasil Diagnosis'
        ];
    @endphp

    <x-breadcrumbs :paths="[
        'Diagnosis' => route('diagnosis.wizard'),
        $stepLabels[$currentStep] => '#'
    ]" />

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

                @if(count($form['gejala_terpilih']) > 0)
                    <div class="mb-5">
                        <h3 class="text-xs font-semibold text-blue-900 mb-2 flex items-center gap-1">
                            <svg class="w-4 h-4 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            Gejala Terpilih ({{ count($form['gejala_terpilih']) }})
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
                            $isActive = in_array($gejala->id, $form['gejala_terpilih']);
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
            <div>
                <h2 class="text-blue-900 font-semibold text-base mb-1">Informasi Pengguna</h2>
                <p class="text-xs text-gray-500 mb-4">Mohon lengkapi biodata Anda sebelum melanjutkan proses diagnosis.</p>

                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-blue-900 mb-1">Nama Lengkap Pasien</label>
                        <input type="text" wire:model="form.nama_pasien" placeholder="Masukkan nama Anda..."
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-sky-400 text-sm text-gray-700 transition">
                        @error('form.nama_pasien') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-blue-900 mb-1">Usia (Tahun)</label>
                            <input type="number" wire:model="form.usia" placeholder="Contoh: 25"
                                class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-sky-400 text-sm text-gray-700 transition">
                            @error('form.usia') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-blue-900 mb-1">Jenis Kelamin</label>
                            <select wire:model="form.jenis_kelamin" 
                                class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-sky-400 text-sm text-gray-700 transition">
                                <option value="">Pilih...</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('form.jenis_kelamin') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <button type="button" wire:click="previousStep" class="mt-6 text-xs text-gray-500 font-semibold hover:underline flex items-center gap-1">
                    ← Kembali ke Pilih Gejala
                </button>
            </div>
        @endif

        @if($currentStep === 3)
            <div>
                <h2 class="text-blue-900 font-semibold text-base mb-1">Tinjau Data Sesi Konsultasi</h2>
                <p class="text-xs text-gray-500 mb-4">Periksa kembali kesesuaian data Anda sebelum sistem memproses diagnosis akhir.</p>

                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 mb-4">
                    <h3 class="text-xs font-bold text-blue-900 uppercase tracking-wider mb-2 pb-1 border-b border-gray-100">Profil Pasien</h3>
                    <table class="text-xs w-full text-gray-600 space-y-1">
                        <tr>
                            <td class="py-1 w-24 font-medium">Nama</td>
                            <td class="py-1 text-gray-800 font-semibold">: {{ $form['nama_pasien'] }}</td>
                        </tr>
                        <tr>
                            <td class="py-1 font-medium">Usia</td>
                            <td class="py-1 text-gray-800">: {{ $form['usia'] }} Tahun</td>
                        </tr>
                        <tr>
                            <td class="py-1 font-medium">Jenis Kelamin</td>
                            <td class="py-1 text-gray-800">: {{ $form['jenis_kelamin'] }}</td>
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
                        <input type="checkbox" wire:model.live="form.setuju_disclaimer" class="rounded border-amber-300 text-amber-600 focus:ring-amber-400">
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
        
        @if($currentStep === 4)
            <div class="space-y-5 animate-fade-in">
                
                @if($apakahMelebihiBatas)
                    <div class="bg-red-50 border border-red-200 rounded-2xl p-5 text-center space-y-3 shadow-sm">
                        <div class="inline-flex bg-red-100 p-3 rounded-full text-red-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <h2 class="text-sm font-bold text-red-900">Indikasi Gejala Terlalu Kompleks</h2>
                        <p class="text-xs text-red-800 leading-relaxed text-justify font-normal">
                            Anda memilih sebanyak <span class="font-bold text-red-700">{{ count($form['gejala_terpilih']) }} gejala</span>. Jumlah keluhan yang terlalu banyak berpotensi menimbulkan bias diagnosis pada sistem. Demi keselamatan kesehatan mata Anda, sistem sangat menyarankan untuk segera melakukan **Konsultasi Langsung dengan Dokter Spesialis Mata** di fasilitas kesehatan terdekat.
                        </p>

                        <div class="pt-2">
                            <a href="https://www.google.com/maps/search/?api=1&query=Klinik+Mata+Terdekat" target="_blank" rel="noopener noreferrer"
                                class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 px-4 rounded-xl shadow-md transition flex items-center justify-center gap-1.5 text-xs">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Cari Rumah Sakit / Dokter Mata Terdekat
                            </a>
                        </div>
                    </div>

                @else

                    @if($hasilRiwayat && count($hasilRiwayat) > 0)
                        <div class="text-center">
                            <div class="inline-flex bg-emerald-100 p-3 rounded-full text-emerald-600 mb-2">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-lg font-bold text-blue-900">Hasil Diagnosis Selesai</h2>
                            <p class="text-[11px] text-gray-400">Data rekam riwayat pemeriksaan klinis mata pasien</p>
                        </div>

                        @foreach($hasilRiwayat as $index => $riwayat)
                            <div class="bg-white rounded-2xl shadow-sm border border-gray-150 overflow-hidden mb-4">
                                <div class="bg-blue-900 px-4 py-2.5 text-white font-bold text-xs uppercase tracking-wider flex justify-between items-center">
                                    <span>Laporan Hasil Analisis #{{ $index + 1 }}</span>
                                    <span class="text-[10px] bg-white/20 px-2 py-0.5 rounded text-blue-100">
                                        {{ \Carbon\Carbon::parse($riwayat->created_at)->translatedFormat('d M Y') }}
                                    </span>
                                </div>
                                
                                <table class="w-full text-left border-collapse text-[11px]">
                                    <tbody>
                                        <tr class="border-b border-gray-100">
                                            <td class="px-4 py-2.5 font-semibold text-gray-500 w-32 bg-slate-50/50">Nama Pasien</td>
                                            <td class="px-4 py-2.5 text-gray-800 font-bold">{{ $riwayat->nama_pasien }}</td>
                                        </tr>
                                        <tr class="border-b border-gray-100">
                                            <td class="px-4 py-2.5 font-semibold text-gray-500 bg-slate-50/50">Karakteristik</td>
                                            <td class="px-4 py-2.5 text-gray-700">{{ $riwayat->usia }} Tahun / {{ $riwayat->jenis_kelamin }}</td>
                                        </tr>
                                        <tr class="border-b border-gray-100">
                                            <td class="px-4 py-2.5 font-semibold text-gray-500 bg-slate-50/50">Hasil Diagnosis</td>
                                            <td class="px-4 py-2.5 text-blue-900 font-black text-sm">
                                                {{ $riwayat->penyakit->nama_penyakit ?? 'Tidak Terdeteksi' }}
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-100">
                                            <td class="px-4 py-2.5 font-semibold text-gray-500 bg-slate-50/50">Akurasi Sistem</td>
                                            <td class="px-4 py-2.5 text-gray-700">
                                                <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded border border-emerald-100">
                                                    {{ $riwayat->tingkat_akurasi }}%
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-100">
                                            <td class="px-4 py-2.5 font-semibold text-gray-500 bg-slate-50/50 align-top">Saran Perawatan</td>
                                            <td class="px-4 py-2.5 text-gray-600 leading-relaxed text-justify">
                                                {{ $riwayat->penyakit->saran_perawatan ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2.5 font-semibold text-gray-500 bg-slate-50/50 align-top">Aksi Laporan</td>
                                            <td class="px-4 py-2.5">
                                                <a href="{{ url('/riwayat/export-pdf/' . $riwayat->id) }}" target="_blank"
                                                    class="inline-flex items-center gap-1 text-[10px] bg-red-50 text-red-700 border border-red-200 font-bold px-2.5 py-1 rounded hover:bg-red-100 transition">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                    </svg>
                                                    Cetak PDF Laporan #{{ $index + 1 }}
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endforeach

                        <div class="pt-2">
                            <a href="https://www.google.com/maps/search/?api=1&query=Klinik+Mata+Terdekat" target="_blank" rel="noopener noreferrer"
                                class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 px-4 rounded-xl shadow-md transition flex items-center justify-center gap-1.5 text-xs">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Cari Klinik Mata Terdekat (Google Maps)
                            </a>
                        </div>

                    @else
                        <div class="space-y-4">
                            <div class="bg-amber-50 border border-amber-200 rounded-2xl p-5 text-center space-y-3 shadow-sm">
                                <div class="inline-flex bg-amber-100 p-2.5 rounded-full text-amber-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-sm font-bold text-amber-900">Hasil Diagnosis Belum Konklusif</h3>
                                <p class="text-xs text-amber-800 leading-relaxed text-justify font-normal">
                                    Sistem mendeteksi bahwa kombinasi gejala yang Anda masukkan belum cukup kuat untuk merujuk pada salah satu jenis kelainan mata secara pasti (Akurasi di bawah $40\%$). Hal ini wajar jika keluhan baru masuk stadium awal atau membutuhkan uji refraksi fisik.
                                </p>
                            </div>

                            <div class="bg-white rounded-2xl border border-gray-150 p-4 space-y-3 text-left">
                                <h4 class="text-xs font-bold text-blue-900 uppercase tracking-wider flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                    Rekomendasi Tindakan Anda:
                                </h4>
                                <ul class="space-y-2.5 text-[11px] text-gray-600">
                                    <li class="flex items-start gap-2">
                                        <span class="text-sky-500 font-bold shrink-0">1.</span>
                                        <span><strong>Evaluasi Keluhan:</strong> Silakan lakukan pemicuan konsultasi ulang jika indikasi visual mata terasa semakin jelas atau mengganggu aktivitas.</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="text-sky-500 font-bold shrink-0">2.</span>
                                        <span><strong>Pemeriksaan Snellen Chart:</strong> Anda disarankan mendatangi optik/klinik fisik untuk mengukur tajam penglihatan secara langsung menggunakan papan huruf.</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="pt-2 space-y-2">
                                <a href="https://www.google.com/maps/search/?api=1&query=Klinik+Mata+Terdekat" target="_blank" rel="noopener noreferrer"
                                   class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 px-4 rounded-xl shadow-md transition flex items-center justify-center gap-1.5 text-xs">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Cari Optik / Fasilitas Kesehatan Terdekat
                                </a>

                                <a href="{{ route('artikel.index') }}" 
                                   class="w-full bg-white border border-gray-200 hover:bg-slate-50 text-blue-900 font-bold py-3 px-4 rounded-xl shadow-sm transition flex items-center justify-center gap-1.5 text-xs">
                                    <svg class="w-4 h-4 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    Buka Artikel Edukasi Kesehatan Mata
                                </a>
                            </div>
                        </div>
                    @endif

                @endif

            </div>
        @endif
    </div>

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
            <button type="button" wire:click="resetKonsultasi" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 px-4 rounded-xl shadow-md transition flex items-center justify-center gap-1 text-sm">
                <span>Konsultasi Ulang</span>
            </button>
        @endif

        <span class="text-[11px] text-gray-400 block mt-2 font-medium">
            {{ count($form['gejala_terpilih']) }} gejala telah Anda pilih
        </span>
    </div>

</div>