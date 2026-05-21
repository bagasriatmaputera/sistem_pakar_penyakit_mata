<!DOCTYPE html>
<html>
<head>
    <title>Laporan Hasil Diagnosis Mata</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; color: #333; line-height: 1.6; }
        .header { text-align: center; border-bottom: 2px solid #1e3a8a; padding-bottom: 10px; margin-bottom: 20px; }
        .title { font-size: 18px; font-weight: bold; color: #1e3a8a; margin: 0; }
        table { w-full border-collapse: collapse; margin-top: 10px; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
        .section-title { font-weight: bold; background-color: #e5e7eb; }
    </style>
</head>
<body>

    <div class="header">
        <h1 class="title">SISTEM PAKAR DIAGNOSIS PENYAKIT MATA</h1>
        <small>Laporan Hasil Rekam Medis Pengujian Mandiri Digital</small>
    </div>

    <h3>Biodata Pengguna:</h3>
    <table>
        <tr>
            <th width="30%">Nama Lengkap</th>
            <td>{{ $riwayat->nama_pasien }}</td>
        </tr>
        <tr>
            <th>Usia / Jenis Kelamin</th>
            <td>{{ $riwayat->usia }} Tahun / {{ $riwayat->jenis_kelamin }}</td>
        </tr>
        <tr>
            <th>Waktu Pemeriksaan</th>
            <td>{{ $riwayat->created_at->format('d F Y H:i') }} WIB</td>
        </tr>
    </table>

    <h3>Hasil Kesimpulan Sistem:</h3>
    <table>
        <tr class="section-title">
            <td colspan="2">Kesimpulan Utama</td>
        </tr>
        <tr>
            <th width="30%">Rekomendasi Penyakit</th>
            <td style="font-size: 14px; font-weight: bold; color: #1e3a8a;">
                {{ $riwayat->penyakit->nama_penyakit }} ({{ $riwayat->penyakit->kode_penyakit }})
            </td>
        </tr>
        <tr>
            <th>Tingkat Keyakinan</th>
            <td><strong>{{ $riwayat->tingkat_akurasi }}%</strong></td>
        </tr>
        <tr>
            <th>Deskripsi Penyakit</th>
            <td>{{ $riwayat->penyakit->deskripsi_penyakit }}</td>
        </tr>
        <tr class="section-title">
            <td colspan="2">Tindakan Penanganan Awal (Saran Medis)</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: justify;">
                {{ $riwayat->penyakit->saran_perawatan }}
            </td>
        </tr>
    </table>

    <div style="margin-top: 40px; text-align: right; font-size: 10px; color: #999;">
        *Dokumen ini diterbitkan secara otomatis oleh sistem pakar refraksi mata berbasis aturan komputerisasi.
    </div>

</body>
</html>