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
        // return view('unit');

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
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'nama_unit'=>'required|unique:unit',
    //         'keterangan'=>'required',
    //     ]);
    //     // $validator = Validator::make($request->all(),[
    //     //     'nama_unit'=>'required|unique:unit',
    //     //     'keterangan'=>'required',
    //     // ]);
    //     // if(!$validator->passes()){
    //     //     // return response()->json(['code'=>$validator->errors()->toArray()]);
    //     //     return redirect()->back();
    //     // }else{
    //         $unit = new Unit();
    //         $unit->nama_unit = $request->nama_unit;
    //         $unit->keterangan = $request->keterangan;
    //         $query = $unit->save();

    //         // if(!$query){
    //         //     return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
    //         // }else{
    //         //     // return response()->json(['code'=>1, 'msg'=>'Nama Unit telah ditambahkan']);
    //         //     return redirect()->back();
    //         // }
    //     // }
    //     return redirect()->back()->with('success', 'Berhasil Menambahkan Unit baru!');
        
    // }

    public function store(Request $request)
    {
        // $request->validate([
        //             'nama_unit' => 'required|unique:unit',
        //             'keterangan' => 'required'
        //         ]);

        // $input = $request->all();
        
        // Unit::create($input);

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

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama_unit' => 'required',
    //         'keterangan' => 'required'
    //     ],
    //     [
    //         'nama_unit.required' => 'blbalbalba',
    //         'keterangan' => 'required'
    //     ]
    // );

    //     $id = $request->id;
        
    //     $post   =   Unit::updateOrCreate(['id' => $id],
    //                 [
    //                     'nama_unit' => $request->nama_unit,
    //                     'keterangan' => $request->keterangan,
    //                 ]); 

    //     return response()->json($post);
    // }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'nama_unit'=>'required|unique:unit',
    //         'keterangan'=>'required',
    //     ]);
    //     // $validator = Validator::make($request->all(),[
    //     //     'nama_unit'=>'required|unique:unit',
    //     //     'keterangan'=>'required',
    //     // ]);
    //     // if(!$validator->passes()){
    //     //     // return response()->json(['code'=>$validator->errors()->toArray()]);
    //     //     return redirect()->back();
    //     // }else{
    //         $unit = new Unit();
    //         $unit->nama_unit = $request->nama_unit;
    //         $unit->keterangan = $request->keterangan;
    //         $query = $unit->save();

    //         // if(!$query){
    //         //     return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
    //         // }else{
    //         //     // return response()->json(['code'=>1, 'msg'=>'Nama Unit telah ditambahkan']);
    //         //     return redirect()->back();
    //         // }
    //     // }
    //     return redirect()->back()->with('success', 'Berhasil Menambahkan Unit baru!');
        
    // }
    // public function store(Request $request)
    // {
    //     Unit::updateOrCreate(['id' => $request->cid],
    //             ['nama_unit' => $request->nama_unit, 'keterangan' => $request->keterangan]);        

    //     return response()->json(['success'=>'Tambah Unit saved successfully!']);
    // }

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
    // public function destroy($id)
    // {
    //     //
    //     $unit = Unit::find($id);
    //     $unit->delete();

    //     return redirect()->back()->with('success', 'Berhasil Menghapus Unit!');
    // }

    public function destroy($id)
    {
        // return response()->json($id);
        $unit = Unit::find($id);
        $unit->delete();

    

    }

    //DELETE UNIT
    // public function DeleteUnit ($id){
    //     $unit_id = $request->$unit_id;
    //     Unit::find($id)->delete();
    // }

    // //DELETE UNIT
    // public function DeleteUnit (Request $request){
    //     $unit_id = $request->$unit_id;
    //     $query = Unit::find($unit_id)->delete();

    //     if($query){
    //         return response()->json(['code'=>1, 'msg'=>'Unit telah terhapus']);
    //     }else{
    //         return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
    //     }
    // }

    // LIST UNIT
    // public function ListUnit(){
    //     $unit = Unit::all();
    //     return DataTables::of($unit)
    //                         ->addIndexColumn()
    //                         ->addColumn('actions', function($row){
    //                             return '<div>
    //                                 <button class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="editUnitBtn"><i class="feather-16" data-feather="edit"></i></button>
    //                                 <button class="btn btn-sm btn-danger deleteButton" name="delete" id="' . $row->id . '"><i class="feather-16" data-feather="trash"></i></button>
    //                             </div>';
    //                         })
    //                         ->rawColumns(['actions'])
    //                         ->make(true);       
    // }

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

        // dd($validator);
        // if(!$validator->passes()){
        //     return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        //     // return redirect()->back();
        // }else{
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
        // }
    }
}
