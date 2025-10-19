<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $table = 'rekam_medis';
    protected $primaryKey = 'rekam_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'kunjungan_id',     // ← harus ada karena relasi belongsTo ke kunjungan
        'diagnosa',
        'tindakan',
        'catatan_dokter',
        'tanggal_kunjungan',
    ];

    /**
     * 🔹 Relasi ke tabel kunjungan
     * Rekam medis dimiliki oleh satu kunjungan.
     */
    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'kunjungan_id', 'id');
    }

    /**
     * 🔹 Relasi ke tabel resep
     * Satu rekam medis bisa memiliki banyak resep.
     */
    public function reseps()
    {
        return $this->hasMany(Resep::class, 'rekam_id', 'rekam_id');
    }
}