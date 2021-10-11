@extends('layouts.app')

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
            <div class="media-body"><span class="m-0">Data Barang</span>
              <h4 class="mb-0 counter">6659</h4><i class="icon-bg" data-feather="database"></i>
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
            <div class="media-body"><span class="m-0">Barang Masuk</span>
              <h4 class="mb-0 counter">9856</h4><i class="icon-bg" data-feather="shopping-bag"></i>
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
            <div class="media-body"><span class="m-0">Barang Keluar</span>
              <h4 class="mb-0 counter">893</h4><i class="icon-bg" data-feather="shopping-bag"></i>
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
              <h4 class="mb-0 counter">45631</h4><i class="icon-bg" data-feather="user-plus"></i>
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
              <h5>Stock Barang telah mencapai batas minimum</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="display" id="basic-1">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011/07/25</td>
                      <td>$170,750</td>
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