@extends('layouts.cuba')

@section('content')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Kelola Stock Barang Masuk</h3>
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
              <a href="/admin/transactionin/create" class="btn btn-primary">
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
              <div class="table-responsive">
                <table class="display" id="basic-1">
                  <thead>
                    <tr>
                      <th>Kode barang</th>
                      <th>Nama Barang</th>
                      <th>Stock Masuk</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($transaction as $trs)
                    <tr>
                      <td>{{ $trs->item->kode_item}}</td>
                      <td>{{ $trs->item->nama_item}}</td>
                      <td>{{ $trs->qty}}</td>
                      <td>
                          @if($trs->keterangan == 0)
                          <div class="badge badge-primary">Beli</div>
                          @elseif($trs->keterangan ==1)
                          <div class="badge badge-primary">Garansi Dari Supplier</div>
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