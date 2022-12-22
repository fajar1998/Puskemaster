<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatInap extends Model
{
    use HasFactory;
   
   
    public function nama()
    {
        return $this->belongsTo(PasienMaster::class,'id_pasien','id');
    }

}
