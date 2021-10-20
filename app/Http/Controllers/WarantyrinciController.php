<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Waranty;
use App\Models\Warantyrinci;
use App\Models\Item;

class WarantyrinciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waranty = Waranty::all();

        return view('laporan.waranty.indexwaranty', compact(
            'warantyrinci'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        
        $warantyrinci = new Warantyrinci;
        $warantyrinci->waranty_id = $request->waranty_id;
        $warantyrinci->item_id = $request->item_id;
        $warantyrinci->qty = $request->qty;
        $warantyrinci->save();

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
        $waranty = Waranty::where('id', $id)->firstOrFail();
        $item = Item::all();

        return view('laporan.waranty.detail', compact(
            'waranty','item'
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
        $warantyrinci = Warantyrinci::find($id);
        $warantyrinci->delete();

        return redirect()->back();
    }

    private function validation()
    {
        $validate = request()->validate([
            'qty'=>'required'
        ]);

        return $validate;
    }
}
