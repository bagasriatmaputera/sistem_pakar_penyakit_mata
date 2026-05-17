<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PakarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // ==========================================
        // 1. DATA GEJALA
        // ==========================================
        $dataGejala = [
            ['kode_gejala' => 'G01', 'nama_gejala' => 'Mata Kemerahan', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G02', 'nama_gejala' => 'Mata Terasa Gatal', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G03', 'nama_gejala' => 'Keluar Kotoran Berlebih (Belekan)', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G04', 'nama_gejala' => 'Mata Berair', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G05', 'nama_gejala' => 'Pandangan Kabur / Berkabut', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G06', 'nama_gejala' => 'Sensitif Cahaya (Silau)', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G07', 'nama_gejala' => 'Terasa Mengganjal', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G08', 'nama_gejala' => 'Mata Terasa Perih / Panas', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G09', 'nama_gejala' => 'Nyeri Hebat pada Mata', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G10', 'nama_gejala' => 'Melihat Lingkaran Cahaya (Halo)', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G11', 'nama_gejala' => 'Tumbuh Selaput Berdaging', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G12', 'nama_gejala' => 'Penurunan Ketajaman Visual', 'created_at' => $now, 'updated_at' => $now],
        ];
        
        DB::table('gejalas')->insert($dataGejala);

        // ==========================================
        // 2. DATA PENYAKIT & PERAWATAN
        // ==========================================
        $dataPenyakit = [
            [
                'kode_penyakit' => 'P01', 
                'nama_penyakit' => 'Konjungtivitis', 
                'deskripsi' => 'Peradangan pada selaput transparan yang melapisi kelopak mata dan bagian putih bola mata.',
                'saran_perawatan' => 'Bersihkan mata dengan kapas steril dan air hangat. Hindari mengucek mata. Gunakan obat tetes mata antibiotik jika infeksi bakteri.',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P02', 
                'nama_penyakit' => 'Katarak', 
                'deskripsi' => 'Kondisi lensa mata yang menjadi keruh, menyebabkan penglihatan menurun seperti melihat dari balik jendela berkabut.',
                'saran_perawatan' => 'Gunakan kacamata hitam anti-UV. Jika sangat mengganggu aktivitas, segera konsultasikan ke dokter untuk penjadwalan operasi.',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P03', 
                'nama_penyakit' => 'Glaukoma', 
                'deskripsi' => 'Kerusakan saraf mata akibat tingginya tekanan di dalam bola mata. Kondisi darurat medis.',
                'saran_perawatan' => 'Segera kunjungi dokter spesialis mata terdekat untuk menurunkan tekanan bola mata. Hindari obat tetes sembarangan.',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P04', 
                'nama_penyakit' => 'Sindrom Mata Kering', 
                'deskripsi' => 'Kondisi di mana air mata tidak dapat memberikan pelumasan yang cukup untuk mata.',
                'saran_perawatan' => 'Gunakan metode 20-20-20 saat menatap layar. Gunakan obat tetes air mata buatan (Artificial Tears).',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P05', 
                'nama_penyakit' => 'Pterigium', 
                'deskripsi' => 'Pertumbuhan selaput jaringan berdaging yang menutupi bagian putih mata, biasanya karena paparan sinar matahari.',
                'saran_perawatan' => 'Gunakan kacamata hitam/pelindung debu. Gunakan tetes mata pelembap. Diperlukan operasi jika selaput menutupi kornea.',
                'created_at' => $now, 'updated_at' => $now
            ],
        ];

        DB::table('penyakits')->insert($dataPenyakit);

        // ==========================================
        // 3. DATA RULES (FORWARD CHAINING)
        // ==========================================
        // Catatan: ID 1-5 adalah ID Penyakit, sedangkan gejala_id sesuai urutan 1-12.
        $dataRules = [
            // Rule P01 Konjungtivitis: Butuh G01, G02, G03, G04
            ['penyakit_id' => 1, 'gejala_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 1, 'gejala_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 1, 'gejala_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 1, 'gejala_id' => 4, 'created_at' => $now, 'updated_at' => $now],

            // Rule P02 Katarak: Butuh G05, G06, G12
            ['penyakit_id' => 2, 'gejala_id' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 2, 'gejala_id' => 6, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 2, 'gejala_id' => 12, 'created_at' => $now, 'updated_at' => $now],

            // Rule P03 Glaukoma: Butuh G01, G05, G09, G10
            ['penyakit_id' => 3, 'gejala_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 3, 'gejala_id' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 3, 'gejala_id' => 9, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 3, 'gejala_id' => 10, 'created_at' => $now, 'updated_at' => $now],

            // Rule P04 Mata Kering: Butuh G01, G07, G08
            ['penyakit_id' => 4, 'gejala_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 4, 'gejala_id' => 7, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 4, 'gejala_id' => 8, 'created_at' => $now, 'updated_at' => $now],

            // Rule P05 Pterigium: Butuh G01, G07, G11
            ['penyakit_id' => 5, 'gejala_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 5, 'gejala_id' => 7, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 5, 'gejala_id' => 11, 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('rules')->insert($dataRules);
    }
}