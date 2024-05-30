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
           <li class="breadcrumb-item active ml-1">Inventaris</li>
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
              <h2 class="card-title">Data Inventaris</h2>
              <a href="inventaris/create" class="btn btn-info" style="float: right">Tambah</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>No</th>
                 <th>Nama</th>
                 <th>Tanggal Register</th>
                 <th>Kondisi</th>
                 <th>Keterangan</th> 
                 <th>OPSI</th>
                </tr>
                </thead>
                <tbody>
                  
                  @foreach ($data as $d)
                  <tr>
                      <th>{{ $loop->iteration  }}</th>

                      <th>{{ $d->nama}}</th>

                      <th>{{ $d->tanggalregister }}</th>

                      <th>{{ $d->kondisi }}</th>

                       <th>{{ $d->keterangan }}</th> 

                      <th>
                        <a href="/inventaris/show/{{ $d->idinventaris }}" class="btn btn-info">Detail</a>
                        <a href="/inventaris/edit/{{ $d->idinventaris }}" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger" onclick="showConfirmModal('{{ $d->idinventaris }}')">Hapus</a>
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

 <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              Apakah Anda yakin ingin menghapus inventaris ini?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <a id="deleteButton" href="#" class="btn btn-danger">Ya, Hapus</a>
          </div>
      </div>
  </div>
</div>

<script>
  function showConfirmModal(id) {
      $('#deleteButton').attr('href', '/inventaris/hapus/' + id); // Set link pada tombol "Ya, Hapus"
      $('#confirmDeleteModal').modal('show'); // Tampilkan modal konfirmasi
  }
</script>

@endsection