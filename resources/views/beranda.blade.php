@extends('layouts.cuba')

@section('content')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Dashboard</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-xl-3 col-lg-6">
      <div class="card o-hidden">
        <div class="bg-primary b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center"><i data-feather="database"></i></div>
            <div class="media-body"><a href="{{ url('/admin/item') }}"><span class="text-light m-0">Data Barang</span></a>
            <a href="{{ url('/admin/item') }}"><h4 class="text-light mb-0 counter">{{ \App\Models\Item::count() }}</h4></a><i class="icon-bg" data-feather="database"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3 col-lg-6">
      <div class="card o-hidden">
        <div class="bg-success b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
            <div class="media-body"><a href="{{ url('/admin/tertagih') }}"><span class="text-light m-0">Laporan Tertagih</span></a>
              <a href="{{ url('/admin/tertagih') }}"><h4 class="text-light mb-0 counter">{{ \App\Models\Tertagih::count() }}</h4></a><i class="icon-bg" data-feather="shopping-bag"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3 col-lg-6">
      <div class="card o-hidden">
        <div class="bg-danger b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
            <div class="media-body"><a href="{{ url('/admin/waranty') }}"><span class="text-light m-0">Laporan Waranty</span></a>
             <a href="{{ url('/admin/waranty') }}"><h4 class="text-light mb-0 counter">{{ \App\Models\Waranty::count() }}</h4></a><i class="icon-bg" data-feather="shopping-bag"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3 col-lg-6">
      <div class="card o-hidden">
        <div class="bg-secondary b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
            <div class="media-body"><span class="m-0">User</span>
              <h4 class="mb-0 counter">{{ \App\Models\User::count() }}</h4><i class="icon-bg" data-feather="user-plus"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="container-fluid">
      <div class="row">
        <!-- Zero Configuration  Starts-->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5>Laporan</h5>
            </div>
            <div class="card-body">
              <div class="table table-hover table-condensed">
                <table class="table" id="basic-1">
                  <thead>
                    <tr>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Unit</th>
                      <th>Jenis Mesin</th>
                      <th>Satuan</th>
                      <th>Stok Masuk</th>
                      <th>Stok Keluar</th>
                      <th>Stok Akhir</th>
                      <th>Kondisi Stock</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($item as $itm)
                    <tr>
                      <td>{{ $itm->kode_item}}</td>
                      <td>{{ $itm->nama_item}}</td>
                      <td class="text-center">
                        @php $daftarunit = ''; @endphp
                        @foreach($itm->unit as $unit)
                              @php $daftarunit .= $unit->unit->nama_unit." | " @endphp
                        @endforeach
                        <span class="badge badge-secondary">{{ $daftarunit }}</span>
                      </td>
                      <td class="text-center">
                        @php $daftarmesin = ''; @endphp
                          @foreach($itm->mesin as $mesin)
                            @php $daftarmesin .= $mesin->mesin->nama_mesin." | " @endphp
                          @endforeach
                          <span class="badge badge-primary">{{ $daftarmesin }}</span>
                      </td>
                      <td>{{ $itm->satuan}}</td>
                      <td>
                        @php $masuk = 0; @endphp
                        @foreach($itm->transaction as $transaction)
                          @if($transaction->tipe == 1)
                            @php $masuk += $transaction->qty; @endphp
                          @endif 
                        @endforeach
                        {{ $masuk }}
                      </td>
                      <td>
                        @php $keluar = 0; @endphp
                        @foreach($itm->transaction as $transaction)
                          @if($transaction->tipe == 2 )
                            @php $keluar += $transaction->qty; @endphp
                          @endif 
                        @endforeach
                        {{ $keluar }}
                      </td>
                      <td>{{ $itm->current_stock }}</td>
                      <td>
                        @if($itm->minimal_stock >= $itm->current_stock)
                          <span style="width: 100px;" class="badge badge-danger">KURANG</span>
                        @else
                          <span style="width: 100px;" class="badge badge-success">CUKUP</span>
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