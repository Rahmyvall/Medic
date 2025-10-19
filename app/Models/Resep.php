<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $table = 'reseps';
    protected $primaryKey = 'resep_id';

    protected $fillable = [
        'rekam_id',
        'dokter_id',
        'tanggal_resep',
        'catatan',
    ];
    

    protected $casts = [
        'tanggal_resep' => 'date',
    ];
    

    public function rekamMedis()
    {
        return $this->belongsTo(RekamMedis::class, 'rekam_id', 'rekam_id');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }
}