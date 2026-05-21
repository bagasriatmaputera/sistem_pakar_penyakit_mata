<?php

namespace App\Services;

use App\Models\Penyakit;
use App\Models\Riwayat;
use Illuminate\Support\Carbon;

class MethodService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
    }

    public function determineDisease(array $data){
        $akurasi = 100;
        $inputGejala = $data['gejala_terpilih'];
        $penyakits = Penyakit::with('gejalas')->get();

        foreach ($penyakits as $penyakit){
            $syaratGejala = $penyakit->gejalas->pluck('id')->toArray();
            if (empty($syaratGejala)) continue;
            $kecocokan = array_intersect($syaratGejala, $inputGejala);
            $totalGejala = count($syaratGejala);
            $totalKecocokan = count($kecocokan);
            $akurasi = ($totalKecocokan/$totalGejala) * 100;

            Riwayat::create([
                'nama_pasien' => $data['nama_pasien'],
                'usia' => $data['usia'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'gejala_terpilih' => $inputGejala,
                'penyakit_id' => $penyakit->id,
                'tingkat_akurasi' => round($akurasi, 2)
            ]);
        }
    }

    public function getResults(string $namaPasien){
        return Riwayat::with('penyakit')->where('nama_pasien', $namaPasien)->where('tingkat_akurasi', '>=', 40)->latest()->get();
    }
}
