<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $table = 'riwayats';
    
    protected $fillable = [
        'nama_pasien', 
        'gejala_terpilih', 
        'penyakit_id', 
        'usia',
        'jenis_kelamin',
        'tingkat_akurasi'
    ];

    protected $casts = [
        'gejala_terpilih' => 'array',
    ];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'penyakit_id');
    }
}
