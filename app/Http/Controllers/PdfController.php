<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function cetakRiwayat($id)
    {
        $riwayat = Riwayat::with('penyakit')->findOrFail($id);

        $pdf = Pdf::loadView('pdf.laporan-riwayat', compact('riwayat'));
        
        return $pdf->stream('Laporan_Diagnosis_' . $riwayat->nama_pasien . '.pdf');
    }
}