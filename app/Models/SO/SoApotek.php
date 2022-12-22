<?php

namespace App\Models\SO;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoApotek extends Model
{
    use HasFactory;
    public function obat()
    {
        return $this->belongsTo(SoGudang::class,'id_obat','id');
    }
}
