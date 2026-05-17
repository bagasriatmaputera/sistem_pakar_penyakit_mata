<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $table = 'penyakits';
    protected $fillable = ['kode_penyakit', 'nama_penyakit', 'deskripsi', 'saran_perawatan'];

    public function gejalas()
    {
        return $this->belongsToMany(Gejala::class, 'rules', 'penyakit_id', 'gejala_id');
    }
}
