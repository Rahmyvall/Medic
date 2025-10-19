<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'kunjungans';
    

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'tanggal_kunjungan',
        'jenis_kunjungan',
        'status',
    ];
    public $timestamps = true; // pastikan ini aktif

    // Relasi ke pasien
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id', 'id');
    }

    public function rekamMedis()
    {
        return $this->hasOne(RekamMedis::class, 'kunjungan_id', 'id');
    }

    
}