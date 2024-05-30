@extends('layout')
@section('konten')

<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1 class="m-0"></h1>
       </div><!-- /.col -->
       <div class="col-lg-12">
        <div class="card">
          <ol class="breadcrumb float-sm-left m-3">
            <li class="breadcrumb-item active ml-1">List Peminjaman</li>
          </ol>
        </div>
       </div><!-- /.col -->
     </div><!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <!-- Main content -->
 <div class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
              <h2 class="card-title">List Data Peminjaman</h2>
              <a href="/peminjaman/create" class="btn btn-info" style="float: right">Tambah</a>
              @if(auth()->user()->idlevel == 1 || auth()->user()->idlevel == 3)
              <a href="/peminjaman/tampilpdf" class="btn btn-success mr-1" style="float: right"><i class="nav-icon fas fa-print mr-1"></i>Print</a>
              @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>No</th>
                 <th>Nama Inventaris</th>
                 <th>Tanggal Pinjam</th>
                 <th>Tanggal Kembali</th>
                 <th>Status</th>
                 <th>OPSI</th>
                </tr>
                </thead>
                <tbody>
                  
                  @foreach ($data as $d)
                  <tr>
                      <th>{{ $loop->iteration  }}</th>

                      <th>{{ $d->nama }}</th>

                      <th>{{ $d->tanggalpeminjaman }}</th>

                      <th>{{ $d->tanggalkembali }}</th>

                      <th>{{ $d->statuspeminjaman }}</th>

                      <th>
                        
                        <a href="/peminjaman/show/{{ $d->idpeminjaman }}"class="btn btn-info">Detail</a>
                        @if($d->statuspeminjaman === 'Dipinjam' && $d->tanggalpeminjaman !== null)
                        <a href="/peminjaman/pkembali/{{ $d->idpeminjaman }}" class="btn btn-success">Kembalikan</a>
                        @endif
                        <a href="/peminjaman/edit/{{ $d->idpeminjaman }}" class="btn btn-warning">Edit</a>
                        <a href="/peminjaman/hapus/{{ $d->idpeminjaman }}" class="btn btn-danger">Hapus</a>
                      </th>

                  </tr>
                  @endforeach
                 
                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
       </div>
       <!-- /.col-md-6 -->
   
       <!-- /.col-md-6 -->
     </div>
     <!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>

@endsection