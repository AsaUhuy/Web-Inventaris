{{-- @extends('layout')
@section('konten')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tampilan PDF</title>
  <link rel="stylesheet" href="{{ asset("asset/plugins/fontawesome-free/css/all.min.css") }}">
  <link rel="stylesheet" href="{{ asset("asset/dist/css/adminlte.min.css") }}">
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      background-color: #fff; /* Background putih */
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      display: flex; /* Allow for logo and report title positioning */
      align-items: center; /* Align logo and title vertically */
      flex-direction: column; /* Align logo and title horizontally */
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f2f2f2;
    }

    /* Optional: Set table header background color */
    th {
      background-color: #f2f2f2; /* Adjust as desired */
    }

    /* CSS untuk mencetak tanggal ketika halaman dicetak */
    @media print {
      .info {
        display: block !important;
      }
    }

    /* Octagram Theme */
    header {
      background-color: #2d3436; /* Warna hitam */
      color: #343232; /* Teks putih */
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 20px;
      width: 100%;
    }

    footer {
      background-color: #3498db; /* Warna biru */
      color: #ffffff; /* Teks putih */
      padding: 15px;
      text-align: center;
      position: fixed;
      bottom: 0;
      width: 100%;
      border-radius: 8px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Laporan Peminjaman</h1>
    <div class="info">
      @if(Auth::check())
        <p class="d-block">Pelapor: {{ Auth::user()->namapetugas }}</p>
        <p class="d-block" id="tanggal">Tanggal: {{ now()->format('Y-m-d') }} </p>
      @endif
    </div>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Inventaris</th>
          <th>Tanggal Pinjam</th>
          <th>Tanggal Kembali</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($peminjaman as $index => $p)
        <tr>
          <td>{{ $index + 1 }}</td>
          <th>{{ $p->nama }}</th>
          <td>{{ $p->tanggalpeminjaman }}</td>
          <td>{{ $p->tanggalkembali }}</td>
          <td>{{ $p->statuspeminjaman }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</body>
</html>

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
       <div class="col-lg-12">
        <div class="card">
          <ol class="breadcrumb float-sm-left m-3">
            <li class="breadcrumb-item active ml-1">Laporan Peminjaman</li>
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
               <h2 class="card-title">Laporan Data Peminjaman</h2>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
              @if(auth()->user()->idlevel == 1 || auth()->user()->idlevel == 3)
              <div class="row mb-2">
                  <div class="col-md-6">
                      <select id="dateOption" class="form-control">
                          <option value="single">Satu Tanggal</option>
                          <option value="range">Rentang Tanggal</option>
                      </select>
                  </div>
              </div>
              <div id="singleDateInput" style="display: none;">
                  <div class="row mb-2">
                      <div class="col-md-6">
                          <label for="tanggalPrint">Pilih Tanggal:</label>
                          <input type="date" id="tanggalPrint" class="form-control">
                      </div>
                      <div class="col-md-12 text-right">
                        <button class="btn btn-success" id="btnTampilkan">Tampilkan</button> 
                        <button class="btn btn-success" id="btnPrintSingle">Print</button>
                    </div>
                  </div>
              </div>
              <div id="rangeDateInput" style="display: none;">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="start_date">Tanggal Mulai:</label>
                        <input type="date" id="start_date" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="end_date">Tanggal Selesai:</label>
                        <input type="date" id="end_date" class="form-control">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-success" id="btnTampilkanRange">Tampilkan</button> <!-- Tombol Tampilkan untuk RangeDateInput -->
                        <button class="btn btn-success" id="btnPrintRange">Print</button>
                    </div>
                </div>
            </div>
            @endif
          </div>
            <!-- /.card-header -->
            <div class="card-body">
              
                <div class="container">
                    <h1 class="text-center">Laporan Peminjaman</h1>
                    <div class="info">
                      @if(Auth::check())
                        <p class="d-block">Pelapor: {{ Auth::user()->namapetugas }}</p>
                        <p class="d-block" id="tanggal">Tanggal: {{ now()->format('Y-m-d') }} </p>
                      @endif
                    </div>
                </div>

              <table id="dataPeminjaman" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>No</th>
                 <th>Nama Inventaris</th>
                 <th>Tanggal Pinjam</th>
                 <th>Tanggal Kembali</th>
                 <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $d)
                      <tr>
                          <td>{{ $loop->iteration  }}</td>
                          <td>{{ $d->nama_inventaris }}</td>
                          <td>{{ $d->tanggalpeminjaman }}</td>
                          <td>{{ $d->tanggalkembali }}</td>
                          <td>{{ $d->statuspeminjaman }}</td>
                      </tr>
                    @endforeach
                    <script>
                      document.getElementById('dateOption').addEventListener('change', function() {
                          var option = this.value;
                          if (option === 'single') {
                              document.getElementById('singleDateInput').style.display = 'block';
                              document.getElementById('rangeDateInput').style.display = 'none';
                          } else if (option === 'range') {
                              document.getElementById('singleDateInput').style.display = 'none';
                              document.getElementById('rangeDateInput').style.display = 'block';
                          }
                      });
                  
                      document.getElementById('btnPrintSingle').addEventListener('click', function() {
                          var selectedDate = document.getElementById('tanggalPrint').value;
                          var printUrl = "/pdfpeminjaman1?tanggal=" + selectedDate;
                          window.location.href = printUrl;
                      });
                  
                      document.getElementById('btnPrintRange').addEventListener('click', function() {
                          var startDate = document.getElementById('start_date').value;
                          var endDate = document.getElementById('end_date').value;
                          var printUrl = "/pdfpeminjaman?start_date=" + startDate + "&end_date=" + endDate;
                          window.location.href = printUrl;
                      });

                      document.getElementById('btnTampilkan').addEventListener('click', function() { 
                      var selectedDate = document.getElementById('tanggalPrint').value;
                      var printUrl = "/peminjaman/tampilpdf?tanggal=" + selectedDate;
                      window.location.href = printUrl; 
                      });

                      document.getElementById('btnTampilkanRange').addEventListener('click', function() { 
                      var startDate = document.getElementById('start_date').value;
                      var endDate = document.getElementById('end_date').value;
                      var printUrl = "/peminjaman/tampilpdf?start_date=" + startDate + "&end_date=" + endDate; 
                      window.location.href = printUrl;
                      });
                  </script>
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
