<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Jenis;
use App\Models\Item;
use App\Models\ItemUnit;
use App\Models\ItemJenis;
use App\Models\Itemrelation;
use App\models\Transaction;
use App\models\Tertagihrinci;
use App\models\Warantyrinci;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Item::all();
        return view('item.index', compact(
            'item'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $item = Item::all();
        $unit = Unit::all();
        $mesin = Jenis::all();
        return view('item.create', compact('unit', 'mesin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_item'=>'required',
            'satuan'=>'required',
            'current_stock'=>'required',
            'minimal_stock'=>'required',
            'kode_item'=>'required',
        ]);
        $item = new Item;
        $item->nama_item = $request->nama_item;
        $item->satuan = $request->satuan;
        $item->keterangan = $request->keterangan;
        $item->current_stock = $request->current_stock;
        $item->minimal_stock = $request->minimal_stock;
        $item->kode_item = $request->kode_item;
        $item->save();

        
        foreach($request->unit_id as $id_unit){
            $item_unit = new ItemUnit;
            $item_unit->item_id = $item->id;
            $item_unit->unit_id = $id_unit;
            $item_unit->save();
        }

        foreach($request->jenis_mesin_id as $id_mesin){
            $item_jenis = new ItemJenis;
            $item_jenis->item_id = $item->id;
            $item_jenis->jenis_mesin_id = $id_mesin;
            $item_jenis->save();
        }

        return redirect('/admin/item')->with('success', 'Berhasil Menambahkan Barang!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('item.detail', compact(
            'item'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $unit = Unit::all();
        $mesin = Jenis::all();

        return view('item.edit', compact(
            'item','unit','mesin'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        $item->nama_item = $request->nama_item;
        $item->satuan = $request->satuan;
        $item->keterangan = $request->keterangan;
        // $item->current_stock = $request->current_stock;
        $item->minimal_stock = $request->minimal_stock;
        $item->kode_item = $request->kode_item;
        $item->save();

        foreach($request->unit_id as $id_unit){
            $item_unit = new ItemUnit;
            $item_unit->item_id = $item->id;
            $item_unit->unit_id = $id_unit;
            $item_unit->save();
        }

        foreach($request->jenis_mesin_id as $id_mesin){
            $item_jenis = new ItemJenis;
            $item_jenis->item_id = $item->id;
            $item_jenis->jenis_mesin_id = $id_mesin;
            $item_jenis->save();
        }

        return redirect('/admin/item');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        ItemUnit::where('item_id', $id)->delete();
        ItemJenis::where('item_id', $id)->delete();
        Transaction::where('item_id', $id)->delete();
        Tertagihrinci::where('item_id', $id)->delete();
        Warantyrinci::where('item_id', $id)->delete();

        $item->delete();

        return redirect('/admin/item');
    }

    public function beranda(){
        $item = Item::all();
        // $item = DB::table('item')->count();
        // $laporan_tertagih = DB::table('tertagihs')->count();
        // $laporan_waranty = DB::table('waranties')->count();
        return view('beranda', compact(
            'item'
        ));
    }
}
