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
                <h3 class="card-title"> Form Update Data Akun</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="/akun/update" novalidate="novalidate"> 
              @csrf
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group"> 
                          <label>Kode akun</label> 
                          <input type="hidden" name="id" value="{{ $listing->id }} ">
                          <input type="text" name="kode_akun" class="form-control" id="kode_akun" value=" {{ $listing->kode_akun }}">
                        </div>
                        <div class="form-group">
                          <label>Nama akun</label> 
                          <input type="text" name="nama_akun" class="form-control" id="nama_lengkap" value=" {{ $listing->nama_akun }}">
                        </div> 
                        <div class="form-group">
                          <label>Jenis Akun</label>  
                        <div class="custom-control custom-radio">
                        @if($listing->jenis_akun == 1)
                          <input class="custom-control-input" type="radio" id="customRadio1" name="jenis_akun" value="1" checked>
                          <label for="customRadio1" class="custom-control-label">Harta</label>
                        @else
                          <input class="custom-control-input" type="radio" id="customRadio1" name="jenis_akun" value="1">
                          <label for="customRadio1" class="custom-control-label">Harta</label>
                        @endif
                        </div>
                        <div class="custom-control custom-radio">
                        @if($listing->jenis_akun == 2)
                          <input class="custom-control-input" type="radio" id="customRadio2" name="jenis_akun" value="2" checked>
                          <label for="customRadio2" class="custom-control-label">Biaya</label>
                        @else
                        <input class="custom-control-input" type="radio" id="customRadio2" name="jenis_akun" value="2">
                          <label for="customRadio2" class="custom-control-label">Biaya</label>
                        @endif
                        </div>
                      </div> 
                         
                        
                      </div>
                    </div> 
                    <div class="col-md-6">
                         
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