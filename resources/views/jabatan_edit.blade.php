@extends('layout.template')
@section('header')
<h1><b>Jabatan</b></h1>
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
                <h3 class="card-title"> Form Update Data Jabatan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="/jabatan/update" novalidate="novalidate"> 
              @csrf
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">

                        <div class="form-group"> 
                          <label>Kode Jabatan</label> 
                          <input type="hidden" name="id" value="{{ $listing->id }} ">
                          <input type="text" name="kode_jabatan" class="form-control" id="kode_jabatan" value=" {{ $listing->kode_jabatan }}">
                        </div>
                        <div class="form-group">
                          <label>Nama Jabatan</label> 
                          <input type="text" name="nama_jabatan" class="form-control" id="nama_jabatan" value=" {{ $listing->nama_jabatan }}">
                        </div>   
                        
                      </div>
                    </div> 
                    <div class="col-md-6">
                       <div class="form-group"> 
                          <label>Gaji Pokok</label>  
                          <input type="text" name="gaji_pokok" class="form-control" id="gaji_pokok" value=" {{ $listing->gaji_pokok }}">
                        </div>
                        <div class="form-group">
                          <label>Gaji Lembur</label> 
                          <input type="text" name="gaji_lembur" class="form-control" id="gaji_lembur" value=" {{ $listing->gaji_lembur }}">
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
      kode_jabatan:{
        required: true,
        minlength: 3
      },
      nama_jabatan:{
        required: true
      },
      gaji_pokok:{
        required: true
      },
      gaji_lembur:{
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