<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tertagih;
use App\Models\Tertagihrinci;
use App\Models\Item;

class TertagihController extends Controller
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
            'tertagih'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tertagih = Tertagih::all();

        return view('laporan.tertagih.createtertagih', compact(
            'tertagih'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validation();

        $tertagih = new Tertagih;
        $tertagih->nama_customer = $request->nama_customer;
        $tertagih->tanggal = $request->tanggal;
        $tertagih->main_power = $request->main_power;
        $tertagih->leader = $request->leader;
        $tertagih->save();
        
        return redirect('/admin/tertagih')->with('success', 'Berhasil Menambahkan Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tertagihrinci = Tertagihrinci::where('tertagih_id', $id)->get();
        $item = Item::all();

        return view('laporan.tertagih.createttgrinci', compact(
            'tertagihrinci','item','id'
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
        //
    }
    private function validation()
    {
        $validate = request()->validate([
            'nama_customer'=>'required',
            'tanggal'=>'required',
            'main_power'=>'required',
            'leader'=>'required'
        ]);

        return $validate;
    }
}
