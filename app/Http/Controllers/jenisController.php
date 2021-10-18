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
                // return '<div>
                //     <button class="btn btn-sm btn-primary editButton" id="'.$row->id.'"><i class="feather-16" data-feather="edit"></i></a>
                //     <button class="btn btn-sm btn-danger deleteButton" name="delete" id="' . $row->id . '"><i class="feather-16" data-feather="trash"></i></button>
                // </div>';
                return '<div class=""btn-group>
                    <button class="btn btn-sm btn-primary editButton"  id="'.$row->id.'"><i class="feather-16" data-feather="edit"></i></button>
                    <button class="btn btn-sm btn-danger deleteButton" name="delete" id="' . $row->id . '"><i class="feather-16" data-feather="trash"></i></button>
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

    // public function store(Request $request)
    // {
    //     // $request->validate([
    //     //             'nama_unit' => 'required|unique:unit',
    //     //             'keterangan' => 'required'
    //     //         ]);

    //     // $input = $request->all();
        
    //     // Unit::create($input);
    //     $validator = \Validator::make($request->all(),[
    //         'nama_mesin' => 'required|unique:jenis_mesin',
    //         'keterangan' => 'required',
    //     ]);
    //     // $this->validate($request, [
    //     //     'nama_mesin' => 'required|unique:jenis_mesin',
    //     //     'keterangan' => 'required'
    //     //  ]);

    //     if(!$validator->passes()){
    //         return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
    //    }else{
    //        $jenis = new Jenis();
    //        $jenis->nama_mesin = $request->nama_mesin;
    //        $jenis->nama_mesin = $request->keterangan;
    //        $query = $jenis->save();

    //        if(!$query){
    //            return response()->json(['code'=>0,'msg'=>'Something went wrong']);
    //        }else{
    //            return response()->json(['code'=>1,'msg'=>'New Country has been successfully saved']);
    //        }
    //    }
  
    //     //  Store data in database
    //     // Jenis::create($request->all());

    //     //             return response()->json([
    //     //                 'success' => true,
    //     //                 'message' => 'Jenis Mesin berhasil ditambahkan'
    //     //             ]);
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
            'nama_mesin' => 'required|unique:jenis_mesin',
            'keterangan' => 'required'
         ]);
  
        //  Store data in database
        Jenis::create($request->all());

                    return response()->json([
                        'success' => true,
                        'message' => 'Jenis Mesin berhasil ditambahkan'
                    ]);
    }
    
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'nama_mesin'=>'required|unique:jenis_mesin',
    //         'keterangan'=>'required',
    //     ]);
    //     // $validator = Validator::make($request->all(),[
    //     //     'nama_mesin'=>'required|unique:jenis',
    //     //     'keterangan'=>'required',
    //     // ]);
    //     // if(!$validator->passes()){
    //     //     // return response()->json(['code'=>$validator->errors()->toArray()]);
    //     //     return redirect()->back();
    //     // }else{
    //         $jenis = new Jenis();
    //         $jenis->nama_mesin = $request->nama_mesin;
    //         $jenis->keterangan = $request->keterangan;
    //         $query = $jenis->save();

    //         // if(!$query){
    //         //     return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
    //         // }else{
    //         //     // return response()->json(['code'=>1, 'msg'=>'Nama jenis telah ditambahkan']);
    //         //     return redirect()->back();
    //         // }
    //     // }
    //     return redirect()->back()->with('success', 'Berhasil Menambahkan jenis baru!');
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

    // LIST UNIT
    // public function ListJenis(){
    //     $jenis = Jenis::all();
    //     return DataTables::of($jenis)
    //     ->addIndexColumn()
    //     ->addColumn('actions', function($row){
    //         return '<div class="btn-group">
    //             <button class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="editjenisBtn">Edit</button>
    //             <button class="btn btn-sm btn-danger">Hapus</button>
    //         </div>';
    //     })
    //     ->rawColumns(['actions'])
    //     ->make(true);       
    // }

    // DETAIL jenis
    // public function DetailJenis(Request $request){
    //     $jenis_id = $request->jenis_id;
    //     $jenisDetails = jenis::find($jenis_id);
    //     return response()->json(['details'=>$jenisDetails]);
    // }

    // UPDATE jenis
    // public function UpdateJenis (Request $request){
    //     $jenis_id = $request->cid;

    //     $validator = \Validator::make($request->all(),[
    //         'nama_mesin'=>'required',
    //         'keterangan'=>'required',
    //         ])->validate();

    //     // dd($validator);
    //     // if(!$validator->passes()){
    //     //     return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
    //     //     // return redirect()->back();
    //     // }else{
    //         $jenis = Jenis::find($request->cid);
    //         $jenis->nama_mesin = $request->nama_mesin;
    //         $jenis->keterangan = $request->keterangan;
    //         $query = $jenis->save();

    //         if($query){
    //             //return response()->json(['code'=>1, 'msg'=>'Nama jenis telah di Update']);

    //             return redirect()->back()->with('success', 'Berhasil Update jenis!');
    //         }else{
    //             return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
    //         }
    //     // }
    // }
}
