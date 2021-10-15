@extends('layouts.cuba')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                <h3>Tambah Data Tertagih</h3>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Tambah Data Tertagih</li>
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
                        <form action="/admin/waranty" method="POST">
                        @csrf
                        <label>Nama Customer</label>
                        <input type="text" class="form-control" name="nama_customer" placeholder="Masukkan Nama Customer">
                        <label>Tanggal </label>
                        <input type="date" class="form-control" name="tanggal">
                        <label>Main Power</label>
                        <input type="text" class="form-control" name="main_power" placeholder="Masukkan Nama Main Power">
                        <label>Leader</label>
                        <input type="text" class="form-control" name="leader" placeholder="Masukkan Nama leader">
                        <div class="card-body">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="/admin/waranty" class="btn btn-secondary">Batal</a>
                        </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
