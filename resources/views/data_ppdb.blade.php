@extends('layouts.admin.main_admin')
@section('title')
  {{'Data PPDB'}}
@endsection
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
                    <th>Konsentrasi Keahlian</th>
                    <th>Upload Berkas</th>
                    <th>Status</th>
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
                      {{-- <b>Alamat: </b>Blok {{ $data -> blok }}-RT {{ $data -> rt }}-RW {{ $data -> rw }}-Desa {{ $data -> desa }}-Kecamatan {{ $data -> kecamatan }}-Kabupaten {{ $data -> kabupaten }}  --}}
                      {{-- <br> --}}
                      <a target="_blank" href="https://wa.me/62{{ $data -> no_siswa }}?text=Assalamualaikum%20wr.%20wb%2C%0ATerimakasih%20telah%20mendaftar%20di%20SMK%20Muhammadiyah%20Kandanghaur.%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20Untuk%20proses%20pendaftaran%20PPDB%20selanjutnya%2C%20kami%20ingin%20konfirmasi%20ulang%20anda%20untuk%20masuk%20ke%20sekolah%20kami.%20Apakah%20betul%20Kami%20Terhubung%20dengan%3A%0A%0ANIK%3A%20{{ $data -> no_nik }}%0ANISN%20%3A%20{{ $data -> nisn }}%0AEmail%20%3A%20{{ $data -> email }}%0ANama%20%3A%20{{ $data -> nama }}%0ATanggal%20Lahir%20%3A%20{{ \Carbon\Carbon::parse($data -> tanggal_lahir)->translatedFormat('d F Y')}}%0AAsal%20Sekolah%20%3A%20{{ $data -> asal_sekolah }}%0A%0AKami%20ingin%20memastikan%20kesesuaian%20data%20yang%20sudah%20anda%20isi%20dengan%20database%20kami.%20Kami%20harap%20anda%20dapat%20bekerjsama%20dan%20memberi%20perhatian%20khusus%20pada%20proses%20ini%20dan%20beri%20respons%20sesuai%20petunjuk.%20Jika%20ada%20pertanyaan%20silakan%20hubungi%20kami%20setiap%20hari%20%26%20Jam%20kerja%20(Senin%20-%20Jum%27at%20%3A%2008.00%20-%2015.00%20wib)%0Aterima%20kasih    ">
                    {{ $data -> no_siswa }}</a>
                      {{-- <br> --}}
                      {{-- <b>Orang tua: </b>{{ $data -> no_wali }} --}}
                    </td>
                    <td>{{ $data -> keahlian }}</td>
                    <td width="14%">
                      <div class="mb-2">
                        <b>Pas Foto <span style="padding-left:10px;">:</span></b>
                          @if ($data -> pasfoto != null)
                              <a target="_blank" href="{{ asset('storage/dokumen-ppdb/'. $data->pasfoto) }}"><span class="btn-success p-1 rounded">Sudah</span></a>
                          @else
                          <span class="btn-danger p-1 rounded">Belum</span>
                      @endif <br>
                      </div>
                      <div class="mb-2">
                        <b>KK <span style="padding-left:50px;">:</span></b>
                      @if ($data -> kk != null)
                          <a target="_blank" href="{{ asset('storage/dokumen-ppdb/'. $data->kk) }}"><span class="btn-success p-1 rounded">Sudah</span></a>
                      @else
                          <span class="btn-danger p-1 rounded">Belum</span>
                      @endif <br>
                      </div>
                      <div class="mb-2">
                        <b>AKTA <span style="padding-left:35px;">:</span></b>
                      @if ($data -> akta != null)
                          <a target="_blank" href="{{ asset('storage/dokumen-ppdb/'. $data->akta) }}"><span class="btn-success p-1 rounded">Sudah</span></a>
                      @else
                          <span class="btn-danger p-1 rounded">Belum</span>
                      @endif
                      </div>
                      <div class="mb-2">
                        <b>Ijazah <span style="padding-left:29px;">:</span></b>
                      @if ($data -> ijazah != null)
                          <a target="_blank" href="{{ asset('storage/dokumen-ppdb/'. $data->ijazah) }}"><span class="btn-success p-1 rounded">Sudah</span></a>
                      @else
                          <span class="btn-danger p-1 rounded">Belum</span>
                      @endif
                      </div>
                    </td>
                    <td width="14%">
                      <div class="mb-2">
                        <b>Verifikasi <span style="padding-left:50px;">:</span></b>
                          @if ($data -> verifikasi == 'Verified')
                              <span class="btn-success p-1 rounded">Sudah</span>
                          @else
                          <span class="btn-danger p-1 rounded">Belum</span>
                      @endif <br>
                      </div>
                      <div class="mb-2">
                        <b>Daftar Ulang <span style="padding-left:27px;">:</span></b>
                      @if ($data -> daftar_ulang == 'Sudah Daftar Ulang')
                          <span class="btn-success p-1 rounded">Sudah</span>
                      @else
                          <span class="btn-danger p-1 rounded">Belum</span>
                      @endif <br>
                      </div>
                      <div>
                        <b>MPLS <span style="padding-left:77px;">:</span></b>
                      @if ($data -> status_mpls == 'Sudah Siap')
                          <span class="btn-success p-1 rounded">Sudah</span>
                      @else
                          <span class="btn-danger p-1 rounded">Belum</span>
                      @endif
                      </div>
                    </td>
                    <td width="10%" style="text-align: center">
                        <div style="display: inline;">

                          <a href="edit_data_siswa_id{{ $data->id }}" class="btn btn-info m-1"><i class="fa-regular fa-pen-to-square"></i></i></a>
                          <a href="print_formulir_ppdb_via_admin/{{ $data->id }}" target="_blank" class="btn btn-primary m-1"><i class="fa-solid fa-print"></i></i></a>

                            <button type="button" class="btn btn-warning m-1" data-toggle="modal" data-target="#ubah_password_siswa_id{{ $data->id }}"><i class="fa-solid fa-unlock-keyhole"></i></button>
                          @include('layouts.admin.component.modal_ubah_password_siswa')
                          
                          <a href="hapus_data_ppdb/{{ $data->id }}" class="btn btn-danger konfirmasi m-1"><i class="far fa-trash-alt"></i></a>
                          
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
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      aLengthMenu: [
        [25, 50, 100, 200, -1],
        [25, 50, 100, 200, "All"]
    ]
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