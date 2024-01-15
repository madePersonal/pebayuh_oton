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
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @include('layouts.navbar')

  @include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
    <!-- AdminLTE App -->
    <script src="{{ url('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('dist/js/demo.js') }}"></script>
    <!-- Page specific script -->
    <script>
      $(function () {
          $("#tb_pancawara").DataTable({
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

      $(document).on('click', '.edit_pancawara', function(){ 
        var id = $(this).data('id')
        $.ajax({
            url: "{{ url('/admin/data_pancawara')}}"+"/"+id,
            type: 'GET',
            dataType: 'json',
            success: function(res){
              console.log(res);
                // $('#form_r_diktek').find('select[name="jenis_diklat_tek"]').val(res.kdiktek).change();
                // $('#form_r_diktek').find('input[name="judul_diklat"]').val(res.nmdiktek);
                // $('#form_r_diktek').find('input[name="tempat_diklat"]').val(res.tempat);
                // $('#form_r_diktek').find('input[name="penyelenggara"]').val(res.oleh);
                // $('#form_r_diktek').find('input[name="angkatan"]').val(res.angkatan)
                // $('#form_r_diktek').find('input[name="tgl_mulai"]').val(res.tglawal)
                // $('#form_r_diktek').find('input[name="tgl_selesai"]').val(res.tglakhir)
                // $('#form_r_diktek').find('input[name="jam"]').val(res.jam)
                // $('#form_r_diktek').find('input[name="no_sttpl"]').val(res.nostt)
                // $('#form_r_diktek').find('input[name="tgl_sttpl"]').val(res.tglstt)
                // $('#form_r_diktek').find('input[name="id_diktek_tmp"]').val(res.id_r_diktek_tmp)
                // $('#modal_r_diktek').modal('show')
            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText)
            }
        });
      });
    </script>
</body>
</html>
