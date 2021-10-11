@extends('layouts.cuba')

@section('content')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Master Jenis Mesin</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
            <li class="breadcrumb-item active">Master Jenis Mesin</li>
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
              <h5>Daftar Nama Jenis Mesin</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="display" id="basic-1">
                  <thead>
                    <tr>
                      <th>jenis Mesin</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
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