@extends('layout.template')
@section('header')
<h1><b>Potongan</b></h1>
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
                <h3 class="card-title"> Form Tambah Data Potongan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="/potongan/store" novalidate="novalidate"> 
              @csrf
              <div class="card-body">
                  <div class="row">
                    
                    <div class="col-md-6">  
                        <div class="form-group">
                          <label>Kode potongan</label> 
                          <input type="text" name="kode_potongan" class="form-control" id="kode_potongan" placeholder="Kode Potongan">
                        </div>
                        <div class="form-group">
                          <label>Nama potongan</label> 
                          <input type="text" name="nama_potongan" class="form-control" id="nama_potongan" placeholder="Nama Potongan">
                        </div>  
                    </div> 

                    <div class="col-md-6">
                       <div class="form-group">
                          <label>Nominal</label> 
                          <input type="text" name="nominal" class="form-control" id="gaji_pokok" placeholder="Nominal">
                        </div> 
                        
                    </div> 
                  </div> 

                  <div class="card-footer">
                      <button type="submit" class="btn btn-block btn-primary"> <i class="fas fa-save"></i> Simpan </button>
                  </div>
                </form> 
              </div>
    </section>
<script>
  $(function () { 
  $('#quickForm').validate({
    rules: {
      kode_potongan: {
        required: true
      }, 
      nama_potongan:{
        required: true
      },
      nominal:{
        required: true,  
        number: true 
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