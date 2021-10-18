@extends('layouts.cuba')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                <h3>Kelola Stock Barang Keluar</h3>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/transactionin') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Kelola Stock Barang Keluar</li>
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
                        <form action="/admin/transactionout" method="POST">
                        @csrf
                        <div>
                            <label>Pilih Nama Barang</label>
                        </div>
                            <input type="hidden" name="tipe" value="2">
                        <div>
                            <select class="js-example-basic-single form-control" name="item_id">
                                @foreach($item as $itm)
                                    <option value="{{ $itm->id}}">{{ $itm->nama_item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Quantity</label>
                            <input type="text" class="form-control" name="qty" placeholder="Masukkan Quantity">
                        </div>
                        <div>
                            <label>Keterangan</label>
                            <select name="keterangan" class="form-control">
                                <option value="2">Terjual</option>
                                <option value="4">Garansi Untuk Customer</option>
                                <option value="5">Retur ke Supplier</option>
                            </select>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="/admin/transactionin" class="btn btn-secondary">Batal</a>
                        </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
