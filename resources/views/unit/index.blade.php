@extends('layouts.cuba')

@section('content')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Unit Barang</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
          <li class="breadcrumb-item">Test</li>
            <li class="breadcrumb-item active">Unit Barang</li>
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
          <a href="/admin/kategoribarang/create" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambahunit">
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
                      <th>Nama Unit</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($unit as $unt)
                      <tr>
                        <td>{{ $unt->nama_unit }}</td>
                        <td>{{ $unt->keterangan }}</td>
                        <td>
                          <form action="{{ url('admin/unit/'.$unt->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                          </form>
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


<div class="modal fade" id="modaltambahunit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Unit Barang</h5>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/admin/unit') }}" method="post" id="tambah-unit">
        @csrf
          <div class="mb-3">
            <label class="col-form-label" for="recipient-name">Nama Unit:</label>
            <input class="form-control" name="nama_unit" type="text">
            <span class="text-danger error-text nama_unit_error"></span>
          </div>
          <div class="mb-3">
            <label class="col-form-label" for="message-text">Keterangan:</label>
            <textarea class="form-control" name="keterangan"></textarea>
            <span class="text-danger error-text keterangan_error"></span>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
        <button class="btn btn-primary" type="submit">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('myjs')
<script>
      toastr.options.preventDuplicates = true;
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
      });

      $(function(){

      //tambah unit
      // $('#tambah-unit').on('submit', function(e){
      //   e.preventDefault();
      //   // alert('hello form');
      //   var form = this;
      //   $.ajax({
      //     url:$(form).attr('action'),
      //     method:$(form).attr('method'),
      //     data:new FormData(form),
      //     processData:false,
      //     dataType:'json',
      //     contentType:false;
      //     beforeSend:function(){
      //       $(form).find('span.error-text').text('');
      //     },
      //     success:function(data){
      //       if(data.code == 0){
      //         $.each(data.error, function(prefix, val){
      //           $(form).find('span.'+prefix+'_error').text(val[0]);
      //         });
      //       }else{
      //         $(form)[0].reset();
      //         alert(data.msg);
      //       }
      //     }
      //   });
      // });
      // });

      // console.log(document.querySelectorAll('.btn'))

      
  </script>
@endsection
