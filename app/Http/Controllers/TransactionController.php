<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Jenis;
use App\Models\Item;
use App\Models\ItemUnit;
use App\Models\ItemJenis;
use App\Models\Itemrelation;

class TransactionController extends Controller
{

    public function stockin(){
        $item = Item::all();
        return view('stockin', compact(
            'item'
        ));
    }

    public function stockout(){
        $item = Item::all();
        return view('stockout', compact(
            'item'
        ));
    }
}
