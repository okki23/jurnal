@extends('layout.template')
@section('header')
<h1><b>Pengguna</b></h1>
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
                <h3 class="card-title"> Form Tambah Data Pengguna</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="/pengguna/store" novalidate="novalidate"> 
              @csrf
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                          <label>Kode pengguna</label> 
                          <input type="text" name="kode_pengguna" class="form-control" id="kode_pengguna" placeholder="Kode Pengguna">
                        </div>
                        <div class="form-group">
                          <label>Nama pengguna</label> 
                          <input type="text" name="nama_pengguna" class="form-control" id="nama_lengkap" placeholder="Nama Pengguna">
                        </div> 
                        <div class="form-group">
                          <label>Password</label> 
                          <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>     
                    </div> 
                    <div class="col-md-6">
                         <div class="form-group">
                            <label>Hak Akses</label> 
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="customRadio1" name="hak_akses" value="1">
                              <label for="customRadio1" class="custom-control-label">Administrator</label>
                            </div>
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="customRadio2" name="hak_akses" value="2" checked="">
                              <label for="customRadio2" class="custom-control-label">Pemilik</label>
                            </div>
                          </div>
                        
                        <div class="form-group">
                          <label>Pegawai</label>   
                          <select class="form-control select2bs4" name="id_pegawai" id="id_pegawai" style="width: 100%;">
                            @foreach($selectpegawai as $pegawai)
                              <option value="{{ $pegawai->id }}" >{{ $pegawai->kode_pegawai.' - '.$pegawai->nama_lengkap }}</option>                             
                            @endforeach
                          </select>
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
      password: {
        required: true,
        minlength: 3,
      }, 
      kode_pengguna:{
        required: true,
        minlength: 3
      },
      nama_pengguna:{
        required: true,
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