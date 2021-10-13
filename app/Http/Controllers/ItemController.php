<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Itemrelation;

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
        $item = Item::all();

        return view('item.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item;
        $item->nama_item = $request->nama_item;
        $item->satuan = $request->satuan;
        $item->keterangan = $request->keterangan;
        $item->current_stock = $request->current_stock;
        $item->minimal_stock = $request->minimal_stock;
        $item->kode_item = $request->kode_item;
        $item->save();
        
        return redirect('/admin/item');
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
        $itemrelation = Itemrelation::all();

        return view('item.edit', compact(
            'item',
            'itemrelation'
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
        $item = new Item;
        $item->nama_item = $request->nama_item;
        $item->satuan = $request->satuan;
        $item->keterangan = $request->keterangan;
        $item->current_stock = $request->current_stock;
        $item->minimal_stock = $request->minimal_stock;
        $item->kode_item = $request->kode_item;
        $item->save();
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
        $item->delete();

        return redirect('/admin/item');
    }
}
