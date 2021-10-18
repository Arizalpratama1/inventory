<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waranty extends Model
{
    use HasFactory;

    public function warantyrinci(){
        return $this->hasMany(Warantyrinci::class);
    }
}
