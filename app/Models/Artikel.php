<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikels';

    protected $fillable = [
        'title',
        'penulis',
        'is_active',
        'key_insight',
        'gambar',
        'content'
    ];

    /**
     * Aturan Casting Atribut.
     * * Mengonversi otomatis data JSON dari database menjadi Array PHP saat dibaca,
     * dan mengubah Array PHP menjadi JSON saat disimpan ke database.
     */
    protected $casts = [
        'is_active' => 'boolean',
        'key_insight' => 'array', 
    ];
}