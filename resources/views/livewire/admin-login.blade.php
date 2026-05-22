<div class="max-w-md mx-auto bg-white min-h-screen shadow-lg flex flex-col justify-between font-sans">
    <div>
        <div class="bg-slate-900 p-6 text-white text-center rounded-b-2xl shadow-md">
            <h1 class="text-xl font-black tracking-wide">Admin Gerbang Masuk</h1>
            <p class="text-[9px] text-slate-400 uppercase tracking-widest mt-0.5">Otorisasi Pangkalan Pengetahuan</p>
        </div>

        <x-breadcrumbs :paths="['Sign In' => '#']" />

        <form wire:submit="login" class="p-6 space-y-4">
            
            @if (session()->has('error'))
                <div x-init="$el.scrollIntoView({ behavior: 'smooth', block: 'center' })"
                     class="text-xs text-red-700 bg-red-50 p-3 rounded-xl border border-red-200 text-justify">
                    ⚠️ {{ session('error') }}
                </div>
            @endif

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1 uppercase">Email Administrator</label>
                <input type="email" wire:model="email" placeholder="admin@email.com"
                    class="w-full px-4 py-3 bg-slate-50 border border-gray-200 rounded-xl text-xs text-gray-700 focus:ring-2 focus:ring-slate-800 focus:bg-white outline-none transition">
                @error('email') <span class="text-[10px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1 uppercase">Kata Sandi</label>
                <input type="password" wire:model="password" placeholder="••••••••"
                    class="w-full px-4 py-3 bg-slate-50 border border-gray-200 rounded-xl text-xs text-gray-700 focus:ring-2 focus:ring-slate-800 focus:bg-white outline-none transition">
                @error('password') <span class="text-[10px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-slate-900 hover:bg-black text-white font-bold py-3 rounded-xl shadow-md text-xs tracking-wide transition flex items-center justify-center gap-1">
                    Masuk ke Sistem Kendali →
                </button>
            </div>
        </form>
    </div>

    <div class="p-4 bg-slate-50 border-t border-gray-100 text-center">
        <a href="{{ route('home') }}" class="text-xs font-bold text-sky-600 hover:underline">
            ← Kembali ke Menu Utama Pasien
        </a>
    </div>
</div>