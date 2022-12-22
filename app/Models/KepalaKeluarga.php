<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepalaKeluarga extends Model
{
    use HasFactory;
    public function alamat()
    {
        return $this->belongsTo(Alamat::class,'desa_kode','kode_desa');
    }
}
