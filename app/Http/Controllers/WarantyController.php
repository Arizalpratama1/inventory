<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Waranty;

class WarantyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waranty = Waranty::all();

        return view('laporan.indexwaranty', compact(
            'waranty')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $waranty = Waranty::all();

        return view('laporan.createwaranty', compact(
            'waranty')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $waranty = new Waranty;
        $waranty->nama_customer = $request->nama_customer;
        $waranty->tanggal = $request->tanggal;
        $waranty->main_power = $request->main_power;
        $waranty->leader = $request->leader;
        $waranty->save();
        
        return redirect('/admin/waranty')->with('success', 'Berhasil Menambahkan Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
