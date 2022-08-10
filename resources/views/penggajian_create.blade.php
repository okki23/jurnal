@extends('layout.template')
@section('header')
<h1><b>Penggajian</b></h1>
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
                <h3 class="card-title"> Form Tambah Data Penggajian</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="/penggajian/store" novalidate="novalidate"> 
              @csrf
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                          <label>No Slip</label> 
                          <input type="text" name="no_slip" class="form-control" id="no_slip" placeholder="No Slip">
                        </div>
                        <div class="form-group">
                          <label>Tanggal Slip</label> 
                          <input type="text" name="tanggal_slip" class="form-control" id="tanggal_slip" readonly="readonly" value="{{ date('Y-m-d') }}">
                        </div> 
                        <div class="form-group">
                          <label>Pengguna</label> 
                          <input type="text" name="nama_pengguna" class="form-control" id="nama_pengguna" readonly="readonly" value="Administrator">
                          <input type="hidden" name="id_pengguna" class="form-control" value="99" readonly="readonly" id="id_pengguna" >
                        </div>  
                        <div class="form-group">
                          <label>No Rekap</label>  
                          <select class="form-control select2bs4" name="no_rekap" id="no_rekap" style="width: 100%;">
                            @foreach($selectrekap as $rekap)
                            <option value="{{ $rekap->kode_rekap }}" >{{ $rekap->kode_rekap }}</option> 
                            @endforeach
                          </select>
                        </div>   
                         
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Tunjangan</label>  
                          <select class="form-control select2bs4" name="id_tunjangan" id="id_tunjangan" style="width: 100%;">
                            @foreach($selecttunjangan as $tj)
                            <option value="{{ $tj->id }}" >{{ $tj->kode_tunjangan. ' - ' .$tj->nama_tunjangan }}</option> 
                            @endforeach
                          </select>
                        </div>   
                        <div class="form-group">
                          <label>Potongan</label>  
                          <select class="form-control select2bs4" name="id_potongan" id="id_potongan" style="width: 100%;">
                            @foreach($selectpotongan as $pt)
                            <option value="{{ $pt->id }}" >{{ $pt->kode_potongan. ' - ' .$pt->nama_potongan }}</option> 
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
      kode_penggajian:{
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