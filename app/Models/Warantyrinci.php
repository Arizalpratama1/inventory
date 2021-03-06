<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warantyrinci extends Model
{
    use HasFactory;

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function waranty(){
        return $this->belongsTo(Waranty::class);
    }
}
