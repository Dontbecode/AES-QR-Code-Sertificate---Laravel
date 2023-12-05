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
            <h4 class="title ">Data Admin</h4>
            <a href="{{ route('TambahAdmin') }}" class="d-none mr-4 btn btn-sm btn-primary btn-fill pull-right"><i
                class="pe-7s-add-user fa-lg text-white-50 "></i> Tambah Data</a>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Email</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody>
                @php
                    $no = 1;
                @endphp
                  @foreach ($dtadmin as $admin)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->username }}</td>
                        <td>{{ $admin->nohp }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm btn-fill delete" data-id="{{ $admin->id }}" data-nama="{{ $admin->name }}">Hapus</a>
                            <button type="button" class="btn btn-warning btn-sm btn-fill">Edit</button>
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
          window.location = "/DataAdmin/"+jenisid+""
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

