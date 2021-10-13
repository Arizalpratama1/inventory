@extends('layouts.cuba')

@section('content')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Master Barang</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
            <li class="breadcrumb-item active">Master Barang</li>
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
                    <form action="/admin/item" method="POST">
                    @csrf
                    <label>Kode Barang</label>
                    <input type="text" class="form-control" name="kode_item" placeholder="Masukkan Kode Barang">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" name="nama_item" placeholder="Masukkan Nama Barang">
                    <label>Keterangan Barang</label>
                    <textarea class="form-control" rows="4" name="keterangan" placeholder="Masukkan Keterangan Barang"></textarea>
                    <label>Satuan Barang</label>
                    <input type="text" class="form-control" name="satuan" placeholder="Masukkan Satuan Barang">
                    <label>Stok Awal Barang</label>
                    <input type="text" class="form-control" name="current_stock" placeholder="Masukkan Stock Awal Barang">
                    <label>Minimal Stock barang</label>
                    <input type="text" class="form-control" name="minimal_stock" placeholder="Masukkan Minimal Stock Barang">
                </div>
            </div> 
        </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="/admin/item" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
