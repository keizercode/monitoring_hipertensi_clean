<?php

namespace Database\Seeders;

use App\Models\EducationalContent;
use Illuminate\Database\Seeder;

class EducationalContentSeeder extends Seeder
{
    public function run()
    {
        $contents = [
            // ========================================
            // DIET RENDAH GARAM
            // ========================================
            [
                'title' => 'Diet Rendah Garam',
                'category' => 'diet',
                'content' => 'Diet rendah garam penting untuk membantu menurunkan tekanan darah karena garam dapat menyebabkan tubuh menahan cairan dan meningkatkan beban kerja jantung.

Pasien dianjurkan membatasi konsumsi makanan tinggi natrium seperti:
• Makanan instan (mie instan, sup kaleng)
• Keripik dan makanan ringan kemasan
• Makanan kaleng (sarden, kornet, sayuran kaleng)
• Bumbu penyedap (vetsin, kecap asin, saus sambal)
• Makanan cepat saji (burger, pizza, kentang goreng)

Batasi konsumsi garam maksimal 5 gram (1 sendok teh) per hari atau sekitar 2.000 mg natrium.',
                'icon' => 'utensils',
                'is_active' => true
            ],
            [
                'title' => 'Makanan yang Harus Dihindari',
                'category' => 'diet',
                'content' => 'Berikut adalah makanan yang sebaiknya dihindari atau dibatasi oleh penderita hipertensi:

1. Makanan Kaleng
   • Sarden, kornet, buah kaleng dalam sirup
   • Mengandung natrium tinggi sebagai pengawet

2. Daging Olahan
   • Sosis, nugget, ham, bacon
   • Tinggi natrium dan lemak jenuh

3. Makanan Asin
   • Acar, ikan asin, telur asin
   • Kerupuk, keripik kemasan
   • Kacang asin, biji-bijian asin

4. Bumbu & Saus
   • Kecap asin, saus tomat, saus tiram
   • MSG, kaldu instan
   • Terasi, petis

5. Fast Food
   • Burger, pizza, hot dog
   • Fried chicken, kentang goreng
   • Tinggi natrium, lemak, dan kalori',
                'icon' => 'ban',
                'is_active' => true
            ],
            [
                'title' => 'Makanan yang Dianjurkan',
                'category' => 'diet',
                'content' => 'Makanan yang baik untuk penderita hipertensi:

1. Buah & Sayur Segar
   • Pisang (kaya kalium)
   • Alpukat, jeruk, semangka
   • Bayam, brokoli, wortel
   • Target: 5 porsi per hari

2. Protein Rendah Lemak
   • Ikan (salmon, tuna, kembung)
   • Ayam tanpa kulit
   • Tempe, tahu
   • Telur rebus (putih telur)

3. Karbohidrat Kompleks
   • Nasi merah, roti gandum
   • Oatmeal, kentang rebus
   • Ubi jalar

4. Kacang-kacangan
   • Kacang almond (tanpa garam)
   • Kacang merah, kacang hijau
   • Edamame

5. Produk Susu Rendah Lemak
   • Susu skim
   • Yogurt rendah lemak
   • Keju cottage (rendah natrium)',
                'icon' => 'apple-alt',
                'is_active' => true
            ],

            // ========================================
            // OLAHRAGA & AKTIVITAS FISIK
            // ========================================
            [
                'title' => 'Olahraga & Aktivitas Fisik',
                'category' => 'exercise',
                'content' => 'Aktivitas fisik rutin dapat membantu memperbaiki aliran darah, menurunkan tekanan darah, serta menjaga berat badan ideal.

Manfaat Olahraga untuk Hipertensi:
• Menurunkan tekanan darah sistolik 4-9 mmHg
• Meningkatkan kesehatan jantung dan pembuluh darah
• Membantu menurunkan berat badan
• Mengurangi stres dan meningkatkan mood
• Meningkatkan kualitas tidur

Rekomendasi Aktivitas:
Pasien dianjurkan melakukan olahraga ringan–sedang seperti jalan kaki 30 menit per hari, 5 kali seminggu (total 150 menit per minggu).

Tips Aman Berolahraga:
• Mulai dengan intensitas ringan, tingkatkan bertahap
• Lakukan pemanasan 5-10 menit sebelum olahraga
• Lakukan pendinginan 5-10 menit setelah olahraga
• Hentikan jika merasa pusing atau sesak napas
• Konsultasi dengan dokter sebelum memulai program olahraga baru',
                'icon' => 'running',
                'is_active' => true
            ],
            [
                'title' => 'Jalan Kaki untuk Hipertensi',
                'category' => 'exercise',
                'content' => 'Jalan kaki adalah olahraga paling mudah, aman, dan efektif untuk menurunkan tekanan darah.

Target Jalan Kaki:
• 10.000 langkah per hari (sekitar 7-8 km)
• Atau minimal 30 menit per hari
• Kecepatan sedang (100-120 langkah/menit)

Cara Memaksimalkan Jalan Kaki:
1. Gunakan sepatu yang nyaman
2. Jalan di pagi hari (udara segar)
3. Ajak teman/keluarga (lebih menyenangkan)
4. Gunakan aplikasi pedometer untuk tracking
5. Dengarkan musik sambil berjalan

Tips Meningkatkan Aktivitas Harian:
• Gunakan tangga daripada lift/eskalator
• Parkir lebih jauh dari tujuan
• Turun 1 halte lebih awal
• Jalan-jalan saat istirahat kerja
• Lakukan pekerjaan rumah tangga aktif

Catatan:
Mulai perlahan jika belum terbiasa. Jangan memaksakan diri. Tingkatkan intensitas secara bertahap setiap minggu.',
                'icon' => 'walking',
                'is_active' => true
            ],
            [
                'title' => 'Olahraga Lain yang Dianjurkan',
                'category' => 'exercise',
                'content' => 'Selain jalan kaki, berikut olahraga yang baik untuk penderita hipertensi:

1. Bersepeda
   • 30 menit, 3-5x seminggu
   • Baik untuk kesehatan jantung
   • Bisa indoor (statis) atau outdoor

2. Berenang
   • Olahraga low-impact
   • Melibatkan seluruh tubuh
   • 30-45 menit, 2-3x seminggu

3. Senam Aerobik Ringan
   • Zumba, senam jantung sehat
   • Gerakan ritmis, menyenangkan
   • 30 menit, 3x seminggu

4. Yoga & Tai Chi
   • Mengurangi stres
   • Meningkatkan fleksibilitas
   • Teknik pernapasan membantu relaksasi

5. Berkebun
   • Aktivitas fisik menyenangkan
   • Manfaat ganda: olahraga + relaksasi
   • 30-60 menit sehari

Olahraga yang HARUS DIHINDARI:
• Angkat beban berat
• Olahraga kompetitif intens
• Aktivitas menahan napas (diving)
• Olahraga dengan risiko benturan tinggi',
                'icon' => 'bicycle',
                'is_active' => true
            ],

            // ========================================
            // MINUM AIR YANG CUKUP
            // ========================================
            [
                'title' => 'Minum Air yang Cukup',
                'category' => 'hydration',
                'content' => 'Memenuhi kebutuhan cairan harian membantu menjaga fungsi organ tubuh dan mencegah dehidrasi yang dapat mempengaruhi tekanan darah.

Manfaat Hidrasi Cukup:
• Membantu ginjal membuang kelebihan natrium
• Menjaga volume darah yang optimal
• Mencegah darah menjadi terlalu kental
• Membantu transportasi nutrisi ke sel
• Menjaga suhu tubuh tetap normal

Kebutuhan Cairan Harian:
Pasien dianjurkan minum air 6–8 gelas per hari (sekitar 1.5-2 liter) atau disesuaikan dengan kondisi kesehatan.

Cara Menghitung Kebutuhan Air:
• Rumus umum: 30-35 ml x Berat Badan (kg)
• Contoh: Berat 60 kg = 1.800-2.100 ml (7-8 gelas)

Tanda Kekurangan Cairan:
• Urine berwarna kuning gelap
• Mulut kering
• Pusing atau sakit kepala
• Kelelahan
• Sembelit

Tips Cukup Minum:
• Minum segelas air setelah bangun tidur
• Bawa botol air kemana-mana
• Set alarm reminder minum
• Minum sebelum merasa haus
• Tambahkan lemon untuk variasi rasa',
                'icon' => 'tint',
                'is_active' => true
            ],
            [
                'title' => 'Minuman yang Harus Dihindari',
                'category' => 'hydration',
                'content' => 'Beberapa minuman dapat meningkatkan tekanan darah dan sebaiknya dibatasi:

1. Minuman Berkafein Tinggi
   • Kopi (maksimal 2 cangkir/hari)
   • Teh hitam pekat
   • Minuman energi
   • Kafein dapat meningkatkan tekanan darah sementara

2. Alkohol
   • Dapat meningkatkan tekanan darah
   • Mengganggu efektivitas obat hipertensi
   • Jika minum, batasi: 1 gelas/hari (wanita), 2 gelas/hari (pria)

3. Minuman Manis
   • Soda, soft drink
   • Jus buah kemasan (tinggi gula)
   • Teh manis berlebihan
   • Minuman boba/pearl milk tea
   • Gula berlebih → obesitas → hipertensi

4. Minuman Isotonik/Olahraga
   • Tinggi natrium dan gula
   • Hanya untuk atlet intensif
   • Tidak perlu untuk aktivitas ringan-sedang

Alternatif Minuman Sehat:
• Air putih (terbaik)
• Infused water (air + buah potong)
• Teh hijau (tanpa gula)
• Jus buah segar (tanpa gula tambahan)
• Air kelapa muda (alami)',
                'icon' => 'coffee',
                'is_active' => true
            ],

            // ========================================
            // PENGOBATAN & KONSULTASI
            // ========================================
            [
                'title' => 'Pengobatan & Konsultasi',
                'category' => 'medication',
                'content' => 'Penderita hipertensi perlu minum obat secara teratur sesuai anjuran dokter serta melakukan kontrol rutin untuk memantau perkembangan tekanan darah.

Pentingnya Kepatuhan Minum Obat:
• Menjaga tekanan darah tetap terkontrol
• Mencegah komplikasi (stroke, serangan jantung, gagal ginjal)
• Obat hipertensi bekerja optimal jika diminum teratur
• Jangan menghentikan obat tanpa konsultasi dokter

Jadwal Konsultasi Rutin:
Konsultasi dilakukan untuk mengevaluasi terapi dan menyesuaikan pengobatan bila diperlukan.

• Awal terapi: Kontrol setiap 2-4 minggu
• Setelah stabil: Kontrol setiap 1-3 bulan
• Pemeriksaan: Tekanan darah, fungsi ginjal, kadar elektrolit

Tips Minum Obat Teratur:
• Minum pada waktu yang sama setiap hari
• Gunakan kotak obat (pill organizer)
• Set alarm pengingat di HP
• Catat jadwal minum obat
• Siapkan obat untuk perjalanan
• Isi resep sebelum habis

Yang Harus Dilaporkan ke Dokter:
• Tekanan darah tidak terkontrol
• Efek samping obat
• Lupa minum obat berkali-kali
• Gejala baru yang muncul',
                'icon' => 'pills',
                'is_active' => true
            ],
            [
                'title' => 'Efek Samping Obat Hipertensi',
                'category' => 'medication',
                'content' => 'Obat hipertensi umumnya aman, namun dapat menimbulkan efek samping pada beberapa orang.

Efek Samping Umum:

1. Diuretik (Obat Pelancar Kencing)
   • Sering buang air kecil (terutama awal penggunaan)
   • Haus berlebihan
   • Kadar kalium rendah (kram otot)
   • Solusi: Minum pagi hari, konsumsi makanan kaya kalium

2. ACE Inhibitor (contoh: Captopril)
   • Batuk kering
   • Pusing saat berdiri
   • Jarang: ruam kulit
   • Solusi: Beri tahu dokter jika batuk mengganggu

3. ARB (contoh: Valsartan, Candesartan)
   • Pusing
   • Kelelahan
   • Jarang: sakit kepala
   • Umumnya lebih ditoleransi daripada ACE inhibitor

4. Calcium Channel Blocker (contoh: Amlodipine)
   • Pembengkakan kaki
   • Sakit kepala
   • Wajah kemerahan
   • Denyut jantung cepat

5. Beta Blocker (contoh: Bisoprolol)
   • Kelelahan
   • Tangan/kaki dingin
   • Denyut jantung lambat
   • Gangguan tidur

Kapan Harus ke Dokter:
• Pusing berat atau pingsan
• Sesak napas
• Nyeri dada
• Pembengkakan wajah/lidah (alergi)
• Ruam kulit parah

PENTING:
Jangan menghentikan obat sendiri karena efek samping. Konsultasi dengan dokter untuk penyesuaian dosis atau penggantian obat.',
                'icon' => 'stethoscope',
                'is_active' => true
            ],
            [
                'title' => 'Pemeriksaan Rutin yang Diperlukan',
                'category' => 'medication',
                'content' => 'Selain kontrol tekanan darah, penderita hipertensi perlu pemeriksaan penunjang rutin.

Pemeriksaan yang Dianjurkan:

1. Tekanan Darah (Setiap Kunjungan)
   • Target: < 140/90 mmHg (umum)
   • Target: < 130/80 mmHg (diabetes/penyakit ginjal)
   • Diukur 2x dengan jarak 2 menit

2. Pemeriksaan Laboratorium

   Awal Diagnosis:
   • Darah lengkap
   • Gula darah puasa
   • Profil lipid (kolesterol)
   • Fungsi ginjal (ureum, kreatinin)
   • Elektrolit (Na, K, Cl)
   • Urinalisis

   Pemeriksaan Rutin (6-12 bulan):
   • Fungsi ginjal
   • Elektrolit (terutama jika pakai diuretik)
   • Gula darah
   • Profil lipid

3. Pemeriksaan Jantung

   • EKG (Elektrokardiografi): Setiap tahun
   • Ekokardiografi: Jika ada indikasi
   • Untuk mendeteksi pembesaran jantung

4. Pemeriksaan Mata (Funduskopi)
   • Setiap 1-2 tahun
   • Melihat kerusakan pembuluh darah retina

5. Pemeriksaan Ginjal
   • Ureum, kreatinin serum
   • Estimasi laju filtrasi glomerulus (eGFR)
   • Albumin urine

Frekuensi Pemeriksaan:
• Hipertensi terkontrol: 6-12 bulan
• Hipertensi tidak terkontrol: 3-6 bulan
• Ada komplikasi: Lebih sering sesuai anjuran dokter

Catat Hasil Pemeriksaan:
Simpan semua hasil lab dan rekam medis untuk monitoring jangka panjang.',
                'icon' => 'file-medical',
                'is_active' => true
            ]
        ];

        // Delete existing data (optional, untuk re-seed)
        EducationalContent::truncate();

        // Insert new data
        foreach ($contents as $content) {
            EducationalContent::create($content);
        }
    }
}
