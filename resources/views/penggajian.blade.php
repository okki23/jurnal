@extends('layout.template')

@section('header')
<h1><b>Penggajian</b></h1>
@endsection
@section('content')  

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <a href="/penggajian/create"  class="btn btn-primary"> <i class="fas fa-plus-square"></i>  Tambah Data </a>
          
          <br>
          &nbsp;&nbsp;
          @if(session('pesan'))
              <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  {{ session('pesan') }}
                </div>
           
          @endif
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Listing Data penggajian</h3>
              </div>  
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No Slip Gaji</th>
                    <th>Tanggal Slip</th>
                     
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody> 
                    @foreach($listing as $list)
                    <tr>
                      <td>{{ $list->no_slip }}</td>
                      <td>{{ $list->tanggal_slip }}</td>                     
                      <td>
                      <a href="/penggajian/detail/{{ $list->id }}" class="btn btn-info"> <i class="fas fa-file-alt"></i> </a>
                      <a href="/penggajian/print/{{ $list->id }}" class="btn btn-info"> <i class="fas fa-print"></i> </a>
                      <a href="/penggajian/edit/{{ $list->id }}" class="btn btn-warning"> <i class="fas fa-pencil-alt"></i> </a>
                      <a href="/penggajian/destroy/{{ $list->id }}"  class="btn btn-danger"> <i class="fas fa-trash-alt"></i> </a>
                       
                      </td>
                    </tr>
                    @endforeach 
                  </tbody> 
                </table>
              </div> 
            </div>  
          </div> 
        </div> 
      </div> 
    </section> 
   
@endsection