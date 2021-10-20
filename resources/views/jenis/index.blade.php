@extends('layouts.cuba')
@section('title','Jenis Mesin | PT INTER TEHNIK GEMILANG')
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
          <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Jenis Mesin</li>
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
            <a onclick="addForm()" class="btn btn-primary" data-bs-toggle="modal">Tambah Jenis Mesin</a>
            <!-- <a href="/admin/jenis/create" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambahJenis">
             Baru
            </a> -->
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
              <table class="table table-hover table-condensed" id="jenis-table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Mesin</th>
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

<div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('jenis.store') }}" id="form-item" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" >
                <!-- {{ csrf_field() }} {{ method_field('POST') }} -->
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                  <h5 class="modal-title"></h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama_mesin">Nama Unit</label>
                            <input type="text" class="form-control @error('nama_mesin') is-invalid @enderror" id="nama_mesin" name="nama_mesin"  autofocus">
                            @error('keterangan')
                            <span class="error-text invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"></textarea>
                            @error('keterangan')
                            <span class="error-text invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/validator/validator.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
<script>
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
      });

      $(document).ready(function() {
          $('#jenis-table').DataTable({
              processing: true,
              info: true,
              serverSide: true, //aktifkan server-side 
              ajax: {
                  url: "{{ route('jenis.index') }}",
                  type: 'GET'
              },
              // ajax:"{{ route('get.list.unit') }}",
              "pageLength": 10,
              "aLengthMenu": [
                  [10, 25, 50, 100, -1],
                  [10, 25, 50, 100, "All"]
              ],
              columns: [
                  // {data:'id', name:'id'},
                  {
                      data: 'DT_RowIndex',
                      name: 'DT_RowIndex'
                  },
                  {
                      data: 'nama_mesin',
                      name: 'nama_mesin'
                  },
                  {
                      data: 'keterangan',
                      name: 'keterangan'
                  },
                  {
                      data: 'actions',
                      name: 'actions'
                  },
              ],
              columnDefs: [
              { "width": "8%", "targets": 0 },
         {"width": "40%", "targets": 1},
         {"width": "37%", "targets": 2},
         {"width": "15%", "targets": 3}
  ],
              order: [0, 'desc'],
              drawCallback: function(settings) {
                  feather.replace()
              }
          });
      });

      $('table').on('draw.dt', function() {
          $('[data-toggle="tooltip"]').tooltip();
      })

      function addForm() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Tambah Jenis Mesin');
        }

        // function editForm(id) {
        //     save_method = 'edit';
        //     $('input[name=_method]').val('PATCH');
        //     $('#modal-form form')[0].reset();
        //     $.ajax({
        //       // console.log(response)
        //         url: "{{ url('admin/jenis') }}" + '/' + id + "/edit",
        //         type: "GET",
        //         dataType: "JSON",
        //         success: function(data) {
        //             $('#modal-form').modal('show');
        //             $('.modal-title').text('Edit Jenis Mesin');

        //             $('#id').val(data.id);
        //             $('#nama_mesin').val(data.nama_mesin);
        //             $('#keterangan').val(data.keterangan);
        //         },
        //         error : function() {
        //             alert("Nothing Data");
        //         }
        //     });
        // }

        

        $(function(){
            $('#modal-form form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    
                    if (save_method == 'add') url = "{{ url('admin/jenis') }}";
                    // else url = "jenis/" + id;
                    else url = "{{ url('admin/jenis') . '/' }}" + id;

                    $.ajax({
                        url : url,
                        type : "POST",
                        //hanya untuk input data tanpa dokumen
//                      data : $('#modal-form form').serialize(),
                        data: new FormData($("#modal-form form")[0]),
                        contentType: false,
                        processData: false,
                        // beforeSend:function(){
                        //   $(form).find('span.error-text').text('');
                        // },
                        success : function(data) {
                            $('#modal-form').modal('hide');
                            $('#jenis-table').DataTable().ajax.reload();
                            Swal.fire(
                              'Tersimpan!',
                              'Nama Unit berhasil di tambahkan.',
                              'success'
                          )
                        },
                        error : function(data){
                          $('#modal-form').modal('hide');
                            // $('#jenis-table').DataTable().ajax.reload();
                          Swal.fire(
                              'Terjadi kesalahan!',
                              'Nama Unit telah digunakan.',
                              'error'
                          )
                        }
                    });
                    return false;
                    //     success : function(data) {
                    //       if(data.code == 0){
                    //           $.each(data.error, function(prefix, val){
                    //             $(form).find('span.'+prefix+'_error').text(val[0]);
                    //           });
                    //         }else{
                    //           $(form)[0].reset();
                    //           alert(data.msg);
                    //           $('#modal-form').modal('hide');
                    //           $('#jenis-table').DataTable().ajax.reload();
                    //           Swal.fire(
                    //             'Tersimpan!',
                    //             'Jenis Berhasil berhasil di tambahkan.',
                    //             'success'
                    //           )
                    //           // $('#jenis-table').DataTable().ajax.reload(null, false);
                    //         }
                            
                    //     },
                    //     error : function(data){
                    //       Swal.fire(
                    //           'Terjadi kesalahan!',
                    //           'Jenis Mesin telah digunakan.',
                    //           'error'
                    //       )
                    //     }
                    // });
                    // return false;
                }
            });
        });

//         $(function(){
//             $('#modal-form form').validator().on('submit', function (e) {
//                 if (!e.isDefaultPrevented()){
//                     var id = $('#id').val();
//                     if (save_method == 'edit') url = "{{ url('admin/jenis') }}";
//                     else url = "{{ url('jenis') . '/' }}" + id;

//                     $.ajax({
//                         url : url,
//                         type : "POST",
//                         //hanya untuk input data tanpa dokumen
// //                      data : $('#modal-form form').serialize(),
//                         data: new FormData($("#modal-form form")[0]),
//                         contentType: false,
//                         processData: false,
//                         // beforeSend:function(){
//                         //   $(form).find('span.error-text').text('');
//                         // },
//                         success : function(data) {
//                             $('#modal-form').modal('hide');
//                             $('#jenis-table').DataTable().ajax.reload();
//                             Swal.fire(
//                               'Tersimpan!',
//                               'Nama Unit berhasil di tambahkan.',
//                               'success'
//                           )
//                         },
//                         error : function(data){
//                           $('#modal-form').modal('hide');
//                             // $('#jenis-table').DataTable().ajax.reload();
//                           Swal.fire(
//                               'Terjadi kesalahan!',
//                               'Nama Unit telah digunakan.',
//                               'error'
//                           )
//                         }
//                     });
//                     return false;
//                     //     success : function(data) {
//                     //       if(data.code == 0){
//                     //           $.each(data.error, function(prefix, val){
//                     //             $(form).find('span.'+prefix+'_error').text(val[0]);
//                     //           });
//                     //         }else{
//                     //           $(form)[0].reset();
//                     //           alert(data.msg);
//                     //           $('#modal-form').modal('hide');
//                     //           $('#jenis-table').DataTable().ajax.reload();
//                     //           Swal.fire(
//                     //             'Tersimpan!',
//                     //             'Jenis Berhasil berhasil di tambahkan.',
//                     //             'success'
//                     //           )
//                     //           // $('#jenis-table').DataTable().ajax.reload(null, false);
//                     //         }
                            
//                     //     },
//                     //     error : function(data){
//                     //       Swal.fire(
//                     //           'Terjadi kesalahan!',
//                     //           'Jenis Mesin telah digunakan.',
//                     //           'error'
//                     //       )
//                     //     }
//                     // });
//                     // return false;
//                 }
//             });
//         });

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

      // // LIST jenis
      // $('#jenis-table').DataTable({
      //     processing:true,
      //     info:true,
      //     ajax:"{{ route('get.list.jenis') }}",
      //     "pageLength":10,
      //     "aLengthMenu":[[10,25,50,100,-1],[10,25,50,100,"All"]],
      //     columns:[
      //       // {data:'id', name:'id'},
      //       {data:'DT_RowIndex', name:'DT_RowIndex'},
      //       {data:'nama_mesin', name:'nama_mesin'},
      //       {data:'keterangan', name:'keterangan'},
      //       {data:'actions', name:'actions'},
      //     ]
      // });

      $('body').on('click', '.editButton', function () {
        save_method = 'edit';
        var jenis_id = $(this).attr('id');
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
                url: "{{ url('admin/jenis') }}" + '/' + jenis_id + "/edit",
                // url: "{{ route('jenis.index') }}" +'/' + jenis_id +"/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edit Products');

                    $('#id').val(data.id);
                    $('#nama_mesin').val(data.nama_mesin);
                    $('#keterangan').val(data.keterangan);
                },
                error : function() {
                    alert("Nothing Data");
                }
            });
      // $.get("{{ route('jenis.index') }}" +'/' + jenis_id +'/edit', function (data) {
      //   $('.modal-title').text('Edit Jenis Mesin');
      //     $('#saveBtn').val("edit-book");
      //     $('#modal-form').modal('show');
      //     $('#jenis_id').val(data.id);
      //     $('#nama_mesin').val(data.nama_mesin);
      //     $('#keterangan').val(data.keterangan);
      // })
   });

  //  $('#saveBtn').click(function (e) {
  //       e.preventDefault();
  //       $(this).html('Save');
    
  //       $.ajax({
  //         data: $('#modal-form').serialize(),
  //         url: "{{ route('jenis.store') }}",
  //         type: "POST",
  //         dataType: 'json',
  //         success: function (data) {
     
  //             $('#bookForm').trigger("reset");
  //             $('#ajaxModel').modal('hide');
  //             table.draw();
         
  //         },
  //         error: function (data) {
  //             console.log('Error:', data);
  //             $('#saveBtn').html('Save Changes');
  //         }
  //     });
  //   });

  // function deleteData(id){
  //           var csrf_token = $('meta[name="csrf-token"]').attr('content');
  //           swal({
  //               title: 'Are you sure?',
  //               text: "You won't be able to revert this!",
  //               type: 'warning',
  //               showCancelButton: true,
  //               cancelButtonColor: '#d33',
  //               confirmButtonColor: '#3085d6',
  //               confirmButtonText: 'Yes, delete it!'
  //           }).then(function () {
  //               $.ajax({
  //                   url : "{{ url('admin/jenis') }}" + '/' + id,
  //                   type : "POST",
  //                   data : {'_method' : 'DELETE', '_token' : csrf_token},
  //                   success : function(data) {
  //                     $('#jenis-table').DataTable().ajax.reload();
  //                       Swal.fire(
  //                             'Tersimpan!',
  //                             'Nama Unit berhasil di tambahkan.',
  //                             'success'
  //                         )
  //                   },
  //                   error : function () {
  //                     Swal.fire(
  //                             'Terjadi kesalahan!',
  //                             'Nama Unit telah digunakan.',
  //                             'error'
  //                         )
  //                   }
  //               });
  //           });
  //       }

      $(document).on('click', '.deleteButton', function() {
          var jenis_id = $(this).attr('id');
          var csrf_token = $('meta[name="csrf-token"]').attr('content');
          // $('#deleteModal').modal('show');
          Swal.fire({
              title: 'Apa kamu yakin?',
              text: "Kamu ingin menghapus mesin barang!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Hapus',
              cancelButtonText: 'Batal'
          }).then((result) => {
              if (result.isConfirmed) {
                  $.ajax({
                      type: 'DELETE',
                      url: "jenis/" + jenis_id,
                      dataType: 'json',
                  });
                  $('#jenis-table').DataTable().ajax.reload();
                  Swal.fire(
                      'Terhapus!',
                      'Nama Mesin telah di hapus.',
                      'success'
                  )
              }
          })
      });

      // $(document).on('click','#editJenisBtn', function(){
      //     var jenis_id = $(this).data('id');
      //     $('.editJenis').find('form')[0].reset();
      //     $('.editJenis').find('span.error-text').text('');
      //     // alert(unit_id);
      //     $.post('<?= route("get.detail.jenis") ?>',{jenis_id:jenis_id}, function(data){
      //       // alert(data.details.nama_mesin);
      //       $('.editJenis').find('input[name="cid"]').val(data.details.id);
      //       $('.editJenis').find('input[name="nama_mesin"]').val(data.details.nama_mesin);
      //       $('.editJenis').find('input[name="keterangan"]').val(data.details.keterangan);
      //       $('.editJenis').modal('show');
      //     },'json');
      // });

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

      // console.log(document.querySelectorAll('.btn'))

      
  </script>
@endsection