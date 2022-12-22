<?php

namespace App\Models\SO;

use App\Models\SoApotekFinal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InApotek extends Model
{
    use HasFactory;

    public function obat()
    {
        return $this->belongsTo(SoGudang::class,'id_obat','id');
    }
}
