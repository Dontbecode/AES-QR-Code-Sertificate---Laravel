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
            <h4 class="title">Data Nilai TOEFL Mahasiswa</h4>
            <br>
            <div class="col-auto ">
              <label for="Search" class="col-form-label">Cari</label>
            </div>
            <div class="col-auto " style="width: 20%;">
              <form action="{{ route('Nilai') }}" method="GET">
              <input type="search" id="Search"  name="search" class="form-control" aria-describedby="passwordHelpInline" value="{{ request('search') }}">
              </form>
            </div>
        <br>
        <br>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <tr >
                    <th rowspan="2" scope="col"><center>No</center></th>
                    <th rowspan="2" scope="col" hidden>ID</th>
                    <th rowspan="2" scope="col"><center>No Peserta</center></th>
                    <th rowspan="2" scope="col"><center>NIM</center></th>
                    <th rowspan="2" scope="col"><center>Nama</center></th>
                    <th rowspan="2" scope="col"><center>Program Studi</center></th>
                    <th rowspan="2" scope="col"><center>Tanggal</center></th>
                    <th colspan="4" scope="col"><center>Nilai</center></th>
                    <th rowspan="2" scope="col"><center>No Sertifikat</center></th>
                    <th rowspan="2" scope="col"><center>Aksi</center></th>
                </tr>
                <tr>
                    <th scope="col"><center>Listening</center></th>
                    <th scope="col"><center>Structure and Written Expression</center></th>
                    <th scope="col"><center>Reading Comprehension</center></th>
                    <th scope="col"><center>Total Score</center></th>
                </tr>
            </center>
                <tbody>
                    @php
                    $no = 1;
                @endphp
                  @foreach ($dtnilai as $nilai)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $nilai->No_peserta }}</td>
                        <td>{{ $nilai->NIM }}</td>
                        <td>{{ $nilai->Nama_mhs }}</td>
                        <td>{{ $nilai->ProgramStudi }}</td>
                        <td>{{ $nilai->tanggal }}</td>
                        <td> <center>{{ $nilai->Listening }} </center></td>
                        <td> <center>{{ $nilai->Structure }} </center></td>
                        <td> <center>{{ $nilai->Reading }} </center></td>
                        <td> <center>{{ $nilai->Total }} </center></td>
                        <td>{{ $nilai->No_Sertifikat }}</td>
                        <td>
                            <center>
                            <a href="/LengkapiData/{{$nilai->id}}" class="btn btn-info btn-sm btn-fill">Lengkapi data</a>
                            <a href="#" class="btn btn-danger btn-sm btn-fill delete" data-id="{{ $nilai->id }}" data-nama="{{ $nilai->Nama_mhs }}">Hapus</a>  
                            </center>  
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
          window.location = "/DataNilai/"+jenisid+""
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

