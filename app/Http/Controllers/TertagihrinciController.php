<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tertagihrinci;
use App\Models\Tertagih;
use App\Models\Item;


class TertagihrinciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tertagih = Tertagih::all();

        return view('laporan.tertagih.indextertagih', compact(
            'tertagihrinci'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $tertagihrinci = new Tertagihrinci;
        $tertagihrinci->tertagih_id = $request->tertagih_id;
        $tertagihrinci->item_id = $request->item_id;
        $tertagihrinci->qty = $request->qty;
        $tertagihrinci->save();

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $tertagih = Tertagih::where('id', $id)->firstOrFail();
        $item = Item::all();

        return view('laporan.tertagih.detail', compact(
            'tertagih','item'
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tertagihrinci = Tertagihrinci::find($id);
        $tertagihrinci->delete();

        return redirect()->back();
    }
}
