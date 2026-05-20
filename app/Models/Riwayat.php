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
        'tanggal_diagnosa'
    ];

    protected $casts = [
        'gejala_terpilih' => 'array',
        'tanggal_diagnosa' => 'datetime',
    ];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'penyakit_id');
    }
}
