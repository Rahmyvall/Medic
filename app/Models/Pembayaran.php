<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $primaryKey = 'pembayaran_id';
    protected $fillable = [
        'kunjungan_id',
        'total_tagihan',
        'metode_bayar',
        'status',
        'tanggal_bayar',
        'keterangan',
    ];

    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'kunjungan_id');
    }

    // Shortcut untuk akses pasien langsung melalui kunjungan
    public function pasien()
    {
        return $this->hasOneThrough(
            Pasien::class,
            Kunjungan::class,
            'id', // foreign key di kunjungan
            'id', // foreign key di pasien
            'kunjungan_id', // local key di pembayaran
            'pasien_id' // local key di kunjungan
        );
    }

    // Shortcut untuk akses dokter langsung melalui kunjungan
    public function dokter()
    {
        return $this->hasOneThrough(
            Dokter::class,
            Kunjungan::class,
            'id', // foreign key di kunjungan
            'id', // foreign key di dokter
            'kunjungan_id', // local key di pembayaran
            'dokter_id' // local key di kunjungan
        );
    }
}