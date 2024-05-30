@extends('layout')

@section('konten')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Konfirmasi Penghapusan</div>

                    <div class="card-body">
                        <p>{{ session('confirmation') }}</p>
                        <form action="{{ route('pegawai.delete', ['id' => $pegawai->idpegawai]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                            <a href="{{ url('/pegawai') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection