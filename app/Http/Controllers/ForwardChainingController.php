<?php

namespace App\Http\Controllers;

use App\Services\MethodService;
use Illuminate\Http\Request;

class ForwardChainingController extends Controller
{

    public function __construct(protected MethodService $methodService) {}

    public function create(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|min:3',
            'gejala_terpilih' => 'required|array|min:1',
            'gejala_terpilih.*' => 'exists:tb_gejala,id'
        ], [
            'nama_pasien.required' => 'Nama pasien tidak boleh kosong.',
            'nama_pasien.string'   => 'Format nama pasien tidak valid.',
            'nama_pasien.min'      => 'Nama pasien minimal harus 3 karakter.',

            'gejala_terpilih.required' => 'Harap pilih minimal satu gejala untuk melakukan diagnosa.',
            'gejala_terpilih.array'    => 'Format pengiriman data gejala tidak valid.',
            'gejala_terpilih.min'      => 'Harap pilih minimal satu gejala.',

            'gejala_terpilih.*.exists' => 'Salah satu gejala yang Anda pilih tidak ditemukan di dalam sistem.'
        ]);

        try {
            $this->methodService->determineDisease($request->all());
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
