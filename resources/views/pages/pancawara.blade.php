<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">

  <!-- waitMe -->
  <link rel="stylesheet" href="{{ url('css/waitMe.min.css') }}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ url('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @include('layouts.navbar')

  @include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pancawara</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pancawara</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data upakara</h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <button id="btn-add-data" class="btn btn-primary" type="button">Tambah</button>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tb_pancawara" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>Pancawara</th>
                        <th>Pebayuh</th>
                        <th>Sedahan ngurah</th>
                        <th>Genah mebayuh</th>
                        <th>Ket</th>
                        <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  @include('layouts.footer')

</div>
<!-- ./wrapper -->
    <div class="modal fade" id="modal-edit">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Default Modal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form_edit" action="#" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" id="id_upakara" name="id_upakara">
              <div class="form-group">
                  <label>Hari</label>
                  <select id="hari" name="hari" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option value=""></option>
                    @foreach ($pancawara_hari as $hari)
                    <option value="{{ $hari->id_hari }}">{{ $hari->nama_hari }}</option>
                    @endforeach
                  </select>
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Pebayuh</label>
                <textarea id="pebayuh" name="pebayuh"></textarea>
              </div>
              <div class="form-group">
                <label for="sedahan_ngurah">Sedahan ngurah</label>
                <input type="text" class="form-control" id="sedahan_ngurah" name="sedahan_ngurah">
              </div>
              <div class="form-group">
                <label for="sedahan_ngurah">Genah mebayuh</label>
                <input type="text" class="form-control" id="genah" name="genah">
              </div>
              <div class="form-group">
                <label for="sedahan_ngurah">Ket</label>
                <input type="text" class="form-control" id="ket" name="ket">
              </div>
            </form>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" id="edit_submit" class="btn btn-primary">Simpan</button>
            <button type="submit" id="add_submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <!-- jQuery -->
    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ url('plugins/select2/js/select2.full.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ url('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->

    <script src="{{ url('dist/js/demo.js') }}"></script>
    <!-- Page specific script -->

    <!-- Summernote -->
    <script src="{{ url('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- WaitMe -->
    <script src="{{ url('js/waitMe.min.js') }}"></script>


    <script>
      var tb_pancawara;
      $(function () {
        $("#content-wrapper").waitMe("hide");
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })

        // // Summernote
        $('#pebayuh').summernote({
          tabsize: 2,
          height: 100,
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            // ['table', ['table']],
            // ['insert', ['link', 'picture', 'video']],
            // ['view', ['fullscreen', 'codeview', 'help']]
          ]
        })

        tb_pancawara = $("#tb_pancawara").DataTable({
          "responsive": true, 
          "lengthChange": false, 
          "autoWidth": false,
          processing: true,
          serverSide: true,
          ajax: "{!! url('/admin/data_pancawara') !!}", // memanggil route yang menampilkan data json
          columns: [
              {
                  data: 'nama_hari',
                  name: 'nama_hari'
              },
              {
                  "searchable": false,
                  "orderable": false,
                  data: 'pebayuh',
                  name: 'pebayuh'
              },
              {
                  data: 'sedahan_ngurah',
                  name: 'sedahan_ngurah'
              },
              {
                  data: 'genah',
                  name: 'genah'
              },
              {
                  data: 'ket',
                  name: 'ket'
              },
              {
                  "data": null,
                  "name": null,
                  "searchable": false,
                  "orderable": false,
                  "render": function (data, type, row, meta) {
                    return '<button class="edit_pancawara" type="button" data-id="'+data.id_upakara+'"><i class="fa fas fa-edit"></i></button>';
                  }
              }
          ]
        })
      });

      function wait_me(){
        $('.modal').waitMe({
          effect : 'roundBounce',
          text : '',
          bg : "rgba(255,255,255,0.7)",
          color : "#000",
          maxSize : '',
          waitTime : -1,
          textPos : 'vertical',
          fontSize : '',
          source : '',
          onClose : function() {}
        });
      }

      function stop_wait(){
        $('.modal').waitMe("hide");
      }

      $(document).on('click', '#btn-add-data', function(){ 
        $("#add_submit").show()
        $("#edit_submit").hide()
        $('#modal-edit').modal('show');
      })

      $(document).on('click', '.edit_pancawara', function(){ 
        var id = $(this).data('id')
        $("#add_submit").hide()
        $("#edit_submit").show()
        $.ajax({
            url: "{{ url('/admin/data_pancawara')}}"+"/"+id,
            type: 'GET',
            dataType: 'json',
            success: function(res){
              console.log(res);
                $('#hari').val(res.hari_id).change();
                $("#pebayuh").summernote("code", res.pebayuh);
                $("#sedahan_ngurah").val(res.sedahan_ngurah);
                $("#genah").val(res.genah);
                $("#ket").val(res.ket);
                $("#id_upakara").val(res.id_upakara);
                $('#modal-edit').modal('show');
            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText)
            }
        });
      });

      $(document).on('click', '#edit_submit', function(e){ 
        // console.log('edit_submit')
        wait_me()
        e.preventDefault();
        let form = $('#form_edit')[0];
        let data = new FormData(form);
        // console.log(data)
        $.ajax({
            url: "{{ url('/admin/update_upkara') }}",
            dataType: 'json',
            method: "POST",   
            cache:false,
            processData:false,
            contentType:false,
            data: data,
            success: function(res) {
              stop_wait()
              console.log(res)
              alert("Berhasil" + res.message);
              $('#modal-edit').modal('hide');
              tb_pancawara.ajax.reload();
            },
            error: function(error) {
              stop_wait()
               console.log(error)
            }
        });    
      })

      $(document).on('click', '#add_submit', function(e){ 
        // console.log('edit_submit')
        wait_me()
        e.preventDefault();
        let form = $('#form_edit')[0];
        let data = new FormData(form);
        // console.log(data)
        $.ajax({
            url: "{{ url('/admin/add_upkara') }}",
            dataType: 'json',
            method: "POST",   
            cache:false,
            processData:false,
            contentType:false,
            data: data,
            success: function(res) {
              stop_wait()
              console.log(res)
              alert("Berhasil" + res.message);
              $('#modal-edit').modal('hide');
              tb_pancawara.ajax.reload();
            },
            error: function(error) {
              stop_wait()
               console.log(error)
            }
        });    
      })
    </script>
</body>
</html>
