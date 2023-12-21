<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DATA MAHASISWA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container mt-5">
        <h1 class="text-center mb-5">Form Edit Data Mahasiswa</h1>

        <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary mb-3"><i class="bi bi-arrow-left"></i> Mahasiswa</a>

        <div class="card">
            <div class="card-body">
            <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                @csrf
                @method('patch')
                
                <div class="mb-3">
                 <label for="nim" class="form-label">NIM</label>
                  <input type="text" class="form-control" name="nim" value="{{ $mahasiswa->nim }}" id="nim" >
                  </div>
                 <div class="mb-3">
                  <label for="nama" class="form-label">NAMA</label>
                      <input type="text" class="form-control" name="nama" value="{{ $mahasiswa->nama }}" id="nama" >
                  </div>
             <div class="mb-3">
                <label for="jurusan" class="form-label">JURUSAN</label>
             <input type="text" class="form-control" name="jurusan" value="{{ $mahasiswa->jurusan }}" id="jurusan" >
            </div>

            <button type="submit" class="btn btn-primary mt-5 float-end">Edit</button>
            </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>