@extends('dashboard.Admin.layouts.main')


@section('container')
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Tambah Data Admin</h4>
            <br>
        </div>
        <form action="{{ route('AddAdmin') }}" method="post">
            @csrf
              <div class="cf-cover">
                <div class="form-floating mb-2">
                  <div class="col-md-12">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control rounded-top @error('name')is-invalid @enderror" id="name"  placeholder="Masukan Nama Lengkap" required value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="form-floating mb-2">
                  <div class="col-md-12">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control rounded-top @error('username')is-invalid @enderror" id="username" placeholder="Masukan Username" required value="{{ old('username') }}">
                    @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
               <div class="form-floating mb-2">
                <div class="col-md-12">
                  <label for="nohp">No Telepon</label>
                  <input type="text" name="nohp" class="form-control rounded-top @error('nohp')is-invalid @enderror" id="nohp" placeholder="No Telepon" required value="{{ old('nohp') }}">
                  @error('nohp')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="form-floating mb-2">
                  <div class="col-md-12">
                    <label for="email">Alamat Email</label>
                    <input type="email" name="email" class="form-control rounded-top @error('email')is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
              </div>
                <div class="form-floating mb-2">
                  <div class="col-md-12">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control rounded-top @error('password')is-invalid @enderror" id="password" placeholder="Password" required>
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
               <div class="form-row  row" style="margin-top: 20px; margin-right:1px; ">
                    <div class="col-md-12">
                    <button class="btn btn-primary btn-sm btn-fill pull-right" type="submit">Tambah Data</button>
                    </div>
               </div>
                  <br>
             </div>
           </form>
    </div>
</div>
@endsection
