<?php

namespace App\Models;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Poliklinik;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rekammedis extends Model
{
    use HasFactory;
    protected $table = 'rekammedis';

    protected $guarded = [];

    public function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class,'id_poli');
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class,'id_pasien');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class,'id_dokter');
    }
}
