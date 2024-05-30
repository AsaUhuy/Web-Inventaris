@extends('layout')
@section('konten')
 <div class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-lg-12">
         <div class="card card-primary card-outline">
           <div class="card-body">
               <h3 class="card-title">Walau Hidup Penuh Dengan Permainan Namun Hidupmu Tidak Boleh Dipermainkan</h3>
               <canvas id="myChart" width="400" height="200"></canvas>
               <div class="row">
                 <div class="col-lg-3 col-6">
                   <div class="small-box bg-info">
                     <div class="inner">
                       <h3>{{ $jumlahUserBaru }}</h3>
                       <p>Petugas</p>
                     </div>
                     <div class="icon">
                       <i class="ion ion-bag"></i>
                     </div>
                     <a href="/petugas" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                   </div>
                 </div>
                 <div class="col-lg-3 col-6">
                   <div class="small-box bg-success">
                     <div class="inner">
                       <h3>{{ $jumlahPeminjaman }}</h3>
                       <p>Peminjaman</p>
                     </div>
                     <div class="icon">
                       <i class="ion ion-stats-bars"></i>
                     </div>
                     <a href="/peminjaman/list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                   </div>
                 </div>
                 <div class="col-lg-3 col-6">
                   <div class="small-box bg-yellow">
                     <div class="inner">
                       <h3>{{ $jumlahPegawai }}</h3>
                       <p>Pegawai</p>
                     </div>
                     <div class="icon">
                       <i class="ion ion-bag"></i>
                     </div>
                     <a href="/pegawai" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                   </div>
                 </div>
                 <div class="col-lg-3 col-6">
                   <div class="small-box bg-danger">
                     <div class="inner">
                       <h3>{{ $jumlahInventaris }}</h3>
                       <p>Inventaris</p>
                     </div>
                     <div class="icon">
                       <i class="ion ion-pie-graph"></i>
                     </div>
                     <a href="/inventaris" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                   </div>
                 </div>
               </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>

 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script>
   var ctx = document.getElementById('myChart').getContext('2d');
   var myChart = new Chart(ctx, {
       type: 'bar',
       data: {
           labels: ['Petugas', 'Peminjaman', 'Pegawai', 'Inventaris'],
           datasets: [{
               label: 'Tampilkan Grafik',
               data: [
                   {{ $jumlahUserBaru }},
                   {{ $jumlahPeminjaman }},
                   {{ $jumlahPegawai }},
                   {{ $jumlahInventaris }}
               ],
               backgroundColor: [
                   'rgba(54, 162, 235, 0.2)',
                   'rgba(75, 192, 192, 0.2)',
                   'rgba(255, 206, 86, 0.2)',
                   'rgba(255, 99, 132, 0.2)',
               ],
               borderColor: [
                   'rgba(54, 162, 235, 1)',
                   'rgba(75, 192, 192, 1)',
                   'rgba(255, 206, 86, 1)',
                   'rgba(255, 99, 132, 1)',
               ],
               borderWidth: 1
           }]
       },
       options: {
           scales: {
               y: {
                   beginAtZero: true
               }
           }
       }
   });
 </script>

 @endsection
