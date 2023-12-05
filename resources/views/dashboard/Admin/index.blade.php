@extends('dashboard.Admin.layouts.main')

@section('container')

<div id="data-summary">
    <div id="data-item">
    <center>
      <h3>Jumlah Mahasiswa Terdaftar</h3>
      <p>{{ $cek }}</p>
    </center>
    </div>
    <div id="data-item1">
    <center>
      <h3>Jumlah Yang Telah Mengikuti Tes</h3>
      <p>{{ $cek1 }}</p>
    </center>
    </div>
    <div id="data-item2">
    <center>
      <h3>Jumlah Sertifikat </h3>
      <p>{{ $cek2 }}</p>
    <center>
    </div>
</div>
@endsection

