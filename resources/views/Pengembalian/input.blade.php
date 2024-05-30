{{-- @extends('layout')
@section('konten')

<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1 class="m-0"></h1>
       </div><!-- /.col -->
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="/profil">Profil</a></li>
           <li class="breadcrumb-item active">selanjutnya</li>
         </ol>
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
             
            <h3>Edit Data ruang</h3>
          </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="/inventaris/update" method="POST">
                  @csrf
                  @method('POST')
                  @foreach ($data as $item)
                  <option value="{{ $item['idinventaris'] }}">{{ $item['nama'] }}</option>
                  @endforeach
                   <div class="row mt-1">
                        <div class="col-md-4 mt-1">
                            <label for="">Inventaris</label>
                        </div>
                        <div class="col-md-8 mt-1">
                            <div class="d-flex">
                                <select name="idinventaris" class="form-control" id="idinventaris">
                                    <option value="">-- {{ isset($i_detail) ? $i_detail->nama : 'TwT' }} --</option>
                                    @foreach ($data as $item)
                                    <option value="{{ $item['idinventaris'] }}">{{ $item['nama'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-md-4 mt-1">
                            <label for="">Tanggal Pinjam</label>
                        </div>
                        <div class="col-md-8 mt-1">
                          @foreach ($peminjaman as $dataP)
                          <input type="date" name="tanggalpeminjaman" class="form-control" placeholder="Tanggal Pinjam" value="{{ $dataP->tanggalpeminjaman }}">
                          @endforeach
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4 mt-1">
                            <label for="">Tanggal Kembali</label>
                        </div>
                        <div class="col-md-8 mt-1">
                          @foreach ($peminjaman as $dataK)
                          <input type="date" name="tanggalkembali" class="form-control" placeholder="Tanggal Kembali" value="{{ $dataK->tanggalkembali }}">
                          @endforeach
                        </div>
                    </div>
                   
                    <div class="row mt-1">
                        <div class="col-md-4 mt-1">
                            <label for="">Jumlah Kembali</label>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex">
                                <a href="?idinventaris={{ request('idinventaris') }}&act=min&jumlahkembali={{ $jumlahkembali }}" class="btn btn-primary m-1"><i class="fas fa-minus"></i></a>
                                <input type="number" value="{{ $jumlahkembali }}" class="form-control m-1" name="jumlahkembali">
                                <a href="?idinventaris={{ request('idinventaris') }}&act=plus&jumlahkembali={{ $jumlahkembali }}"  class="btn btn-primary m-1"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-1">
                        <div class="col-md-4 mt-1">
                            <label for="">Status Peminjaman</label>
                        </div>
                        <div class="col-md-8 mt-1">
                            <div class="d-flex">
                                <select class="form-control" id="statuspeminjaman" name="statuspeminjaman" required>
                                    <option value="">-- Kondisi --</option>
                                    <option value="Dipinjam">Masih dipinjam</option>
                                    <option value="Dikembalikan">Sudah dikembalikan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-info mt-3">Simpan Data ruang</button>
                  </div>
              </form>
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

@endsection --}}


@extends('layout')
@section('konten')

<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1 class="m-0"></h1>
       </div><!-- /.col -->
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="/profil">Profil</a></li>
           <li class="breadcrumb-item active">selanjutnya</li>
         </ol>
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
             
            <h3>Edit Data ruang</h3>
          </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="/peminjaman/update" method="POST">
                @csrf
                @method('POST')
                @foreach ($peminjaman as $dataP)
                <input type="hidden" name="idpeminjaman" value="{{ $dataP->idpeminjaman }}">
                   <div class="row mt-1">
                        <div class="col-md-4 mt-1">
                            <label for="">Inventaris</label>
                        </div>
                        <div class="col-md-8 mt-1">
                            <div class="d-flex">
                                <select name="idinventaris" class="form-control" id="idinventaris">
                                    <option value="">-- {{ isset($i_detail) ? $i_detail->nama : 'TwT' }} --</option>
                                    @foreach ($data as $item)
                                    <option value="{{ $item['idinventaris'] }}">{{ $item['nama'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-md-4 mt-1">
                            <label for="">Tanggal Pinjam</label>
                        </div>
                        <div class="col-md-8 mt-1">
                          <input type="date" name="tanggalpeminjaman" class="form-control" placeholder="Tanggal Pinjam" value="{{ $dataP->tanggalpeminjaman }}">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4 mt-1">
                            <label for="">Tanggal Kembali</label>
                        </div>
                        <div class="col-md-8 mt-1">
                          <input type="date" name="tanggalkembali" class="form-control" placeholder="Tanggal Kembali" value="{{ $dataP->tanggalkembali }}">
                        </div>
                    </div>
                   
                    <div class="row mt-1">
                        <div class="col-md-4 mt-1">
                            <label for="">Jumlah Kembali</label>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex">
                                <a href="?idinventaris={{ request('idinventaris') }}&act=min&jumlahkembali={{ $jumlahkembali }}" class="btn btn-primary m-1"><i class="fas fa-minus"></i></a>
                                <input type="number" value="{{ $jumlahkembali }}" class="form-control m-1" name="jumlahkembali">
                                <a href="?idinventaris={{ request('idinventaris') }}&act=plus&jumlahkembali={{ $jumlahkembali }}"  class="btn btn-primary m-1"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-1">
                        <div class="col-md-4 mt-1">
                            <label for="">Status Peminjaman</label>
                        </div>
                        <div class="col-md-8 mt-1">
                            <div class="d-flex">
                                <select class="form-control" id="statuspeminjaman" name="statuspeminjaman" required>
                                    <option value="">-- Kondisi --</option>
                                    <option value="Dipinjam">Masih dipinjam</option>
                                    <option value="Dikembalikan">Sudah dikembalikan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                  @endforeach
                  <div class="form-group">
                      <button type="submit" class="btn btn-info mt-3">Simpan Data ruang</button>
                  </div>
              </form>
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
