<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Unit::all();

        return view('unit.index', compact(
            'unit'
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
        $validated = $request->validate([
            'nama_unit'=>'required|unique:unit',
            'keterangan'=>'required',
        ]);
        // $validator = Validator::make($request->all(),[
        //     'nama_unit'=>'required|unique:unit',
        //     'keterangan'=>'required',
        // ]);
        // if(!$validator->passes()){
        //     // return response()->json(['code'=>$validator->errors()->toArray()]);
        //     return redirect()->back();
        // }else{
            $unit = new Unit();
            $unit->nama_unit = $request->nama_unit;
            $unit->keterangan = $request->keterangan;
            $query = $unit->save();

            // if(!$query){
            //     return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
            // }else{
            //     // return response()->json(['code'=>1, 'msg'=>'Nama Unit telah ditambahkan']);
            //     return redirect()->back();
            // }
        // }
        return redirect()->back()->with('success', 'Berhasil Menambahkan Unit baru!');
        
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
        $unit = Unit::find($id);
        $unit->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Unit!');
    }
}
