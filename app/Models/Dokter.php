<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    // Nama tabel jika mengikuti konvensi Laravel tidak perlu, tapi bisa ditambahkan
    protected $table = 'dokters';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'dokter_id', 
        'nama', 
        'photo_dokter',
        'spesialisasi', 
        'jadwal_praktek', 
        'no_str'
    ];

    // Jika ingin primary key bukan 'id', bisa ditambahkan
    // protected $primaryKey = 'dokter_id';

    public function reseps()
    {
        return $this->hasMany(Resep::class, 'dokter_id', 'id');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'dokter_id', 'id');
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id', 'id');
    }

}