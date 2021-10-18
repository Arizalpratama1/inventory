@extends('layouts.cuba')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                <h3>Detail Data Waranty</h3>
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
                        <label>Nama Customer</label>
                        <input type="text" class="form-control" readonly value="{{ $waranty->nama_customer}}">
                        
                        <label>Tanggal </label>
                        <input type="date" class="form-control" readonly value="{{ $waranty->tanggal}}">
                        
                        <label>Main Power</label>
                        <input type="text" class="form-control" readonly value="{{ $waranty->main_power}}">
                        
                        <label>Leader</label>
                        <input type="text" class="form-control" readonly value="{{ $waranty->leader}}">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($waranty->warantyrinci as $wrt)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $wrt->item->nama_item }}</td>
                                        <td>{{ $wrt->qty }}</td>
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
