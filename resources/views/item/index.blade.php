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
            <div class="card-header with-border">
            <a href="/admin/item/create" class="btn btn-primary">
            Baru
            </a>
            </div>
            <div class="card-body">
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
              @if(session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
              @endif
              <div class="table table-hover table-condensed">
                <table class="display" id="basic-1">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode barang</th>
                      <th>Nama Barang</th>
                      <th>Unit</th>
                      <th>Jenis Mesin</th>
                      <th>Stock Sekarang</th>
                      <th>Minimal Stock</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($item as $itm)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $itm->kode_item}}</td>
                        <td>{{ $itm->nama_item}}</td>
                        <td>
                          @foreach($itm->unit as $unit)
                            <span class="badge badge-primary">{{ $unit->unit->nama_unit }}</span>
                          @endforeach
                        </td>
                        <td>
                          @foreach($itm->mesin as $mesin)
                            <span class="badge badge-primary">{{ $mesin->mesin->nama_mesin }}</span>
                          @endforeach
                        </td>
                        <td>{{ $itm->current_stock}}</td>
                        <td>{{ $itm->minimal_stock}}</td>
                        <form action="/admin/item/{{ $itm->id }}" class="badge badge-danger" method="POST">
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