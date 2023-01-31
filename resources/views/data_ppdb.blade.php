@extends('layouts.admin.main_admin')
@section('link')
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
@endsection
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data PPDB</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Data PPDB</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Peserta Didik Baru</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table_ppdb" class="table table-bordered table-striped">
                  <thead>
                  <tr style="text-align: center">
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>TTL</th>
                    <th>Asal Sekolah</th>
                    <th>Kontak</th>
                    <th>Program Keahlian</th>
                    <th>Referensi</th>
                    <th data-orderable="false">Menu</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?>
                  
                  @foreach ($data_ppdb as $data )
                  <tr>
                    <td><?= $no++ ?></td>
                    <td>{{ $data -> nisn }}</td>
                    <td>{{ $data -> nama }}</td>
                    <td>{{ $data -> sex }}</td>
                    <td>{{ $data -> tempat_lahir }}, {{ \Carbon\Carbon::parse($data -> tanggal_lahir)->translatedFormat('d F Y')}}</td>
                    <td>{{ $data -> asal_sekolah }}</td>
                    <td>
                      <b>Alamat: </b>{{ $data -> alamat }} <br>
                      <b>Siswa: </b>{{ $data -> no_hp_siswa }}
                        <br>
                        <b>Orang tua: </b>{{ $data -> no_hp_wali }}
                    </td>
                    <td>{{ $data -> keahlian }}</td>
                    <td>{{ $data -> referensi }}</td>
                    <td style="text-align: center">
                        <div style="display: inline;">
                          <a href="hapus_peserta_didik_baru/{{ $data->id }}" class="btn btn-danger konfirmasi"><i class="far fa-trash-alt"></i></a>
                          </div>
                    </td>
                  </tr>
                  @endforeach
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
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('script')
<!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#table_ppdb").DataTable({
      "responsive": true, 
      "lengthChange": true, 
      "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_ppdb_wrapper .col-md-6:eq(0)');
  });
</script>
<script>
  $('.konfirmasi').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
Swal.fire({
  text: "Anda yakin ingin menghapus data ini ? ",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Hapus!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = url;
  }
})
});
</script>
<script>
  @if (session()->has('success'))
    $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
      Toast.fire({
        icon: 'success',
        title: '{{ session('success') }}'
      })
  });
  @endif
</script>
@endsection