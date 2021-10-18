@extends('layouts.cuba')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                <h3>Tambah Barang Waranty</h3>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/waranty')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Tambah Barang Waranty</li>
                </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success">{{ session()->get('success') }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ url('/admin/warantyrinci') }}" method="POST">
                        @csrf
                        <div>
                            <label>Pilih Nama Barang</label>
                        </div>
                            <input type="hidden" name="waranty_id" value="{{ $id }}">
                        <div>
                            <select class="js-example-basic-single form-control" name="item_id">
                                @foreach($item as $itm)
                                    <option value="{{ $itm->id}}">{{ $itm->nama_item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div>
                        <label>Quantity Barang </label>
                        <input type="text" class="form-control" name="qty" placeholder="Masukkan Quantity barang beserta Satuannya">
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{ url('/admin/waranty') }}" class="btn btn-secondary">Batal</a>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table table-hover table-condensed">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>qty</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($warantyrinci as $wrt)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $wrt->item->nama_item }}</td>
                                        <td>{{ $wrt->qty }}</td>
                                        <form action="/admin/warantyrinci/{{ $wrt->id }}" class="badge badge-danger" method="POST">
                                        <td>
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Yakin Akan Menghapus?')" class="btn btn-danger" type="submit">Hapus</button>          
                                        </td>
                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
