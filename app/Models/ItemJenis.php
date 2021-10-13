<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemJenis extends Model
{
    use HasFactory;

    public function mesin(){
        return $this->belongsTo('\App\Models\Jenis', 'jenis_mesin_id');
    }
}
