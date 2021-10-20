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
            <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
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
          <div class="card-header with-border">
              <a href="/admin/transactionout/create" class="btn btn-primary">
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
                      <th>Kode barang</th>
                      <th>Nama Barang</th>
                      <th>Stock Keluar</th>
                      <th>Tanggal</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($transaction as $trs)
                    <tr>
                      <td>{{ $trs->item->kode_item}}</td>
                      <td>{{ $trs->item->nama_item}}</td>
                      <td>{{ $trs->qty}}</td>
                      <td>{{ $trs->created_at->format('d/m/y'); }}</td>
                      <td>
                          @if($trs->keterangan == 3)
                          <div class="badge badge-primary">Terjual</div>
                          @elseif($trs->keterangan == 4)
                          <div class="badge badge-primary">Garansi Untuk Customer</div>
                          @elseif($trs->keterangan == 5)
                          <div class="badge badge-primary">Retur Ke Supplier</div>
                          @endif
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
        <!-- Zero Configuration  Ends-->
  </div>
</div>
@endsection