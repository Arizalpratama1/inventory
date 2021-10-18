<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tertagihrinci extends Model
{
    use HasFactory;

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function tertagih(){
        return $this->belongsTo(Tertagih::class);
    }
}
