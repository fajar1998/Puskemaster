<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamDiagnosa extends Model
{
    use HasFactory;
    public function pasien()
    {
        return $this->belongsTo(PasienMaster::class,'id_pasien','id');
    }
    
}
