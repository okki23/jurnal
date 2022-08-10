@extends('layout.template')

@section('header')
<h1><b>Jabatan</b></h1>
@endsection
@section('content')  

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <a href="/jabatan/create"  class="btn btn-primary"> <i class="fas fa-plus-square"></i>  Tambah Data </a>
          
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
                <h3 class="card-title">Listing Data jabatan</h3>
              </div>  
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr> 
                    <th>Kode Jabatan</th>
                    <th>Nama Jabatan</th>
                    <th>Gaji Pokok</th>
                    <th>Gaji Lembur</th> 
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($listing as $list)
                    <tr>
                      <td>{{ $list->kode_jabatan }}</td>
                      <td>{{ $list->nama_jabatan }}</td>
                      <td>{{ $list->gaji_pokok }}</td>
                      <td>{{ $list->gaji_lembur }}</td> 
                      <td>
                      <a href="/jabatan/edit/{{ $list->id }}" class="btn btn-warning"> <i class="fas fa-pencil-alt"></i> </a>
                      <a href="/jabatan/destroy/{{ $list->id }}"  class="btn btn-danger"> <i class="fas fa-trash-alt"></i> </a>
                       
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