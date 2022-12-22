<?php

namespace App\Models\SO;

use App\Models\SoApotekFinal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutApotek extends Model
{
    use HasFactory;

    public function obat()
    {
        return $this->belongsTo(SoApotekFinal::class,'id_obat','id');
    }
}
