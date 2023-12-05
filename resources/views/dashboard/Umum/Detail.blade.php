@extends('dashboard.Umum.layouts.main')

@section('container')
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="content-center brand">
      <h1 class="h1-seo">Detail Data Sertifikat</h1>
       
        <center>              
              <div class="col-md-12">
                <div class="hero-images-container-3">
                    <div class="card">
                            <div class="p-5">
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th scope="col">No Sertifikat</th>
                                            <th scope="col">No Peserta</th>
                                            <th scope="col">NIM</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Jenis Kelamin</th>
                                            <th scope="col">Program Studi</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Listening</th>
                                            <th scope="col">Structure</th>
                                            <th scope="col">Reading</th>
                                            <th scope="col">Total Score</th>
                                           
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $Event1->No_peserta }}</td>
                                                <td>{{ $Event1->No_Sertifikat }}</td>
                                                <td>{{ $Event1->NIM }}</td>
                                                <td>{{ $Event1->Nama_mhs }}</td>
                                                <td>{{ $Event1->J_Kelamin }}</td>
                                                <td>{{ $Event1->ProgramStudi }}</td>
                                                <td>{{ $Event1->email }}</td>
                                                <td>{{ $Event1->tanggal }}</td>
                                                <td>{{ $Event1->Listening }}</td>
                                                <td>{{ $Event1->Structure }}</td>
                                                <td>{{ $Event1->Reading }}</td>
                                                <td>{{ $Event1->Total }}</td>
                                
                                                
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                        
                                </div>
                                <a class="btn btn-primary  btn-sm btn-fill" href="/" role="button" style="float: right;" >Kembali</a>
                            </div>
                     </div>   
                    </div>
                </center>          
     
    </div>
  </div>


<!-- Content -->
@endsection
@section('isi')

    
@endsection