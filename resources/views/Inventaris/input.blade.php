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
           <li class="breadcrumb-item active ml-1">Tambah Invevntaris</li>
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
       <div class="col-md-6">
         <div class="card">
           <div class="card-header">
              <h3>Tambah Data Inventaris</h3>
           </div>
           <div class="card-body">
             <form action="store" method="POST">
               @csrf
               @method('POST')
               <div class="form-group">
                 <label for="nama">Nama:</label>
                 <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
               </div>
               <div class="form-group">
                 <label for="kondisi">Kondisi:</label>
                 <select class="form-control" id="kondisi" name="kondisi" required>
                     <option value="">-- Kondisi --</option>
                     <option value="Bagus">Bagus</option>
                     <option value="Buruk">Buruk</option>
                 </select>
               </div>
               <div class="form-group">
                 <label for="keterangan">Keterangan:</label>
                 <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan">
               </div>
               <div class="form-group">
                 <label for="jumlah">Jumlah:</label>
                 <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah">
               </div>
               <div class="form-group">
                 <label for="idjenis">Jenis:</label>
                 <select name="idjenis" class="form-control" id="">
                   <option value="">-- Jenis --</option>
                   @foreach ($jenis as $item)
                   <option value="{{ $item['idjenis'] }}">{{ $item['namajenis'] }}</option>
                   @endforeach
                 </select>
               </div>
               <div class="form-group mt-3">
                 <label for="tanggalregister">Tanggal Register:</label>
                 <input type="date" id="tanggalregister" name="tanggalregister" class="form-control">
               </div>
           </div>
         </div>
       </div>
       <div class="col-md-6">
         <div class="card">
           <div class="card-body">
             <div class="form-group">
               <label for="idruang">Ruang:</label>
               <select name="idruang" class="form-control" id="">
                 <option value="">-- Ruang --</option>
                 @foreach ($ruang as $item)
                 <option value="{{ $item['idruang'] }}">{{ $item['namaruang'] }}</option>
                 @endforeach
               </select>
             </div>
             <div class="form-group">
               <label for="kodeinventaris">Kode Inventaris:</label>
               <input type="text" id="kodeinventaris" name="kodeinventaris" class="form-control" placeholder="Kode Inventaris">
             </div>
             <div class="form-group">
               <label for="idpetugas">Petugas:</label>
               <select name="idpetugas" class="form-control" id="">
                   <option value="">-- Petugas --</option>
                   @foreach ($petugas as $item)
                   <option value="{{ $item['idpetugas'] }}">{{ $item['namapetugas'] }}</option>
                   @endforeach
               </select>
             </div>
             <div class="form-group mt-3">
               <button type="submit" class="btn btn-info mt-3">Simpan Data Inventaris</button>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div><!-- /.container-fluid -->
 </div>

@endsection
