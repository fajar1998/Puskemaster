<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienMaster extends Model
{
    use HasFactory;
    public function alamat()
    {
        return $this->belongsTo(Alamat::class,'desa_kode','kode_desa');
    }

    public function kk()
    {
        return $this->belongsTo(StatusKK::class,'status_kode','kode_stats');
    }

    public function pasien()
    {
        return $this->belongsTo(Keluarga::class,'id_pasien','id');
    }

    public function rekdiagnosa()
    {
        return $this->belongsTo(Keluarga::class,'id','id_pasien');
    }

   

}
