<?php

namespace App\Models;

use App\Models\SO\InApotek;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekmedMaster extends Model
{
    use HasFactory;

    public function obat()
    {
        return $this->belongsTo(InApotek::class,'id_obat','id');
    }

    public function diagnosa()
    {
        return $this->belongsTo(Diagnosa::class,'id_diagnosa','id');
    }

    public function pengobatan()
    {
        return $this->hasOne(RekmedPengobatan::class,'id_obat','id');
        // return $this->hasOne('App\Room', 'id');
    }

   

  
}
