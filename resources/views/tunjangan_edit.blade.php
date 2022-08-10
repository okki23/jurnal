@extends('layout.template')
@section('header')
<h1><b>Tunjangan</b></h1>
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
                <h3 class="card-title"> Form Update Data tunjangan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="/tunjangan/update" novalidate="novalidate"> 
              @csrf
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">

                        <div class="form-group"> 
                          <label>Kode tunjangan</label> 
                          <input type="hidden" name="id" value="{{ $listing->id }} ">
                          <input type="text" name="kode_tunjangan" class="form-control" id="kode_tunjangan" value=" {{ $listing->kode_tunjangan }}">
                        </div>
                        <div class="form-group">
                          <label>Nama tunjangan</label> 
                          <input type="text" name="nama_tunjangan" class="form-control" id="nama_tunjangan" value=" {{ $listing->nama_tunjangan }}">
                        </div>   
                        
                      </div>
                    
                    <div class="col-md-6">
                       <div class="form-group"> 
                          <label>Nominal</label>  
                          <input type="text" name="nominal" class="form-control" id="nominal" value=" {{ $listing->nominal }}">
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
      kode_tunjangan:{
        required: true
      },
      nama_tunjangan:{
        required: true
      },
      nominal:{
        required: true,
        number:true
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