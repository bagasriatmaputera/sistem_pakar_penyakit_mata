<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $dataArtikel = [
            // 1. MIOPIA (P01)
            [
                'title' => 'Mengenal Miopia: Penyebab Penglihatan Kabur Jarak Jauh pada Usia Produktif',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Disebabkan oleh kelengkungan kornea yang terlalu besar atau sumbu bola mata yang terlalu panjang.',
                    'Faktor risiko meningkat drastis akibat tingginya durasi menatap layar (screen time) dan kurangnya aktivitas luar ruangan.',
                    'Penggunaan kacamata lensa negatif (minus) membantu memfokuskan kembali bayangan tepat pada retina.'
                ],
                'content' => 'Miopia, atau yang akrab dikenal sebagai rabun jauh, merupakan salah satu kelainan refraksi mata yang paling banyak ditemui pada generasi muda dan usia produktif saat ini. Kondisi patologis ini terjadi ketika bayangan objek yang masuk ke mata jatuh di depan retina, alih-alih tepat di permukaannya. Akibatnya, penderita akan merasakan penurunan ketajaman visual secara signifikan saat mencoba memfokuskan pandangan pada objek-objek yang letaknya jauh, sementara penglihatan jarak dekat umumnya tetap berjalan normal tanpa hambatan klinis.' . "\n\n" . 'Faktor genetika memang memegang peranan penting dalam perkembangan miopia, namun perubahan gaya hidup digital dituding sebagai pemicu utama lonjakan kasus dalam beberapa dekade terakhir. Kebiasaan melakukan aktivitas jarak dekat secara intensif, seperti membaca dalam durasi lama, bekerja di depan monitor, dan bermain gawai dalam pencahayaan yang redup, memaksa otot siliaris mata bekerja ekstra keras. Untuk penanganan awal, penderita sangat disarankan menggunakan koreksi kacamata lensa negatif, menerapkan aturan istirahat mata 20-20-20, serta meningkatkan paparan cahaya alami melalui aktivitas luar ruangan.',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],

            // 2. HIPERMETROPIA (P02)
            [
                'title' => 'Hipermetropia dan Dampaknya pada Penurunan Ketajaman Fokus Jarak Dekat',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Terjadi karena ukuran bola mata terlalu pendek secara aksial atau daya bias kornea terlalu lemah.',
                    'Memicu keluhan astenopia seperti mata cepat lelah, tegang, dan sakit kepala berulang saat membaca.',
                    'Dapat dikoreksi secara optimal menggunakan lensa cembung/positif (plus) untuk memajukan fokus bayangan.'
                ],
                'content' => 'Hipermetropia atau rabun dekat adalah gangguan fungsi penglihatan di mana penderita mengalami kesulitan yang signifikan untuk melihat atau memfokuskan objek yang berada dalam jarak dekat secara jernih. Secara anatomis, kondisi ini bertolak belakang dengan miopia, sebab hipermetropia dipicu oleh kondisi fisik bola mata yang terlalu pendek atau bentuk kornea yang kurang melengkung. Hal tersebut mengakibatkan berkas cahaya atau sinar pembiasan yang masuk ke dalam organ mata terfokus pada satu titik logis yang berada di belakang lapisan retina, sehingga menghasilkan tangkapan visual yang kabur.' . "\n\n" . 'Pasien hipermetropia sering kali tidak menyadari kelainan ini pada stadium awal karena kemampuan akomodasi otot mata yang masih kuat untuk memaksakan fokus. Namun, pemaksaan daya akomodasi ini secara terus-menerus akan menimbulkan gejala klinis penyerta (astenopia) seperti rasa pegal pada bola mata, mata cepat lelah, hingga sakit kepala yang berpusat di area dahi setelah beraktivitas dekat. Penanganan medis yang paling aman dan efektif untuk mengatasi gangguan relasional ini adalah dengan menggunakan alat bantu kacamata berlensa positif (plus) guna membantu memajukan titik fokus cahaya agar jatuh tepat di area makula retina.',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],

            // 3. PRESBIOPIA (P03)
            [
                'title' => 'Memahami Presbiopia: Proses Penuaan Alami Daya Akomodasi Lensa Mata',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Merupakan degenerasi fisiologis alami yang mulai terjadi pada individu berusia di atas 40 tahun.',
                    'Disebabkan oleh hilangnya elastisitas kapsul lensa dan penurunan kekuatan otot siliaris.',
                    'Ditandai secara khas dengan kecenderungan menjauhkan objek atau naskah bacaan agar tulisan terlihat jelas.'
                ],
                'content' => 'Presbiopia atau mata tua bukanlah sebuah penyakit patologis murni, melainkan sebuah proses degenerasi fisiologis alami yang berkaitan erat dengan pertambahan usia manusia, umumnya mulai bermanifestasi saat menginjak usia 40 tahun ke atas. Pada kondisi normal, lensa mata manusia bersifat sangat fleksibel dan elastis, sehingga mampu mencembung atau memipih dengan mudah untuk memfokuskan pandangan. Namun, seiring berjalannya waktu, terjadi pengerasan materi lensa secara bertahap yang dibarengi dengan penurunan kekuatan kontraksi otot siliaris, sehingga mata kehilangan daya akomodasi alaminya untuk menangkap objek jarak dekat.' . "\n\n" . 'Gejala klinis presbiopia sangat mudah dikenali secara kasat mata melalui perilaku penderita yang refleks menjauhkan kertas, buku, atau gawai dari posisi mata agar tulisan yang berukuran kecil dapat terbaca dengan jelas. Selain pandangan yang buram saat membaca normal, penderita juga kerap mengeluhkan mata terasa perih dan berair jika dipaksakan melihat dekat dalam waktu lama. Solusi terbaik untuk mengembalikan kenyamanan visual dan produktivitas penderita presbiopia adalah dengan menggunakan kacamata baca berlensa positif tunggal, lensa bifokal, atau lensa progresif sesuai hasil pemeriksaan refraksi.',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],

            // 4. ASTIGMATISME (P04)
            [
                'title' => 'Astigmatisme (Mata Silinder): Penyebab Pandangan Berbayang dan Distorsi Visual',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Dipicu oleh ketidaksempurnaan kelengkungan kornea atau lensa yang tidak simetris (berbentuk seperti bola rugbi).',
                    'Menyebabkan cahaya terpecah ke beberapa titik fokus yang berbeda di dalam bola mata.',
                    'Koreksi visual wajib menggunakan lensa silindris dengan penentuan sudut aksis yang presisi.'
                ],
                'content' => 'Astigmatisme, atau yang secara awam kerap disebut sebagai kondisi mata silinder, merupakan gangguan refraksi yang disebabkan oleh ketidaksempurnaan kelengkungan pada organ kornea atau lensa mata. Pada mata yang normal dan sehat, permukaan kornea memiliki kelengkungan yang merata dan bundar simetris seperti permukaan bola. Namun, pada kasus astigmatisme, permukaan kornea memiliki kelengkungan yang asimetris atau melonjong menyerupai sendok atau bola rugbi, sehingga cahaya yang masuk tidak dapat dibiaskan secara merata pada satu titik fokus tunggal di retina.' . "\n\n" . 'Distorsi struktur anatomis ini mengakibatkan berkas cahaya terpecah dan terfokus pada beberapa titik yang berbeda, baik di depan maupun di belakang retina, yang memicu munculnya pandangan berbayang atau garis lurus tampak miring pada jarak jauh maupun dekat. Gejala klinis yang sering menyertai penderita astigmatisme meliputi kebiasaan menyipitkan mata secara tidak sadar untuk memperjelas objek, cepat lelah saat berkendara di malam hari, dan pusing berulang. Kondisi ini dapat ditangani secara optimal dengan pemeriksaan refraksi berkala guna meresepkan kacamata dengan lensa silinder berkekuatan aksis yang akurat.',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],

            // 5. KONJUNGTIVITIS BAKTERI (P05)
            [
                'title' => 'Waspada Konjungtivitis Bakteri: Infeksi Mata Merah dengan Sekret Kental Kekuningan',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Disebabkan oleh infeksi mikroorganisme bakteri patogen seperti Staphylococcus atau Streptococcus.',
                    'Karakteristik utama berupa mata merah disertai eksudat sekret (belek) kental berwarna kuning atau hijau.',
                    'Memerlukan terapi farmakologi berupa obat tetes atau salep mata yang mengandung antibiotik spesifik.'
                ],
                'content' => 'Konjungtivitis bakteri merupakan penyakit infeksi pada lapisan konjungtiva—membran transparan yang melapisi bagian putih bola mata dan bagian dalam kelopak mata—yang dipicu oleh paparan bakteri patogen. Jenis bakteri yang paling sering menginfeksi jaringan ini antara lain *Staphylococcus aureus*, *Streptococcus pneumoniae*, dan *Haemophilus influenzae*. Penyakit ini memiliki tingkat penularan yang sangat tinggi melalui kontak langsung dengan cairan mata pasien yang terinfeksi maupun melalui perantara benda yang terkontaminasi seperti handuk atau bantal.' . "\n\n" . 'Manifestasi klinis utama dari konjungtivitis bakteri adalah perubahan warna mata menjadi merah cerah yang disertai dengan produksi sekret atau belek yang kental, lengket, dan berwarna kekuningan atau kehijauan. Pada pagi hari saat bangun tidur, penderita sering kali mengalami kesulitan membuka kelopak mata akibat sekret yang mengering dan merekatkan bulu mata. Tindakan penanganan pertama yang benar melibatkan pembersihan kelopak mata secara lembut menggunakan kapas steril yang dibasahi air hangat, menjaga higiene tangan, serta melakukan konsultasi untuk mendapatkan antibiotik topikal broad-spectrum dari tenaga medis.',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],

            // 6. KONJUNGTIVITIS VIRAL (P06)
            [
                'title' => 'Mengenal Konjungtivitis Viral: Infeksi Mata Menular yang Menyertai Gejala Flu',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Umumnya disebabkan oleh Adenovirus dan memiliki pola penularan yang sangat cepat dalam komunitas.',
                    'Gejala khas berupa mata merah, produksi air mata berlebih (serous), dan pembesaran kelenjar getah bening preaurikular.',
                    'Bersifat self-limiting disease (sembuh mandiri) dengan terapi suportif berupa kompres dingin.'
                ],
                'content' => 'Konjungtivitis viral adalah inflamasi pada jaringan konjungtiva mata yang disebabkan oleh infeksi virus, di mana kelompok *Adenovirus* bertindak sebagai agen penyebab dalam mayoritas kasus klinis. Infeksi ini sering kali bermanifestasi secara simultan atau menyertai infeksi saluran pernapasan atas, seperti gejala flu, demam, dan radang tenggorokan. Karakteristik utama dari penyebaran virus ini adalah kecepatan penularannya yang luar biasa tinggi dalam area publik atau komunitas melalui droplet pernapasan maupun sentuhan fisik langsung.' . "\n\n" . 'Berbeda dengan infeksi bakteri, konjungtivitis viral ditandai dengan mata merah yang memproduksi sekret encer, bening, dan berair (serous), bukan belek kental yang purulen. Penderita juga kerap mengeluhkan rasa mengganjal seperti kelilipan pasir, sensasi terbakar, pembengkakan ringan pada kelopak mata, serta pembesaran kelenjar getah bening di depan telinga yang terasa nyeri saat diraba. Karena penyakit ini bersifat *self-limiting disease* atau dapat sembuh dengan sendirinya seiring membaiknya imunitas tubuh, penanganan difokuskan pada terapi suportif seperti kompres dingin untuk meredakan radang dan penggunaan air mata buatan bebas pengawet.',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],

            // 7. KONJUNGTIVITIS ALERGI (P07)
            [
                'title' => 'Mengatasi Konjungtivitis Alergi: Inflamasi Mata Akibat Reaksi Hipersensitivitas',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Dipicu oleh paparan zat alergen lingkungan seperti debu rumah, serbuk sari, atau bulu hewan peliharaan.',
                    'Keluhan patognomonik utama adalah rasa gatal yang hebat dan menetap pada kedua belah mata.',
                    'Pilar utama penanganan adalah eliminasi kontak dengan faktor pemicu alergi dan pemberian antihistamin.'
                ],
                'content' => 'Konjungtivitis alergi merupakan bentuk peradangan non-infeksius pada konjungtiva mata yang dimediasi oleh reaksi hipersensitivitas imun tubuh terhadap paparan zat asing eksternal yang bersifat alergen. Ketika partikel mikroskopis seperti debu, serbuk sari tanaman, tungau, atau bulu hewan menempel pada lapisan air mata, sistem kekebalan tubuh penderita yang sensitif secara keliru akan melepaskan senyawa histamin secara masif. Pelepasan zat kimia ini secara instan memicu pelebaran pembuluh darah lokal dan merangsang ujung-ujung saraf di area mata.' . "\n\n" . 'Tanda klinis yang paling menonjol dan membedakan kondisi ini dari konjungtivitis lainnya adalah rasa gatal yang sangat hebat, membakar, dan memaksa penderita untuk mengucek mata secara konstan—tindakan berbahaya yang justru memperparah pembengkakan konjungtiva (kemosis). Kedua bola mata biasanya akan tampak memerah, berair, dan kelopak mata terlihat sembap. Strategi penanganan terapeutik terbaik mencakup identifikasi dan penghindaran total terhadap alergen pemicu, kompres dingin untuk vasokontriksi pembuluh darah, serta pemberian obat tetes mata antihistamin atau mast-cell stabilizer sesuai rekomendasi medis.',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],

            // 8. KERATITIS (P08)
            [
                'title' => 'Keratitis: Peradangan Kornea Mata yang Mengancam Kebutaan jika Diabaikan',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Merupakan kondisi medis darurat berupa inflamasi pada lapisan kornea, jendela utama masuknya cahaya.',
                    'Sering kali dipicu oleh higienitas lensa kontak yang buruk atau trauma fisik pada permukaan mata.',
                    'Gejala trias klinis: nyeri hebat, silau (fotofobia), dan penurunan tajam penglihatan mendadak.'
                ],
                'content' => 'Keratitis adalah kondisi inflamasi akut yang menyerang kornea, yaitu lapisan bening transparan berbentuk kubah yang terletak di bagian paling depan bola mata dan berfungsi sebagai media refraksi utama. Mengingat kornea kaya akan serat saraf sensorik, peradangan pada area ini akan menimbulkan rasa sakit dan nyeri yang sangat menusuk dan hebat bagi penderita. Penyakit ini dapat dipicu oleh agen infeksius berupa bakteri, virus, jamur, maupun parasit Acanthamoeba yang sering kali mengontaminasi penggunaan kacamata/lensa kontak yang tidak steril atau akibat cedera goresan benda asing.' . "\n\n" . 'Pasien yang mengalami keratitis akan menunjukkan gejala klinis yang khas berupa mata memerah secara intens, produksi air mata masif, kelopak mata kejang (blefarospasme), serta intoleransi akut terhadap cahaya atau fotofobia (sangat silau). Jika tidak segera ditangani secara agresif dengan obat topikal antimikroba yang tepat, inflamasi ini dapat berkembang membentuk jaringan parut permanen, perforasi kornea, hingga penurunan penglihatan total. Tindakan darurat pertama yang harus diambil adalah menghentikan penggunaan lensa kontak, menghindari manipulasi mata, dan segera memeriksakan diri ke dokter spesialis mata.',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],

            // 9. UVEITIS (P09)
            [
                'title' => 'Mengenal Uveitis: Inflamasi Jaringan Uvea Mata Berkaitan dengan Penyakit Autoimun',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Peradangan struktural yang terjadi pada traktus uvea (iris, badan siliaris, dan koroid).',
                    'Kerap kali berkaitan erat dengan gangguan imunologis sistemik atau penyakit autoimun tubuh.',
                    'Dapat memicu perubahan bentuk pupil menjadi tidak teratur akibat pembentukan sinekia posterior.'
                ],
                'content' => 'Uveitis merupakan istilah medis untuk menggambarkan kondisi peradangan atau inflamasi yang menyerang jalur traktus uvea, yaitu lapisan vaskular tengah bola mata yang terdiri dari jaringan iris, badan siliaris, dan koroid. Karena uvea memegang peran krusial dalam menyuplai darah dan nutrisi ke jaringan mata lainnya, gangguan peradangan di area ini berpotensi merusak penglihatan secara menetap. Kasus uveitis dibedakan berdasarkan lokasi anatominya, di mana uveitis anterior (peradangan iris) merupakan jenis yang paling lazim ditemukan di klinik kesehatan.' . "\n\n" . 'Gejala uveitis ditandai dengan mata merah yang berpusat di sekitar kornea (injeksi siliar), nyeri tumpul yang mendalam di dalam bola mata, pandangan buram, dan sensitivitas ekstrem terhadap cahaya. Pada pemeriksaan klinis, bentuk pupil penderita sering kali tampak tidak teratur atau asimetris akibat adanya perlengketan iris ke lensa (sinekia posterior). Mengingat uveitis sering kali dipicu oleh respons autoimun sistemik seperti lupus atau rheumatoid arthritis, terapi penanganan membutuhkan pemberian kortikosteroid topikal dosis tinggi dan sikloplegik di bawah pengawasan ketat dokter spesialis untuk mencegah glaukoma sekunder.',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],

            // 10. BLEFARITIS (P10)
            [
                'title' => 'Blefaritis: Inflamasi Kronis Tepi Kelopak Mata Akibat Disfungsi Kelenjar Minyak',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Inflamasi kronis menahun pada margin kelopak mata tempat bertumbuhnya bulu mata.',
                    'Dipicu oleh disfungsi kelenjar minyak Meibom atau kolonisasi bakteri Staphylococcus yang berlebih.',
                    'Khas dengan temuan kerak, sisik, atau ketombe berpasir yang menempel pada pangkal bulu mata.'
                ],
                'content' => 'Blefaritis adalah suatu kondisi peradangan kronis yang menyerang tepi atau margin kelopak mata, tepat di area tempat folikel bulu mata dan muara kelenjar minyak berada. Meskipun penyakit ini jarang menyebabkan kerusakan penglihatan permanen, blefaritis bersifat kambuhan (persisten) dan menimbulkan gangguan kenyamanan visual yang sangat mengganggu aktivitas sehari-hari. Kondisi ini umumnya diklasifikasikan menjadi blefaritis anterior yang memengaruhi bagian luar kelopak mata, dan blefaritis posterior yang disebabkan oleh penyumbatan kelenjar Meibom.' . "\n\n" . 'Tanda klinis kelolaan yang khas dari pasien blefaritis adalah kelopak mata yang tampak memerah, bengkak, terasa panas terbakar, serta adanya penumpukan krusta atau kerak ketombe berpasir di sepanjang bulu mata. Penderita juga mengeluhkan mata terasa mengganjal, gatal, dan bulu mata sering rontok akibat rusaknya folikel rambut. Kunci utama keberhasilan penatalaksanaan blefaritis terletak pada higiene kelopak mata secara konsisten, yaitu melalui kompres hangat untuk mencairkan minyak yang menyumbat, dilanjutkan dengan pembersihan kelopak mata secara lembut menggunakan sampo bayi encer secara rutin.',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],

            // 11. HORDEOLUM INTERNUM (P11)
            [
                'title' => 'Hordeolum Internum: Infeksi Akut Kelenjar Minyak di Dalam Kelopak Mata',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Merupakan infeksi supuratif akut kelenjar Meibom yang terletak jauh di dalam lempeng tarsal.',
                    'Menimbulkan benjolan fokal yang meradang, bengkak, dan terasa sangat nyeri saat ditekan.',
                    'Arah penonjolan bengkak dan pus (nanah) mengarah ke bagian dalam konjungtiva tarsal.'
                ],
                'content' => 'Hordeolum internum adalah infeksi bakteri akut yang bersifat supuratif (menghasilkan nanah) pada jaringan kelenjar Meibom, yaitu kelenjar minyak yang terletak di bagian dalam lempeng kelopak mata (tarsus). Patogenesis kondisi ini diawali oleh adanya penyumbatan pada saluran muara kelenjar, yang kemudian menjadi media subur bagi multiplikasi bakteri, terutama galur *Staphylococcus aureus*. Infeksi fokal ini memicu respons inflamasi lokal yang masif di dalam kelopak mata pasien.' . "\n\n" . 'Gejala utama hordeolum internum adalah munculnya benjolan yang keras, memerah, dan membengkak hebat di dalam kelopak mata, disertai dengan rasa nyeri berdenyut yang intens, terutama saat area tersebut dipalpasi atau ditekan. Berbeda dengan jenis eksternum, jika kelopak mata dibalik (everted), akan terlihat area kekuningan berisi pus (nanah) yang menghadap ke konjungtiva. Tindakan penanganan pertama yang sangat direkomendasikan adalah melakukan kompres hangat selama 15 menit sebanyak 4 kali sehari untuk melancarkan drainase alami, serta dilarang keras memencet benjolan karena dapat memicu penyebaran infeksi (selulitis).',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],

            // 12. HORDEOLUM EKSTERNUM (P12)
            [
                'title' => 'Hordeolum Eksternum (Bintitan): Infeksi Bakteri pada Pangkal Bulu Mata',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Infeksi terlokalisasi pada kelenjar aksesoris kelopak mata luar (Zeis atau Moll) atau folikel bulu mata.',
                    'Ditandai dengan benjolan merah di tepi luar kelopak yang menyerupai jerawat.',
                    'Sering dipicu oleh kebiasaan menyentuh atau mengucek mata dengan tangan yang kotor.'
                ],
                'content' => 'Hordeolum eksternum, atau yang secara populer di masyarakat dikenal dengan istilah bintitan, merupakan infeksi bakteri akut pada kelenjar sebasea Zeis atau kelenjar keringat Moll yang terletak di margin luar kelopak mata. Kondisi ini umumnya bermanifestasi tepat pada pangkal bertumbuhnya rambut bulu mata. Higienitas tangan yang buruk, seperti kebiasaan mengucek mata atau memasang lensa kontak tanpa mencuci tangan terlebih dahulu, menjadi faktor risiko mekanis tertinggi yang memasukkan bakteri ke folikel rambut.' . "\n\n" . 'Secara klinis, hordeolum eksternum tampak sebagai benjolan kecil yang memerah, bengkak, dan lunak di sepanjang tepi luar kelopak mata, menyerupai jerawat pustul. Penderita akan merasakan nyeri lokal yang tajam, sensasi mengganjal saat berkedip, serta mata berair. Seiring berjalannya waktu, titik nanah (pus) berwarna putih kekuningan akan muncul ke permukaan luar benjolan. Penanganan medis meliputi kompres hangat untuk mematangkan abses agar pecah secara spontan, menjaga kebersihan wajah, dan pemberian salep antibiotik topikal mata atas anjuran klinis dokter.',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],

            // 13. KALAZION (P13)
            [
                'title' => 'Kalazion: Granuloma Kronis Non-Infeksi Akibat Sumbatan Kelenjar Minyak',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Merupakan peradangan granulomatosa kronis non-infeksius akibat retensi sebum minyak.',
                    'Karakteristik khas berupa benjolan yang keras, tumbuh lambat, dan tidak menimbulkan rasa nyeri.',
                    'Sering kali terbentuk sebagai komplikasi sekunder pasca hordeolum internum yang tidak sembuh tuntas.'
                ],
                'content' => 'Kalazion adalah benjolan pada kelopak mata yang terbentuk akibat adanya peradangan granulomatosa kronis non-infeksius pada kelenjar Meibom. Kondisi ini terjadi ketika muara kelenjar minyak tersumbat total, sehingga cairan sebum (minyak) tertahan di dalam jaringan lempeng tarsal dan merembes ke jaringan sekitarnya. Hal ini merangsang sistem imun untuk melakukan enkapsulasi atau pembentukan jaringan granuloma di sekitar sumbatan, menciptakan benjolan padat yang terisolasi.' . "\n\n" . 'Karakteristik klinis utama yang membedakan kalazion secara mutlak dari hordeolum adalah sifat benjolannya yang keras, tumbuh secara lambat dalam hitungan minggu atau bulan, serta sama sekali tidak menimbulkan rasa nyeri (*painless*) saat ditekan. Kulit di atas benjolan umumnya dapat digerakkan dengan bebas tanpa tanda-tanda radang akut. Meskipun tidak berbahaya, kalazion yang berukuran besar dapat menekan kornea dan memicu pandangan kabur akibat astigmatisme induksi. Penanganan awal mencakup kompres hangat intensif, namun jika benjolan telah mengeras dan menetap, diperlukan tindakan insisi dan kuretase minor oleh dokter mata.',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],

            // 14. DAKRIOSISTITIS (P14)
            [
                'title' => 'Dakriosistitis: Infeksi Akut Kantung Air Mata di Sudut Dalam Mata',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Peradangan akut yang menyerang sakus lakrimalis (kantung air mata) dekat pangkal hidung.',
                    'Umumnya dipicu oleh adanya sumbatan pada saluran air mata (duktus nasolakrimalis).',
                    'Dapat mengeluarkan cairan purulen (nanah) dari punktum lakrimal saat area bengkak ditekan.'
                ],
                'content' => 'Dakriosistitis adalah infeksi atau peradangan akut yang terjadi pada komponen sakus lakrimalis, yaitu kantung penampung air mata yang terletak di sudut dalam mata dekat dengan pangkal tulang hidung. Kondisi patologis ini hampir selalu didahului oleh adanya obstruksi atau penyumbatan pada saluran duktus nasolakrimalis—saluran yang mengalirkan air mata dari mata ke rongga hidung. Penyumbatan ini menyebabkan cairan air mata mengalami stasis (stagnan), berakumulasi, dan menciptakan lingkungan anaerob yang sangat ideal bagi pertumbuhan koloni bakteri patogen.' . "\n\n" . 'Manifestasi klinis dakriosistitis ditandai dengan munculnya pembengkakan eritematosa berbentuk nodul yang sangat nyeri, merah, dan panas di area sudut mata bawah dekat hidung. Penderita juga mengalami epifora (mata berair konstan) karena air mata tidak dapat mengalir keluar dengan normal. Ciri khas diagnostik dari penyakit ini adalah keluarnya sekret mukopurulen kental menyerupai nanah dari lubang sudut mata (punktum) apabila benjolan kantung tersebut ditekan secara lembut. Penanganan mutakhir membutuhkan terapi kompres hangat, pemberian antibiotik oral atau intravena sistemik, serta tindakan pembedahan dacryocystorhinostomy (DCR) setelah fase akut mereda.',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],

            // 15. TRIKIASIS (P15)
            [
                'title' => 'Trikiasis: Kelainan Arah Pertumbuhan Bulu Mata yang Merusak Lapisan Kornea',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Kelainan anatomi di mana arah pertumbuhan bulu mata melengkung ke dalam (ke arah bola mata).',
                    'Gesekan konstan rambut bulu mata memicu erosi kornea, ulkus, hingga risiko kebutaan.',
                    'Tindakan penanganan definitif meliputi epilasi berkala, elektrolisis, atau pembedahan reposisi.'
                ],
                'content' => 'Trikiasis merupakan suatu kelainan struktur kelopak mata di mana bulu mata tumbuh dengan arah yang salah, yaitu melengkung atau mengarah ke dalam bola mata, meskipun posisi tepi kelopak mata (*eyelid margin*) berada dalam status normal. Kondisi ini dapat dipicu oleh adanya proses sikatrik atau pembentukan jaringan parut pasca infeksi kronis (seperti trakhoma), trauma fisik luka bakar, atau komplikasi peradangan blefaritis menahun yang merusak arsitektur folikel rambut bulu mata.' . "\n\n" . 'Dampak mekanis dari trikiasis sangat merusak, karena setiap kali penderita berkedip, helai bulu mata yang keras akan menggesek lapisan epitel kornea secara langsung. Hal ini menimbulkan gejala klinis berupa sensasi mengganjal yang sangat tidak nyaman, mata merah kronis, berair, dan sensitif terhadap cahaya. Jika gesekan mekanis ini dibiarkan berlangsung menahun tanpa intervensi, kornea akan mengalami abrasi luas, kekeruhan permanen, hingga ulkus kornea perforatif. Penanganan medis awal melibatkan tindakan epilasi (pencabutan bulu mata) secara berkala menggunakan pinset steril oleh tenaga medis, atau terapi permanen menggunakan metode elektrolisis bulu mata.',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],

            // 16. KATARAK (P16)
            [
                'title' => 'Mata Berasap Karena Katarak: Penyebab Utama Kebutaan yang Dapat Disembuhkan',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Terjadi akibat proses denaturasi protein yang membuat lensa mata menjadi keruh dan opak.',
                    'Menyebabkan penurunan tajam penglihatan secara progresif tanpa disertai rasa nyeri atau kemerahan.',
                    'Satu-satunya terapi definitif yang efektif adalah operasi penggantian lensa dengan Intraocular Lens (IOL).'
                ],
                'content' => 'Katarak merupakan suatu kondisi patologis di mana lensa mata yang semula bening transparan menjadi keruh, berkabut, atau opak. Lensa mata berfungsi memfokuskan cahaya agar jatuh tepat di retina; ketika lensa mengalami kekeruhan akibat proses denaturasi atau penggumpalan protein (umumnya dipicu penuaan/senilis), berkas cahaya akan terhalang dan terpecah, sehingga gagal membentuk bayangan yang tajam. Kondisi ini menobatkan katarak sebagai penyebab angka kebutaan tertinggi, namun memiliki sifat dapat disembuhkan secara total (*reversible blindness*).' . "\n\n" . 'Penderita katarak bermanifestasi klinis dengan keluhan penglihatan yang buram secara perlahan dan progresif, di mana mereka merasa seperti selalu melihat objek dari balik kaca berembun atau berasap. Gejala penyerta lainnya adalah distorsi warna yang tampak menguning, sensitivitas silau yang tinggi saat melihat lampu di malam hari, hingga terlihatnya warna putih pada pupil (leukokoria) di stadium matur. Tidak ada obat tetes mata atau jamu yang dapat menghilangkan katarak; satu-satunya jalan kesembuhan medis yang valid adalah melalui tindakan operasi fakoemulsifikasi untuk mengangkat lensa keruh dan menggantinya dengan lensa tanam buatan (IOL).',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],

            // 17. GLAUKOMA AKUT (P17)
            [
                'title' => 'Glaukoma Akut: Kedaruratan Medis Tekanan Mata Tinggi Memicu Kebutaan Mendadak',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Merupakan lonjakan mendadak tekanan intraokular akibat tersumbatnya sudut bilik mata depan secara total.',
                    'Gejala sistemik sangat khas: nyeri mata ekstrem berdenyut, pandangan kabur, mual, dan muntah.',
                    'Wajib ditangani sebagai darurat utama di IGD Rumah Sakit guna menyelamatkan saraf optik dari iskemia.'
                ],
                'content' => 'Glaukoma akut, atau dikenal sebagai glaukoma sudut tertutup primer akut, merupakan salah satu kondisi kedaruratan medis tertinggi dalam bidang oftalmologi. Kondisi ini bermanifestasi akibat adanya penyumbatan total secara mendadak pada jaringan trabekular meshwork (saluran pembuangan cairan humor akuos) oleh jaringan iris mata. Akibat cairan yang terus diproduksi namun tidak dapat keluar, tekanan di dalam bola mata (Tekanan Intraokular / TIO) melonjak drastis dalam waktu singkat, menghancurkan serat-serat saraf optik secara permanen karena iskemia jaringan.' . "\n\n" . 'Serangan glaukoma akut memberikan gejala klinis yang sangat dramatis dan menyiksa penderita, meliputi rasa nyeri yang sangat hebat dan menusuk pada mata hingga menjalar ke kepala, penurunan penglihatan secara mendadak, serta mata merah. Karena tingginya tekanan bola mata yang merangsang saraf vagus, pasien juga selalu mengeluhkan gejala sistemik berupa mual mendalam dan muntah-muntah, disertai penampakan lingkaran pelangi (*halo*) di sekitar objek cahaya. Pasien wajib segera dilarikan ke IGD Rumah Sakit terdekat untuk mendapatkan agen osmotik darurat (seperti Manitol) guna menurunkan tekanan mata secepat mungkin sebelum terjadi kebutaan absolut.',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],

            // 18. GLAUKOMA KRONIS (P18)
            [
                'title' => 'Glaukoma Kronis: Waspada Pencuri Penglihatan Senyap Tanpa Rasa Nyeri',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Penyakit degeneratif saraf optik akibat peningkatan tekanan mata yang berlangsung lambat dan menahun.',
                    'Dijuluki "pencuri penglihatan" karena tidak menimbulkan rasa nyeri ataupun mata merah di awal stadium.',
                    'Memicu penyempitan lapang pandang perifer secara progresif hingga membentuk tunnel vision.'
                ],
                'content' => 'Glaukoma kronis, atau glaukoma sudut terbuka primer, merupakan penyakit degeneratif saraf optik yang mendapatkan julukan mengerikan sebagai "si pencuri penglihatan" (*the silent thief of sight*). Berbeda total dengan varian akutnya, glaukoma kronis dipicu oleh penurunan fungsi penyaringan saluran trabekula secara bertahap dan menahun. Hal ini mengakibatkan tekanan intraokular mata meningkat secara perlahan dan konstan, menekan lempeng saraf optik di bagian belakang mata sedikit demi sedikit selama bertahun-tahun tanpa disadari oleh penderita.' . "\n\n" . 'Kekejaman klinis dari glaukoma kronis terletak pada tidak adanya gejala nyeri, tidak ada pusing, dan bola mata tampak putih normal. Kerusakan saraf mata akan mengeblok lapang pandang bagian luar (perifer) terlebih dahulu, sehingga penderita mengalami fenomena *tunnel vision* (penglihatan terowongan) di mana mereka hanya bisa melihat lurus ke depan dan sering menabrak objek di kiri-kanan saat berjalan. Karena kerusakan saraf optik bersifat irreversible (tidak bisa kembali), diagnosis dini melalui skrining TIO berkala dan penggunaan obat tetes mata penurun tekanan seumur hidup menjadi pilar utama pencegahan kebutaan total.',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],

            // 19. PTERIGIUM (P19)
            [
                'title' => 'Pterigium: Selaput Daging Segitiga pada Putih Mata Akibat Paparan Sinar UV',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Pertumbuhan jaringan fibrovaskular non-kanker berbentuk segitiga yang tumbuh dari konjungtiva.',
                    'Faktor pemicu utama adalah paparan kronis sinar matahari (UV), angin malam, dan debu jalanan.',
                    'Jika selaput merambat hingga menutupi poros kornea (pupil), ketajaman visual akan turun drastis.'
                ],
                'content' => 'Pterigium merupakan kelainan berupa pertumbuhan jaringan fibrovaskular bersifat non-kanker yang memiliki bentuk menyerupai sayap segitiga, tumbuh memanjang dari lapisan konjungtiva bulbi menuju ke area bening kornea mata. Penyakit ini memiliki prevalensi kasus yang sangat tinggi di Indonesia karena letak geografis negara tropis. Paparan radiasi ultraviolet (UV) kronis dari sinar matahari, lingkungan kerja yang berdebu, kering, dan berangin dituding sebagai pemicu utama terjadinya proliferasi elastotik jaringan tersebut.' . "\n\n" . 'Pada stadium awal, pterigium umumnya tidak bergejala dan hanya mengganggu aspek estetika mata. Namun, jika jaringan mengalami iritasi atau peradangan, penderita akan mengeluhkan mata memerah, terasa mengganjal seperti kelilipan pasir, perih, dan berair. Bahaya klinis akan muncul apabila ujung selaput daging tersebut terus tumbuh merambat hingga melewati batas pupil mata, karena jaringan tersebut akan menghalangi aksis visual cahaya dan mengubah kelengkungan kornea (memicu silinder). Pencegahan dilakukan dengan wajib memakai kacamata hitam anti-UV saat beraktivitas di luar ruangan, serta opsi operasi eksisi jika selaput mengganggu penglihatan.',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],

            // 20. XEROPHTHALMIA (P20)
            [
                'title' => 'Xerophthalmia: Dampak Defisiensi Vitamin A Kronis pada Kerusakan Struktur Mata',
                'penulis' => 'Tim Medis Sistem Pakar',
                'is_active' => true,
                'key_insight' => [
                    'Gangguan mata sistemik yang dipicu oleh kekurangan atau defisiensi Vitamin A kronis pada tubuh.',
                    'Memiliki tahapan klinis progresif mulai dari rabun senja hingga hancurnya kornea (keratomalasia).',
                    'Ditandai secara patognomonik dengan penampakan bercak Bitot (bitot spot) yang berbusa di area putih mata.'
                ],
                'content' => 'Xerophthalmia adalah serangkaian sindrom kelainan mata kronis yang disebabkan oleh defisiensi atau kekurangan Vitamin A yang parah di dalam tubuh. Vitamin A memegang peranan krusial dalam pembentukan rodopsin pada sel batang retina serta menjaga diferensiasi sel epitel penghasil mukus pada konjungtiva. Tanpa asupan vitamin yang memadai, kelenjar air mata tidak mampu memproduksi kelembapan yang cukup, mengakibatkan seluruh permukaan luar bola mata mengalami kekeringan ekstrem dan keratinisasi jaringan.' . "\n\n" . 'Perjalanan klinis xerophthalmia berlangsung secara bertahap dan sangat berbahaya. Gejala paling awal yang muncul adalah rabun senja (*night blindness*), di mana penderita kehilangan kemampuan melihat dalam pencahayaan redup atau sore hari. Selanjutnya, akan muncul bercak Bitot (*Bitot spot*)—sebuah bercak kering berbusa keabu-abuan yang menempel pada konjungtiva bulbi. Jika kondisi malnutrisi ini tidak segera diintervensi dengan pemberian kapsul Vitamin A dosis tinggi, stadium akhir berupa pelunakan dan hancurnya jaringan kornea secara total (keratomalasia) akan terjadi, memicu kebutaan absolut yang tidak dapat disembuhkan.',
                'gambar' => null, 'created_at' => $now, 'updated_at' => $now
            ],
        ];

        foreach ($dataArtikel as $artikel) {
            \App\Models\Artikel::create($artikel);
        }
    }
}