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
            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
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
            <div class="card-header with-border">
            <a href="/admin/jenis/create" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambahJenis">
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
                <table class="table table-hover table-condensed" id="jenis-table">
                  <thead>
                    <tr>
                      <th>jenis Mesin</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
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

<div class="modal fade" id="modaltambahJenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Jenis Mesin </h5>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/admin/jenis') }}" method="post" id="tambah-jenis">
        @csrf
          <div class="mb-3">
            <label class="col-form-label" for="recipient-name">Nama jenis Mesin:</label>
            <input class="form-control" name="nama_mesin" type="text">
            <span class="text-danger error-text nama_mesin_error"></span>
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

<div class="modal fade editJenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Jenis Mesin</h5>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= route('get.update.jenis') ?>" method="post" id="update-jenis-form">
        @csrf
        <input type="hidden" name="cid">
          <div class="mb-3">
            <label class="col-form-label" for="nama_mesin">Nama Jenis Mesin:</label>
            <input class="form-control" name="nama_mesin" type="text">
            <span class="text-danger error-text nama_mesin_error"></span>
          </div>
          <div class="mb-3">
            <label class="col-form-label" for="keterangan">Keterangan:</label>
            <input class="form-control" name="keterangan" type="text">
            <!-- <textarea class="form-control" name="keterangan" type="text"></textarea> -->
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

      //tambah jenis
      // $('#tambah-jenis').on('submit', function(e){
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
      //         // alert(data.msg);
      //         $('#jenis-table').DataTable().ajax.reload(null, false);
      //         toastr.success(data.msg);
      //       }
      //     }
      //   });
      // });

      // LIST jenis
      $('#jenis-table').DataTable({
          processing:true,
          info:true,
          ajax:"{{ route('get.list.jenis') }}",
          "pageLength":10,
          "aLengthMenu":[[10,25,50,100,-1],[10,25,50,100,"All"]],
          columns:[
            // {data:'id', name:'id'},
            {data:'DT_RowIndex', name:'DT_RowIndex'},
            {data:'nama_mesin', name:'nama_mesin'},
            {data:'keterangan', name:'keterangan'},
            {data:'actions', name:'actions'},
          ]
      });

      $(document).on('click','#editJenisBtn', function(){
          var jenis_id = $(this).data('id');
          $('.editJenis').find('form')[0].reset();
          $('.editJenis').find('span.error-text').text('');
          // alert(unit_id);
          $.post('<?= route("get.detail.jenis") ?>',{jenis_id:jenis_id}, function(data){
            // alert(data.details.nama_mesin);
            $('.editJenis').find('input[name="cid"]').val(data.details.id);
            $('.editJenis').find('input[name="nama_mesin"]').val(data.details.nama_mesin);
            $('.editJenis').find('input[name="keterangan"]').val(data.details.keterangan);
            $('.editJenis').modal('show');
          },'json');
      });

      // //UPDATE jenis
      //   $('#update-jenis-form').on('submit', function(e){
      //     e.preventDefault();
      //     // alert('hello form');
      //     var form = this;
      //     $.ajax({
      //       url:$(form).attr('action'),
      //       method:$(form).attr('method'),
      //       data:new FormData(form),
      //       processData:false,
      //       dataType:'json',
      //       contentType:false;
      //       beforeSend:function(){
      //         $(form).find('span.error-text').text('');
      //       },
      //       success:function(data){
      //         if(data.code == 0){
      //           $.each(data.error, function(prefix, val){
      //             $(form).find('span.'+prefix+'_error').text(val[0]);
      //           });
      //         }else{
      //           // alert(data.msg);
      //           $('.editJenis').modal('hide');
      //           $('.editJenis').find('form')[0].reset();
      //           toastr.success(data.msg);
      //         }
      //       }
      //     });
      //   });
      
      });

      // console.log(document.querySelectorAll('.btn'))

      
  </script>
@endsection