<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'item';

    public function unit(){
        return $this->hasMany('\App\Models\ItemUnit');
    }

    public function mesin(){
        return $this->hasMany('\App\Models\ItemJenis');
    }
    
}
