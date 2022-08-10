@extends('layout.template')
@section('header')
<h1><b>Pegawai</b></h1>
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
                <h3 class="card-title"> Form Tambah Data Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="/pegawai/store" novalidate="novalidate"> 
              @csrf
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                          <label>Kode Pegawai</label> 
                          <input type="text" name="kode_pegawai" class="form-control" id="kode_pegawai" placeholder="Kode Pegawai">
                        </div>
                        <div class="form-group">
                          <label>Nama Pegawai</label> 
                          <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Nama Pegawai">
                        </div> 
                        <div class="form-group">
                          <label>TTL</label> 
                          <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="TTL">
                        </div> 
                        <div class="form-group">
                          <label>Jenis Kelamin</label> 
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio1" name="jenkel" value="L">
                            <label for="customRadio1" class="custom-control-label">Laki-Laki</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio2" name="jenkel" value="P" checked="">
                            <label for="customRadio2" class="custom-control-label">Perempuan</label>
                          </div>
                        <br> 
                        <div class="form-group">
                          <label>No HP</label> 
                          <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="No HP">
                        </div> 
                        
                      </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Email</label> 
                          <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                          <label>Alamat</label> 
                          <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
                        </div> 
                        <div class="form-group">
                          <label>Jabatan</label>  
                          <select class="form-control select2bs4" name="id_jabatan" id="id_jabatan" style="width: 100%;">
                            @foreach($selectjabatan as $jabat)
                            <option value="{{ $jabat->id }}" >{{ $jabat->kode_jabatan.'-'.$jabat->nama_jabatan }}</option>
                             
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
      email: {
        required: true,
        email: true,
      }, 
      kode_pegawai:{
        required: true,
        minlength: 3
      },
      nama_lengkap:{
        required: true,
      },
      alamat:{
        required: true
      },
      tempat_lahir:{
        required: true
      },
      no_hp:{
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