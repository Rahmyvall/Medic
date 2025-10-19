<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika sesuai konvensi Laravel 'pasiens')
    protected $table = 'pasiens';
    protected $primaryKey = 'id';
    
    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'no_rm',
        'nama_pasien',
        'tgl_lahir',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'penanggung_jawab',
    ];

    // Jika mau menonaktifkan timestamps
    // public $timestamps = false;

    // Jika ingin mengubah format tanggal secara otomatis
    // protected $dates = ['tgl_lahir'];

    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class, 'pasien_id', 'id');
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