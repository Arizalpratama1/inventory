@extends('layouts.cuba')

@section('content')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Data Laporan Tertagih</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item active">Data Laporan Tertagih</li>
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
            <a href="/admin/waranty/create" class="btn btn-primary">
            Baru
            </a>
            </div>
            <div class="card-body">
              @if(session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
              @endif
              <div class="table table-hover table-condensed">
                <table class="display" id="basic-1">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Customer</th>
                      <th>Tanggal</th>
                      <th>Main Power</th>
                      <th>Leader</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($waranty as $wrt)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $wrt->nama_customer }}</td>
                        <td>{{ $wrt->tanggal }}</td>
                        <td>{{ $wrt->main_power }}</td>
                        <td>{{ $wrt->leader }}</td>
                        <td>
                          <a href="/admin/warantyrinci/create" class="badge badge-primary">
                            <i data-feather="plus"></i>
                            Tambah Barang
                          </a>
                        </td>
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