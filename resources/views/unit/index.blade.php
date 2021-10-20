@extends('layouts.cuba')
@section('title','Unit Barang | PT INTER TEHNIK GEMILANG')
@section('content')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Master Unit Barang</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
          <li class="breadcrumb-item">Dashboard</li>
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
          <!-- <a onclick="addForm()" class="btn btn-primary">Add Products</a> -->
          <!-- <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambahunit"> -->
          <!-- <a href="javascript:void(0)" class="btn btn-primary" id="tombol-tambah">Tambah Unit Barang</a> -->
          <a onclick="addForm()" class="btn btn-primary" data-bs-toggle="modal">Tambah Nama Unit</a>

      </div>
          <div class="card-body">
              <!-- @if ($errors->any())
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
              @endif -->
              <table class="table table-hover table-condensed" id="unit-table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Unit</th>
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
        <!-- Zero Configuration  Ends-->
  </div>
</div>


<!-- <div class="modal fade" id="tambah-edit-modal" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modal-judul"></h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="{{ route('unit.store') }}" method="post" id="form-tambah-edit" autocomplete="off">
                                @csrf
                                <input type="hidden" name="id" id="id">
                                <div class="form-group">

                                    <label for="">Country name</label>
                                    <input type="text" class="form-control" name="nama_unit" placeholder="Enter country name">
                                    <span class="text-danger error-text nama_unit_error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Capital city</label>
                                    <input type="text" class="form-control" name="keterangan" placeholder="Enter capital city">
                                    <span class="text-danger error-text keterangan_error"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-success">SAVE</button>
                                </div>
                            </form>
                </div>
                
            </div>
        </div>
    </div> -->

<!-- <div class="modal fade" id="modaltambahunit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div> -->

<!-- <div class="modal fade" id="modaltambahunit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div> -->


<div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('unit.store') }}" id="form-item" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" >
                {{ csrf_field() }} {{ method_field('POST') }}
                <!-- @csrf -->
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Unit Barang</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body">
                    <input type="hidden" id="id" name="id">


                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama_unit">Nama Unit</label>
                            <input type="text" class="form-control @error('nama_unit') is-invalid @enderror" id="nama_unit" name="nama_unit"  autofocus">
                            @error('nama_unit')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"></textarea>
                            @error('keterangan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>




                    </div>
                    <!-- /.box-body -->

                </div>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                  <button class="btn btn-primary" type="submit">Simpan</button>
                </div>

                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



@endsection

@section('myjs')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/validator/validator.min.js') }}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" -->
        <!-- integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script> -->
<script>
      // toastr.options.preventDuplicates = true;
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
      });

      // $(function(){

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
      //         // alert(data.msg);
      //         $('#unit-table').DataTable().ajax.reload(null, false);
      //         toastr.success(data.msg);
      //       }
      //     }
      //   });
      // });

      // $('#tombol-tambah').click(function () {
      //       $('#button-simpan').val("create-post"); //valuenya menjadi create-post
      //       $('#id').val(''); //valuenya menjadi kosong
      //       $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
      //       $('#modal-judul').html("Tambah Pegawai Baru"); //valuenya tambah pegawai baru
      //       $('#tambah-edit-modal').modal('show'); //modal tampil
      //   });

      // LIST UNIT
      $(document).ready(function() {
          $('#unit-table').DataTable({
              processing: true,
              info: true,
              serverSide: true, //aktifkan server-side 
              ajax: {
                  url: "{{ route('unit.index') }}",
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
                      data: 'nama_unit',
                      name: 'nama_unit'
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
              },
              
          });
      });

      // $(function () {
      //   $('[data-toggle="tooltip"]').tooltip()
      // })

      $('table').on('draw.dt', function() {
          $('[data-toggle="tooltip"]').tooltip();
      })
      // $("[data-toggle=tooltip]").tooltip({"animation" : false});

// $('body').tooltip({selector: '[data-toggle="tooltip"]'});

      // $('body').tooltip({selector: '[data-toggle="tooltip"]'});
      // $('[data-toggle="tooltip"]').tooltip();

      if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({
              rules: {
      nama_unit: {
        required: true,
        uniqueUserName: true,
      },
 
       keterangan: {
            required: true,
        }  
    },
    messages: {
       
      nama_unit: {
        required: "Please enter name",
        uniqueUserName: "nama unit sudah digunakan",
      },
      keterangan: {
        required: "Please enter contact number",
      },
        
    },
                submitHandler: function (form) {
                    var actionType = $('#tombol-simpan').val();
                    $('#tombol-simpan').html('Sending..');
                    $.ajax({
                        data: $('#form-tambah-edit')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('unit.store') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json', //data tipe kita kirim berupa JSON
                        success: function (data) { //jika berhasil
                            
                            $('#form-tambah-edit').trigger("reset"); //form reset
                            $('#tambah-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#unit-table').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            Swal.fire(
                                'Berhasil!',
                                'Nama Unit telah di tambahkan',
                                'success'
                            )
                        },
                        error: function (data) { //jika error tampilkan error pada console
                            console.log('Error:', data);
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }

      // $(document).on('click','#editUnitBtn', function(){
      //     unit_id = $(this).data('id');
      //     $('.editUnit').find('form')[0].reset();
      //     $('.editUnit').find('span.error-text').text('');
      //     // alert(unit_id);
      //     $.post('',{unit_id:unit_id}, function(data){
      //       // alert(data.details.nama_unit);
      //       $('.editUnit').find('input[name="cid"]').val(data.details.id);
      //       $('.editUnit').find('input[name="nama_unit"]').val(data.details.nama_unit);
      //       $('.editUnit').find('input[name="keterangan"]').val(data.details.keterangan);
      //       $('.editUnit').modal('show');
      //     },'json');
      // });

      function addForm() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Tambah Nama Unit');
        }

//         $(function(){
//             $('#modal-form form').validator().on('submit', function (e) {
//                 if (!e.isDefaultPrevented()){
//                     var id = $('#id').val();
//                     if (save_method == 'add') url = "{{ url('admin/unit') }}";
//                     // else url = "{{ url('unit') . '/' }}" + id;
//                     else url = "{{ url('admin/unit') . '/' }}" + id;

//                     $.ajax({
//                         url : url,
//                         type : "POST",
//                         //hanya untuk input data tanpa dokumen
// //                      data : $('#modal-form form').serialize(),
//                         data: new FormData($("#modal-form form")[0]),
//                         contentType: false,
//                         processData: false,
//                         success : function(data) {
//                             $('#modal-form').modal('hide');
//                             $('#unit-table').DataTable().ajax.reload();
//                             Swal.fire(
//                               'Tersimpan!',
//                               'Nama Unit berhasil di tambahkan.',
//                               'success'
//                           )
//                         },
//                         error : function(data){
//                           Swal.fire(
//                               'Terjadi kesalahan!',
//                               'Nama Unit telah digunakan.',
//                               'error'
//                           )
//                         }
//                     });
//                     return false;
//                 }
//             });
//         });

        $(function(){
            $('#modal-form form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    
                    if (save_method == 'add') url = "{{ url('admin/unit') }}";
                    // else url = "jenis/" + id;
                    else url = "{{ url('admin/unit') . '/' }}" + id;

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
                            $('#unit-table').DataTable().ajax.reload();
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
                }
            });
        });

        $('body').on('click', '.editButton', function () {
        save_method = 'edit';
        var unit_id = $(this).attr('id');
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
                url: "{{ url('admin/unit') }}" + '/' + unit_id + "/edit",
                // url: "{{ route('jenis.index') }}" +'/' + jenis_id +"/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edit Nama Unit');

                    $('#id').val(data.id);
                    $('#nama_unit').val(data.nama_unit);
                    $('#keterangan').val(data.keterangan);
                },
                error : function() {
                    alert("Nothing Data");
                }
            });
   });

      //HAPUS UNIT
      $(document).on('click', '.deleteButton', function() {
          var unit_id = $(this).attr('id');
          var csrf_token = $('meta[name="csrf-token"]').attr('content');
          // $('#deleteModal').modal('show');
          Swal.fire({
              title: 'Apa kamu yakin?',
              text: "Kamu ingin menghapus unit barang!",
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
                      url: "unit/" + unit_id,
                      dataType: 'json',
                  });
                  $('#unit-table').DataTable().ajax.reload();
                  Swal.fire(
                      'Terhapus!',
                      'Nama Unit telah di hapus.',
                      'success'
                  )
              }
          })
      });
        // }).then((result) => {
        //   if (result.isConfirmed) {
        //     $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     type:'DELETE',
        //     url:"unit/" + unit_id,
        //     });

        //     $('#unit-table').DataTable().ajax.reload();

        //     Swal.fire(
        //       'Deleted!',
        //       'Your file has been deleted.',
        //       'success'
        //     )
        //   }
        // })
       

    //     $('#ok_button').click(function(){
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         type:'DELETE',
    //         url:"unit/" + unit_id,
    //     });
    //         $.ajax({
    //             beforeSend:function(){
    //                 $('#ok_button').text('Deleting...');
                    
    //             },
    //         success:function(data)
    //         {
    //           // console.log(data);
    //             setTimeout(function(){
                  
    //                 $('#deleteModal').modal('hide');
    //                 $('#ok_button').text('OK');
    //                 $('#unit-table').DataTable().ajax.reload();
                    
    //                 Swal.fire({
    //                   icon: 'success',
    //                   title: 'Your work has been saved',
    //                   timer: 1500
    //                 })
    //                 // Swal.fire(
    //                 //   'Terhapus!',
    //                 //   'Unit Barang telah di hapus',
    //                 //   'success'
    //                 // )
    //             }, 1000);
    //         }
    //     });
    // });

      // //UPDATE UNIT
      //   $('#update-unit-form').on('submit', function(e){
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
      //           $('.editUnit').modal('hide');
      //           $('.editUnit').find('form')[0].reset();
      //           toastr.success(data.msg);
      //         }
      //       }
      //     });
      //   });
      
      // });

      // console.log(document.querySelectorAll('.btn'))

      
  </script>
@endsection
