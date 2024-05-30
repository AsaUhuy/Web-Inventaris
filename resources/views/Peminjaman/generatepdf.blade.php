{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset("asset/plugins/fontawesome-free/css/all.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("asset/dist/css/adminlte.min.css") }}">
</head>
<body>
    <div class="card-body">
              
        <table id="example2" class="table table-bordered table-striped">
          <thead>
          <tr>
           <th>No</th>
           <th>Tanggal Pinjam</th>
           <th>Tanggal Kembali</th>
           <th>Status</th>
          </tr>
          </thead>
          <tbody>
            
            @foreach ($data as $d)
            <tr>
                <th>{{ $loop->iteration  }}</th>

                <th>{{ $d->tanggalpeminjaman }}</th>

                <th>{{ $d->tanggalkembali }}</th>

                <th>{{ $d->statuspeminjaman }}</th>

            </tr>
            @endforeach
           
          </tbody>

        </table>
      </div>
</body>
</html> --}}
{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset("asset/plugins/fontawesome-free/css/all.min.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("asset/dist/css/adminlte.min.css") }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="info">
            @if(Auth::check())
                <p class="d-block">Pelapor: {{ Auth::user()->namapetugas }}</p>
            @endif
          </div>
        <h1>{{ $title }}</h1>
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
</html> --}}

{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>
  <link rel="stylesheet" href="{{ asset("asset/plugins/fontawesome-free/css/all.min.css") }}">
  <link rel="stylesheet" href="{{ asset("asset/dist/css/adminlte.min.css") }}">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f6f9;
      padding: 20px;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      display: flex; /* Allow for logo and report title positioning */
      align-items: center; /* Align logo and title vertically */
    }

    .logo {
      flex: 0 0 auto; /* Allow logo to shrink to fit */
      margin-right: 20px; /* Add spacing between logo and title */
      width: 100px; /* Adjust logo size as needed */
      height: auto;
    }

    h1 {
      flex: 1; /* Make report title fill remaining space */
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
  </style>
</head>
<body>
  <div class="container">
    <img src="/public/asset/dist/img/har.png" alt="Report Logo" class="logo">  <h1>{{ $title }}</h1>

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
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>
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
    <h1>{{ $title }}</h1>
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
          <th>{{ $p->nama_inventaris }}</th>
          <td>{{ $p->tanggalpeminjaman }}</td>
          <td>{{ $p->tanggalkembali }}</td>
          <td>{{ $p->statuspeminjaman }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <footer>
    <p>&copy; 2024 Asavan. All rights reserved.</p>
  </footer>
</body>
</html>
