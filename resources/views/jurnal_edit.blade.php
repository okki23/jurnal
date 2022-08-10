@extends('layout.template')
@section('header')
<h1><b>Jurnal</b></h1>
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
                <h3 class="card-title"> Form Ubah Data Jurnal</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="/jurnal/update" novalidate="novalidate"> 
              @csrf 
              <div class="card-body">
                  <div class="row"> 
                    <div class="col-md-6">  
                        <div class="form-group">
                          <label>Nomor Jurnal</label> 
                          <input type="text" name="id" id="id" value="{{ $listing->id }}">
                          <input type="text" name="no_jurnal" class="form-control" id="no_jurnal" value=" {{ $listing->no_jurnal }}">
                        </div>
                        <div class="form-group">
                          <label>Tanggal Jurnal</label> 
                          <input type="text" name="tanggal_jurnal" class="form-control" id="tanggal_jurnal" readonly="readonly" value=" {{ $listing->tanggal_jurnal }}">
                        </div> 
                        <div class="form-group">
                          <label>Pengguna</label> 
                          <input type="text" name="nama_pengguna" class="form-control" id="nama_pengguna" readonly="readonly" value="Administrator">
                          <input type="hidden" name="id_pengguna" class="form-control" value="99" readonly="readonly" id="id_pengguna" >
                        </div>  
                        <div class="form-group">
                          <label>Akun</label> 
                          <select class="form-control select2bs4" name="id_akun" id="id_akun" style="width: 100%;">
                            @foreach($selectakun as $akun)
                              @if($akun->id == $listing->id_akun)
                                <option value="{{ $akun->id }}" selected>{{ $akun->kode_akun.'-'.$akun->nama_akun }}</option>   
                              @else
                                <option value="{{ $akun->id }}" >{{ $akun->kode_akun.'-'.$akun->nama_akun }}</option>   
                              @endif 
                              
                            @endforeach
                          </select>
                        </div>  
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Keterangan</label> 
                          <input type="text" name="keterangan" class="form-control" id="keterangan" value=" {{ $listing->keterangan }}">
                        </div>
                        <div class="form-group">
                          <label>Debet</label> 
                          <input type="text" name="debet" class="form-control" id="debet" value=" {{ $listing->debet }}">
                        </div>
                        <div class="form-group">
                          <label>Kredit</label> 
                          <input type="text" name="kredit" class="form-control" id="kredit" value=" {{ $listing->kredit }}">
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
      no_jurnal: {
        required: true, 
      }, 
      keterangan: {
        required: true, 
      }, 
      debet:{
        required: true,
      },
      kredit:{
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