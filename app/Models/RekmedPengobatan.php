<?php

namespace App\Models;

use App\Models\SO\InApotek;
use App\Models\SO\SoApotek;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SoapVar;

class RekmedPengobatan extends Model
{
    use HasFactory;

    public function obat()
    {
        return $this->belongsTo(SoApotekFinal::class,'id_obat','id');
    }
}
