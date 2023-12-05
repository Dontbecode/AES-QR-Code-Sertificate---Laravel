@extends('dashboard.Admin.layouts.main')


@section('container')
<div class="row center" >
    <div class="col-md-4">
  @if(session()->has('success'))
    <div class="alert alert-success " role="alert">
      {{ session('success') }}
    </div>
  @endif
    </div>
</div>
    <script>
        window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
          });
        }, 2000);
    </script>
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Data Sertifikat TOEFL</h4>
            <br>
            <div class="col-auto ">
              <label for="Search" class="col-form-label">Cari</label>
            </div>

            <div class="col-auto " style="width: 20%;">
                <form action="{{ route('DataSertifikat') }}" method="GET">
                <input type="search" id="Search"  name="search" class="form-control" aria-describedby="passwordHelpInline" value="{{ request('search') }}">
                </form>
              </div>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                    <th scope="col">No</th>
                    <th scope="col" hidden>ID</th>
                    <th scope="col" hidden>ID Sertifikat
                        
                    </th>
                    <th scope="col">No Sertifikat</th>
                    <th scope="col">No Peserta</th>
                    <th scope="col">Nama</th>
                    <th scope="col">QR Code</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody>
                @php
                    $no = 1;
                @endphp
                  @foreach ($dtcetak as $cetak)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $cetak->No_Sertifikat }}</td>
                        <td>{{ $cetak->No_peserta }}</td>
                        <td>{{ $cetak->Nama_mhs }}</td>
                        <td>{!! QrCode::size(150)->generate($cetak->Kode_Enkripsi); !!}</td>
                        <td>
                            <a href="/Cetak/{{$cetak->id}}" class="btn btn-primary btn-sm btn-fill" >Cetak Sertifikat</a>
                            <a href="/Detail/{{$cetak->id}}" class="btn btn-primary btn-sm btn-fill" >Lihat Detail</a>
                            <a href="#" class="btn btn-danger btn-sm btn-fill delete" data-id="{{ $cetak->id }}" data-nama="{{ $cetak->Nama_mhs }}">Hapus</a>
                           
                          </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
<script >
  $('.delete').click( function(){
    var jenisid = $(this).attr('data-id');
    var jenisnama = $(this).attr('data-nama');
    Swal.fire({
        title: 'Apa Kamu Yakin?',
        text: "Data "+jenisnama+" akan di hapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = "/DataSertifikat/"+jenisid+""
          Swal.fire(
            'Deleted!',
            'Data berhasil di hapus.',
            'success'
          )
        }else {
          Swal.fire(
            'Cancelled',
            'Data tidak jadi di hapus.',
            'error'
          )
        }
      });
  });

</script>
@endsection

