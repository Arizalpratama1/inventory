@extends('layouts.cuba')

@section('content')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Kelola Stock Barang Masuk</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            
            <a href="" class="btn btn-primary text-right"><i class="fa fa-plus"></i> Barang Masuk</a>          
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
            <div class="card-header">
              <h5>Kelola Stock Barang Masuk</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="display" id="basic-1">
                  <thead>
                    <tr>
                      <th>Kode barang</th>
                      <th>Nama Barang</th>
                      <th>Stock Masuk</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>61</td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>63</td>
                    </tr>
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