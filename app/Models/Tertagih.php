<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tertagih extends Model
{
    use HasFactory;

    protected $table = 'tertagihs';

    // public function tertagih(){
    //     return $this->hasMany('\App\Models\Item');
    // }
}
