<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailresep extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'detailreseps';

    // Primary key
    protected $primaryKey = 'detail_id';

    // Mass assignable fields
    protected $fillable = [
        'resep_id',
        'obat_id',
        'dosis',
        'jumlah',
    ];

    // Relasi ke tabel Resep
    public function resep()
    {
        return $this->belongsTo(Resep::class, 'resep_id', 'resep_id');
    }

    // Relasi ke tabel Obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id', 'obat_id');
    }
}