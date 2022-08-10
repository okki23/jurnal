@extends('layout.template')
@section('header')
<h1><b>Akun</b></h1>
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
                <h3 class="card-title"> Form Tambah Data Akun</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="/akun/store" novalidate="novalidate"> 
              @csrf
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                          <label>Kode Akun</label> 
                          <input type="text" name="kode_akun" class="form-control" id="kode_akun" placeholder="Kode Akun">
                        </div>
                        <div class="form-group">
                          <label>Nama Akun</label> 
                          <input type="text" name="nama_akun" class="form-control" id="nama_akun" placeholder="Nama Akun">
                        </div> 
                     
                        
                      </div>
                    </div> 
                    <div class="col-md-6"> 
                      <div class="form-group">
                          <label>Jenis Akun</label> 
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio1" name="jenis_akun" value="1">
                          <label for="customRadio1" class="custom-control-label">Harta</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio2" name="jenis_akun" value="2" checked="">
                          <label for="customRadio2" class="custom-control-label">Biaya</label>
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
      kode_akun: {
        required: true, 
      },  
      nama_akun:{
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