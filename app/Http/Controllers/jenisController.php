<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;
use App\Models\Unit;
use DataTables;
use Illuminate\Support\Facades\Validator;

class jenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jenis = Jenis::all();
        if($request->ajax()){
            return datatables()->of($jenis)
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
        return view('jenis.index', compact(
            'jenis'
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
            'nama_mesin' => 'required',
            'keterangan' => 'required'
         ]);
  
        //  Store data in database
        Jenis::create($request->all());

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
        $jenis = Jenis::find($id);
        return response()->json($jenis);
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
            'nama_mesin' => 'required',
            'keterangan' => 'required'
         ]);

        //  Jenis::create($request->all());
        //  $Jenis = Product::findOrFail($id);
        $jenis = Jenis::findOrFail($id);
        $jenis->update($request->all());
        $jenis->update();

                    return response()->json([
                        'success' => true,
                        'message' => 'Jenis Mesin berhasil ditambahkan'
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
        $jenis = Jenis::find($id);
        $jenis->delete();
        //
    }

}
