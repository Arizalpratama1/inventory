<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use DataTables;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $unit = Unit::all();
        if($request->ajax()){
            return datatables()->of($unit)
            ->addIndexColumn()
            ->addColumn('actions', function($row){
                return '<div class=""btn-group>
                    <button class="btn btn-sm btn-primary editButton"  id="'.$row->id.'" data-toggle="tooltip" data-placement="top" title="Edit"><i class="feather-16" data-feather="edit"></i></button>
                    <button class="btn btn-sm btn-danger deleteButton" name="delete" id="' . $row->id . '" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="feather-16" data-feather="trash"></i></button>
                </div>';
            })
            ->rawColumns(['actions'])
            ->make(true); 
        }
 
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

        $this->validate($request, [
            'nama_unit' => 'required|unique:unit',
            'keterangan' => 'required'
         ]);
  
        //  Store data in database
        Unit::create($request->all());

                    return response()->json([
                        'success' => true,
                        'message' => 'Jenis Mesin berhasil ditambahkan'
                    ]);
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
        $unit = Unit::find($id);
        return response()->json($unit);
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
        $this->validate($request, [
            'nama_unit' => 'required',
            'keterangan' => 'required'
         ]);

        //  Jenis::create($request->all());
        //  $Jenis = Product::findOrFail($id);
        $unit = Unit::findOrFail($id);
        $unit->update($request->all());
        $unit->update();

                    return response()->json([
                        'success' => true,
                        'message' => 'Unit Barang berhasil ditambahkan'
                    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        // return response()->json($id);
        $unit = Unit::find($id);
        $unit->delete();

    

    }

    // DETAIL UNIT
    public function DetailUnit(Request $request){
        $unit_id = $request->unit_id;
        $unitDetails = Unit::find($unit_id);
        return response()->json(['details'=>$unitDetails]);
    }

    // UPDATE UNIT
    public function UpdateUnit (Request $request){
        $unit_id = $request->cid;

        $validator = \Validator::make($request->all(),[
            'nama_unit'=>'required',
            'keterangan'=>'required',
            ])->validate();

            $unit = Unit::find($request->cid);
            $unit->nama_unit = $request->nama_unit;
            $unit->keterangan = $request->keterangan;
            $query = $unit->save();

            if($query){
                //return response()->json(['code'=>1, 'msg'=>'Nama Unit telah di Update']);

                return redirect()->back()->with('success', 'Berhasil Update Unit!');
            }else{
                return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
            }
    }
}
