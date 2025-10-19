<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obats';      // Nama tabel sesuai migration
    protected $primaryKey = 'obat_id'; // Primary key sesuai migration
    public $timestamps = true;

    protected $fillable = [
        'nama_obat',
        'kategori',
        'stok',
        'harga',
        'harga_beli',
        'harga_promo',
    ];
}