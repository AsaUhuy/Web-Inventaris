@extends('layout')
@section('konten')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"></h1>
      </div>
      <div class="col-lg-12">
       <div class="card">
         <ol class="breadcrumb float-sm-left m-3">
          <li class="breadcrumb-item ml-1"><a href="/inventaris">Inventaris</a></li>
           <li class="breadcrumb-item active ml-1">Detail Inventaris</li>
         </ol>
       </div>
      </div>
    </div>
  </div>
</div>

 <!-- Main content -->
 <div class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
             
            <h3>Detail Data inventaris</h3>
          </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <form action="/inventaris/show" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="idinventaris"  value="{{ $inventaris->idinventaris ?? '' }}">
                    @if ($inventaris)
                    <div class="form-group">
                        <label for="">Nama Inventaris</label>
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" readonly value="{{ $inventaris->nama ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Kondisi</label>
                      <select class="form-control" id="kondisi" name="kondisi" required readonly>
                          <option value="">-- Kondisi --</option>
                          <option value="Bagus" {{ $inventaris->kondisi == 'Bagus' ? 'selected' : '' }}>Bagus</option>
                          <option value="Buruk" {{ $inventaris->kondisi == 'Buruk' ? 'selected' : '' }}>Buruk</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                      <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" readonly value="{{ $inventaris->keterangan ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                      <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah" readonly value="{{ $inventaris->jumlah ?? '' }}">
                    </div>
                    <div class="form-group">
                    <label for="">Nama Jenis</label>
                    <select name="idjenis" class="form-control" id="" readonly>
                        <option value="">-- Jenis --</option>
                        @foreach ($jenis as $item)
                        <option value="{{ $item->idjenis }}" {{ $item->idjenis == $inventaris->idjenis ? 'selected' : '' }}>{{ $item->namajenis }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Tanggal Register</label>
                        <input type="date" id="tanggalregister" name="tanggalregister" class="form-control" readonly value="{{ $inventaris->tanggalregister ?? '' }}">
                    </div>
                    <div class="form-group">
                    <label for="">Nama Ruang</label>
                    <select name="idruang" class="form-control" id="" readonly>
                        <option value="">-- Ruang --</option>
                        @foreach ($ruang as $item)
                        <option value="{{ $item->idruang }}" {{ $item->idruang == $inventaris->idruang ? 'selected' : '' }}>{{ $item->namaruang }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Kode Inventaris</label>
                      <input type="text" id="kodeinventaris" name="kodeinventaris" class="form-control" readonly placeholder="Kode Inventaris" value="{{ $inventaris->kodeinventaris ?? '' }}">
                    </div>
                    <div class="form-group">
                    <label for="">Nama Petugas</label>
                    <select name="idpetugas" class="form-control" id="" readonly>
                        <option value="">-- Petugas --</option>
                        @foreach ($petugas as $item)
                        <option value="{{ $item->idpetugas }}" {{ $item->idpetugas == $inventaris->idpetugas ? 'selected' : '' }}>{{ $item->namapetugas }}</option>
                        @endforeach
                    </select>
                    </div>
                    @else
                      <p>Inventaris not found.</p>
                    @endif
                  </form>
                </thead>
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
