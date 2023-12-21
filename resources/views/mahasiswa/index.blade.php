<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body> 
    
    <div class="container mt-5">
        <h1 class="text-center mb-5">Data Mahasiswa yang Berhasil Bekerjasama</h1>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session ('success')}}
            </div>

            @endif
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>NO</th>
                        <th>NIM</th>
                        <th>NAMA</th>
                        <th>JURUSAN</th>
                        <th>AKSI</th>
                    </thead>
                    <tbody>
                        @if ($mahasiswa->count() > 0)
                        @foreach ($mahasiswa as $no => $hasil)
                        <tr>
                        <input type="hidden" class="delete_id" value="{{ $hasil->id }}">
                        <input type="hidden" class="nama" value="{{ $hasil->nama }}">
                        <th>{{ $no+1 }}</th>
                        <td>{{ $hasil->nim}}</td>
                        <td>{{ $hasil->nama}}</td>
                        <td>{{ $hasil->jurusan}}</td>
                        <td>
                           <form action="{{ route('mahasiswa.destroy', $hasil->id) }}" method="POST">
                            @csrf
                            @method('delete')
                           <a href="{{ route('mahasiswa.edit', $hasil->id) }}" class="btn btn-success btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm btndelete">Hapus</button>
                           </form>
                        </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="10" align="center">Tidak Ada Data</td>
                        </tr>
                        @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    @include('sweetalert::alert')
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.btndelete').click(function (e) {
            e.preventDefault();

            var deleteid = $(this).closest("tr").find('.delete_id').val();
            var name = $(this).closest("tr").find('.nama').val();
            swal({
                    title: "Apakah anda yakin?",
                    text: "Setelah dihapus, Anda tidak dapat memulihkan " + name + " ini lagi!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        var data = {
                            "_token": $('input[name=_token]').val(),
                            'id': deleteid,
                        };
                        $.ajax({
                            type: "DELETE",
                            url: 'mahasiswa/' + deleteid,
                            data: data,
                            success: function (response) {
                                swal(response.status, {
                                        icon: "success",
                                    })
                                    .then((result) => {
                                        location.reload();
                                    });
                            }
                        });
                    }
                });
        });

    });

</script>
</body>
</html>