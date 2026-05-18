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

        // Harap pastikan nama tabel (tb_gejala, tb_penyakit, tb_rules) di bawah ini
        // sudah sesuai dengan nama tabel pada file Migration Anda.

        // ==========================================
        // 1. DATA GEJALA (G01 - G42)
        // ==========================================
        $dataGejala = [
            ['kode_gejala' => 'G01', 'nama_gejala' => 'Kabur melihat jauh', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G02', 'nama_gejala' => 'Menyipitkan mata', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G03', 'nama_gejala' => 'Sakit kepala', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G04', 'nama_gejala' => 'Kabur melihat dekat', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G05', 'nama_gejala' => 'Mata cepat lelah', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G06', 'nama_gejala' => 'Usia >40 tahun', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G07', 'nama_gejala' => 'Menjauhkan objek bacaan', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G08', 'nama_gejala' => 'Pandangan berbayang', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G09', 'nama_gejala' => 'Garis lurus tampak miring', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G10', 'nama_gejala' => 'Mata merah', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G11', 'nama_gejala' => 'Belek kental/kuning', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G12', 'nama_gejala' => 'Mata lengket saat bangun tidur', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G13', 'nama_gejala' => 'Mata berair', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G14', 'nama_gejala' => 'Gejala flu/demam', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G15', 'nama_gejala' => 'Gatal hebat', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G16', 'nama_gejala' => 'Riwayat alergi', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G17', 'nama_gejala' => 'Nyeri hebat', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G18', 'nama_gejala' => 'Silau/Fotofobia', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G19', 'nama_gejala' => 'Penurunan penglihatan mendadak', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G20', 'nama_gejala' => 'Bentuk pupil tidak teratur', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G21', 'nama_gejala' => 'Kelopak mata merah/bengkak', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G22', 'nama_gejala' => 'Kerak/sisik di bulu mata', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G23', 'nama_gejala' => 'Benjolan di dalam kelopak', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G24', 'nama_gejala' => 'Benjolan di tepi luar kelopak', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G25', 'nama_gejala' => 'Titik nanah pada benjolan', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G26', 'nama_gejala' => 'Benjolan keras di kelopak', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G27', 'nama_gejala' => 'Tidak nyeri', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G28', 'nama_gejala' => 'Tumbuh lambat', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G29', 'nama_gejala' => 'Bengkak sudut mata dekat hidung', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G30', 'nama_gejala' => 'Keluar nanah jika ditekan', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G31', 'nama_gejala' => 'Bulu mata tumbuh ke dalam', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G32', 'nama_gejala' => 'Rasa mengganjal', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G33', 'nama_gejala' => 'Pandangan seperti berasap', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G34', 'nama_gejala' => 'Lensa keruh/putih', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G35', 'nama_gejala' => 'Mual/Muntah', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G36', 'nama_gejala' => 'Melihat pelangi/halo', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G37', 'nama_gejala' => 'Penglihatan samping hilang/tunnel vision', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G38', 'nama_gejala' => 'Sering menabrak benda saat jalan', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G39', 'nama_gejala' => 'Selaput daging segitiga di putih mata', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G40', 'nama_gejala' => 'Mata sangat kering', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G41', 'nama_gejala' => 'Bercak putih/Bitot di mata', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
            ['kode_gejala' => 'G42', 'nama_gejala' => 'Rabun senja', 'deskripsi_gejala' => '-', 'created_at' => $now, 'updated_at' => $now],
        ];
        
        DB::table('gejalas')->insert($dataGejala);

        // ==========================================
        // 2. DATA PENYAKIT & PERAWATAN (P01 - P20)
        // ==========================================
        $dataPenyakit = [
            [
                'kode_penyakit' => 'P01', 'nama_penyakit' => 'Miopia', 
                'deskripsi_penyakit' => 'Kelainan refraksi mata di mana objek jauh terlihat kabur akibat kelengkungan kornea berlebih atau bola mata terlalu panjang.',
                'saran_perawatan' => 'Gunakan kacamata lensa negatif; kurangi waktu layar.', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P02', 'nama_penyakit' => 'Hipermetropia', 
                'deskripsi_penyakit' => 'Kelainan refraksi mata di mana objek dekat terlihat kabur karena bayangan jatuh di belakang retina.',
                'saran_perawatan' => 'Gunakan kacamata lensa positif (plus).', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P03', 'nama_penyakit' => 'Presbiopia', 
                'deskripsi_penyakit' => 'Kondisi hilangnya kemampuan fokus dekat secara bertahap akibat proses penuaan alami pada lensa mata.',
                'saran_perawatan' => 'Gunakan kacamata baca/lensa progresif.', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P04', 'nama_penyakit' => 'Astigmatisme', 
                'deskripsi_penyakit' => 'Kelainan kelengkungan kornea atau lensa yang menyebabkan pandangan berbayang atau distorsi pada jarak tertentu.',
                'saran_perawatan' => 'Gunakan kacamata lensa silinder.', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P05', 'nama_penyakit' => 'Konjungtivitis Bakteri', 
                'deskripsi_penyakit' => 'Infeksi bakteri pada konjungtiva yang ditandai dengan mata merah dan sekret (belek) kental kekuningan.',
                'saran_perawatan' => 'Bersihkan dengan kapas air hangat; tetes mata antibiotik.', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P06', 'nama_penyakit' => 'Konjungtivitis Viral', 
                'deskripsi_penyakit' => 'Infeksi virus pada konjungtiva yang umumnya menular, disertai mata berair dan gejala seperti flu.',
                'saran_perawatan' => 'Kompres dingin; istirahat; jangan berbagi handuk.', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P07', 'nama_penyakit' => 'Konjungtivitis Alergi', 
                'deskripsi_penyakit' => 'Reaksi inflamasi konjungtiva akibat pemicu alergen, memicu gatal hebat dan mata berair.',
                'saran_perawatan' => 'Hindari debu/pemicu; tetes mata antihistamin.', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P08', 'nama_penyakit' => 'Keratitis', 
                'deskripsi_penyakit' => 'Peradangan atau infeksi pada kornea mata yang ditandai dengan rasa nyeri hebat, silau, dan penurunan penglihatan secara mendadak.',
                'saran_perawatan' => 'Segera ke dokter; jangan pakai lensa kontak.', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P09', 'nama_penyakit' => 'Uveitis', 
                'deskripsi_penyakit' => 'Peradangan pada uvea (lapisan tengah mata) yang memerlukan penanganan segera untuk mencegah komplikasi serius.',
                'saran_perawatan' => 'Segera ke dokter; butuh penanganan spesialis segera.', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P10', 'nama_penyakit' => 'Blefaritis', 
                'deskripsi_penyakit' => 'Peradangan pada tepi kelopak mata yang ditandai dengan kerak berpasir di pangkal bulu mata dan rasa gatal.',
                'saran_perawatan' => 'Bersihkan kelopak dengan sampo bayi encer & kompres hangat.', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P11', 'nama_penyakit' => 'Hordeolum Internum', 
                'deskripsi_penyakit' => 'Infeksi kelenjar meibom di dalam kelopak mata yang menimbulkan benjolan merah, bengkak, dan nyeri.',
                'saran_perawatan' => 'Kompres hangat 15 menit, 4x sehari. Jangan dipencet.', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P12', 'nama_penyakit' => 'Hordeolum Eksternum', 
                'deskripsi_penyakit' => 'Infeksi kelenjar zeis atau moll di tepi luar kelopak mata, sering disertai titik nanah yang nyeri (bintitan).',
                'saran_perawatan' => 'Kompres hangat; salep antibiotik atas saran dokter.', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P13', 'nama_penyakit' => 'Kalazion', 
                'deskripsi_penyakit' => 'Benjolan keras non-infeksi pada kelopak mata akibat penyumbatan kronis kelenjar minyak, tumbuh lambat tanpa disertai nyeri hebat.',
                'saran_perawatan' => 'Kompres hangat; jika menetap butuh tindakan medis.', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P14', 'nama_penyakit' => 'Dakriosistitis', 
                'deskripsi_penyakit' => 'Infeksi pada kantung air mata (sakus lakrimalis) di sudut dekat hidung, memicu pembengkakan nyeri dan keluarnya nanah saat ditekan.',
                'saran_perawatan' => 'Kompres hangat; butuh antibiotik oral dari dokter.', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P15', 'nama_penyakit' => 'Trikiasis', 
                'deskripsi_penyakit' => 'Kondisi di mana bulu mata tumbuh mengarah ke dalam sehingga menggesek kornea dan menyebabkan sensasi mengganjal.',
                'saran_perawatan' => 'Cabut bulu mata oleh medis; gunakan tetes mata.', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P16', 'nama_penyakit' => 'Katarak', 
                'deskripsi_penyakit' => 'Keruhnya lensa mata yang umumnya disebabkan proses penuaan, menghalangi cahaya masuk dan membuat pandangan berkabut/seperti berasap.',
                'saran_perawatan' => 'Gunakan kacamata hitam; rencana operasi penggantian lensa.', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P17', 'nama_penyakit' => 'Glaukoma Akut', 
                'deskripsi_penyakit' => 'Peningkatan tekanan intraokular secara mendadak yang merusak saraf optik, memicu nyeri hebat, mual, dan pandangan melihat pelangi.',
                'saran_perawatan' => 'Darurat! Segera ke IGD Rumah Sakit.', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P18', 'nama_penyakit' => 'Glaukoma Kronis', 
                'deskripsi_penyakit' => 'Peningkatan tekanan mata secara lambat tanpa nyeri yang secara bertahap mempersempit lapang pandang samping (tunnel vision).',
                'saran_perawatan' => 'Kontrol tekanan mata rutin; tetes mata seumur hidup.', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P19', 'nama_penyakit' => 'Pterigium', 
                'deskripsi_penyakit' => 'Pertumbuhan jaringan selaput berbentuk segitiga pada konjungtiva yang dapat merambat ke kornea akibat paparan angin, debu, atau sinar UV.',
                'saran_perawatan' => 'Hindari debu/angin/UV; gunakan kacamata hitam & air mata buatan.', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kode_penyakit' => 'P20', 'nama_penyakit' => 'Xerophthalmia', 
                'deskripsi_penyakit' => 'Penyakit mata akibat kekurangan Vitamin A kronis, ditandai dengan mata sangat kering, bercak bitot, hingga rabun senja.',
                'saran_perawatan' => 'Konsumsi Vitamin A; tetes mata lubrikan kental.', 'created_at' => $now, 'updated_at' => $now
            ],
        ];

        DB::table('penyakits')->insert($dataPenyakit);

        // ==========================================
        // 3. DATA RULES (FORWARD CHAINING MATCHING)
        // ==========================================
        // Mapping relasi ID Penyakit (1-20) dengan ID Gejala (1-42) secara berurutan
        $dataRules = [
            // Rule P01 Miopia: G01, G02, G03
            ['penyakit_id' => 1, 'gejala_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 1, 'gejala_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 1, 'gejala_id' => 3, 'created_at' => $now, 'updated_at' => $now],

            // Rule P02 Hipermetropia: G04, G05, G03
            ['penyakit_id' => 2, 'gejala_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 2, 'gejala_id' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 2, 'gejala_id' => 3, 'created_at' => $now, 'updated_at' => $now],

            // Rule P03 Presbiopia: G06, G04, G07
            ['penyakit_id' => 3, 'gejala_id' => 6, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 3, 'gejala_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 3, 'gejala_id' => 7, 'created_at' => $now, 'updated_at' => $now],

            // Rule P04 Astigmatisme: G08, G09, G02
            ['penyakit_id' => 4, 'gejala_id' => 8, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 4, 'gejala_id' => 9, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 4, 'gejala_id' => 2, 'created_at' => $now, 'updated_at' => $now],

            // Rule P05 Konjungtivitis Bakteri: G10, G11, G12
            ['penyakit_id' => 5, 'gejala_id' => 10, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 5, 'gejala_id' => 11, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 5, 'gejala_id' => 12, 'created_at' => $now, 'updated_at' => $now],

            // Rule P06 Konjungtivitis Viral: G10, G13, G14
            ['penyakit_id' => 6, 'gejala_id' => 10, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 6, 'gejala_id' => 13, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 6, 'gejala_id' => 14, 'created_at' => $now, 'updated_at' => $now],

            // Rule P07 Konjungtivitis Alergi: G10, G15, G13, G16
            ['penyakit_id' => 7, 'gejala_id' => 10, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 7, 'gejala_id' => 15, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 7, 'gejala_id' => 13, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 7, 'gejala_id' => 16, 'created_at' => $now, 'updated_at' => $now],

            // Rule P08 Keratitis: G10, G17, G18, G19
            ['penyakit_id' => 8, 'gejala_id' => 10, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 8, 'gejala_id' => 17, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 8, 'gejala_id' => 18, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 8, 'gejala_id' => 19, 'created_at' => $now, 'updated_at' => $now],

            // Rule P09 Uveitis: G10, G17, G20
            ['penyakit_id' => 9, 'gejala_id' => 10, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 9, 'gejala_id' => 17, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 9, 'gejala_id' => 20, 'created_at' => $now, 'updated_at' => $now],

            // Rule P10 Blefaritis: G21, G22, G15
            ['penyakit_id' => 10, 'gejala_id' => 21, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 10, 'gejala_id' => 22, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 10, 'gejala_id' => 15, 'created_at' => $now, 'updated_at' => $now],

            // Rule P11 Hordeolum Internum: G23, G17, G21
            ['penyakit_id' => 11, 'gejala_id' => 23, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 11, 'gejala_id' => 17, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 11, 'gejala_id' => 21, 'created_at' => $now, 'updated_at' => $now],

            // Rule P12 Hordeolum Eksternum: G24, G17, G25
            ['penyakit_id' => 12, 'gejala_id' => 24, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 12, 'gejala_id' => 17, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 12, 'gejala_id' => 25, 'created_at' => $now, 'updated_at' => $now],

            // Rule P13 Kalazion: G26, G27, G28
            ['penyakit_id' => 13, 'gejala_id' => 26, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 13, 'gejala_id' => 27, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 13, 'gejala_id' => 28, 'created_at' => $now, 'updated_at' => $now],

            // Rule P14 Dakriosistitis: G29, G17, G30
            ['penyakit_id' => 14, 'gejala_id' => 29, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 14, 'gejala_id' => 17, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 14, 'gejala_id' => 30, 'created_at' => $now, 'updated_at' => $now],

            // Rule P15 Trikiasis: G31, G32, G13
            ['penyakit_id' => 15, 'gejala_id' => 31, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 15, 'gejala_id' => 32, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 15, 'gejala_id' => 13, 'created_at' => $now, 'updated_at' => $now],

            // Rule P16 Katarak: G33, G34, G18
            ['penyakit_id' => 16, 'gejala_id' => 33, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 16, 'gejala_id' => 34, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 16, 'gejala_id' => 18, 'created_at' => $now, 'updated_at' => $now],

            // Rule P17 Glaukoma Akut: G17, G19, G35, G36
            ['penyakit_id' => 17, 'gejala_id' => 17, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 17, 'gejala_id' => 19, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 17, 'gejala_id' => 35, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 17, 'gejala_id' => 36, 'created_at' => $now, 'updated_at' => $now],

            // Rule P18 Glaukoma Kronis: G37, G27, G38
            ['penyakit_id' => 18, 'gejala_id' => 37, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 18, 'gejala_id' => 27, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 18, 'gejala_id' => 38, 'created_at' => $now, 'updated_at' => $now],

            // Rule P19 Pterigium: G39, G32, G10
            ['penyakit_id' => 19, 'gejala_id' => 39, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 19, 'gejala_id' => 32, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 19, 'gejala_id' => 10, 'created_at' => $now, 'updated_at' => $now],

            // Rule P20 Xerophthalmia: G40, G41, G42
            ['penyakit_id' => 20, 'gejala_id' => 40, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 20, 'gejala_id' => 41, 'created_at' => $now, 'updated_at' => $now],
            ['penyakit_id' => 20, 'gejala_id' => 42, 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('rules')->insert($dataRules);
    }
}