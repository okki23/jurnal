@extends('layout.template')
@section('header')
<h1><b>Rekap Absen</b></h1>
@endsection
@section('content')  
<section class="content">
      <div class="container-fluid">
        <div class="row"> 
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Form Tambah Data Rekap Absen</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="/rekapabsen/store" novalidate="novalidate"> 
              @csrf 
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                          <label>Kode Rekap Absen</label> 
                          <input type="text" name="kode_rekap" class="form-control" id="kode_rekap" placeholder="Kode Rekap Absen">
                        </div>
                        <div class="form-group">
                          <label>Tanggal Rekap</label> 
                          <input type="text" name="tanggal_rekap" class="form-control" id="tanggal_rekap" readonly="readonly" value="{{ date('Y-m-d') }}">
                        </div> 
                        <div class="form-group">
                          <label>Pengguna</label> 
                          <input type="text" name="nama_pengguna" class="form-control" id="nama_pengguna" readonly="readonly" value="Administrator">
                          <input type="hidden" name="id_pengguna" class="form-control" value="99" readonly="readonly" id="id_pengguna" >
                        </div>  
                        <div class="form-group">
                          <label>Pegawai</label> 
                          <select class="form-control select2bs4" name="id_pegawai" id="id_pegawai" style="width: 100%;">
                            @foreach($selectpegawai as $pegawai)
                              <option value="{{ $pegawai->id }}" >{{ $pegawai->kode_pegawai.'-'.$pegawai->nama_lengkap }}</option>   
                            @endforeach
                          </select>
                        </div>  
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Jumlah Hadir</label> 
                          <input type="text" name="jumlah_hadir" class="form-control" id="jumlah_hadir" placeholder="Jumlah Hadir">
                        </div>
                        <div class="form-group">
                          <label>Jumlah Lembur</label> 
                          <input type="text" name="jumlah_lembur" class="form-control" id="jumlah_lembur" placeholder="Jumlah Lembur">
                        </div>  
                    </div> 
                  </div> 
                <div class="card-footer">
                <button type="submit" class="btn btn-block btn-primary"> <i class="fas fa-save"></i> Simpan </button>
                </div>
              </form> 
    </section>
<script>
  $(function () { 
  $('#quickForm').validate({
    rules: { 
      kode_rekap:{
        required: true, 
      }, 
      jumlah_hadir:{
        required: true
      },
      jumlah_lembur:{
        required: true
      }
    }, 
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
$('.select2').select2();
</script>
@endsection