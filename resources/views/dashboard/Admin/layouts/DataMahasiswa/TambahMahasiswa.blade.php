@extends('dashboard.Admin.layouts.main')


@section('container')
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Tambah Data Mahasiswa</h4>
            <br>
        </div>
        <form action="{{ route('AddMahasiswa') }}" method="post">
            @csrf
              <div class="cf-cover">
                <div class="form-floating mb-2">
                    <div class="col-md-12">
                      <label for="No_pesera">No Peserta</label>
                      <input type="text" name="No_peserta" class="form-control rounded-top @error('No_peserta')is-invalid @enderror" id="No_peserta"  placeholder="Masukan No Peserta" required value="{{ $nomor }}" readonly>
                      @error('No_peserta')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                </div>
                <div class="form-floating mb-2">
                    <div class="col-md-12">
                      <label for="NIM">NIM Mahasiswa</label>
                      <input type="text" name="NIM" class="form-control rounded-top @error('NIM')is-invalid @enderror" id="NIM"   placeholder="Masukan NIM" required value="{{ old('NIM') }}">
                      @error('NIM')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                </div>
                <div class="form-floating mb-2">
                    <div class="col-md-12">
                      <label for="Nama_mhs">Nama Lengkap</label>
                      <input type="text" name="Nama_mhs" class="form-control rounded-top @error('Nama_peserta')is-invalid @enderror" id="Nama_peserta"  pattern="^[a-zA-Z\s'-/,.]{1,100}$" placeholder="Masukan Nama Lengkap" required value="{{ old('Nama_peserta') }}">
                      @error('Nama_mhs')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                </div>
                <div class="form-floating mb-2">
                    <div class="col-md-12">
                      <label for="J_Kelamin">Pilih Jenis Kelamin</label>
                      <select  name="J_Kelamin" class="form-control custom-select @error('J_Kelamin')is-invalid @enderror" id="J_Kelamin"  placeholder="Masukan Jenis Kelamin" required ">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                        {{-- <option value="">Select Country</option>
                        @foreach($countries as $country)
                          <option value="{{ $country->id }}" @if($country->id == $user->country) selected @endif>{{ $country->name }}</option>
                        @endforeach
                       --}}
                      </select>
                      @error('J_Kelamin')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                </div>
                <div class="form-floating mb-2">
                  <div class="col-md-12">
                    <label for="ProgramStudi">Program Studi</label>
                    <select name="ProgramStudi" class="form-control rounded-top @error('ProgramStudi') is-invalid @enderror" id="ProgramStudi" required>
                      <option value="">Pilih Program Studi</option>
                      <option value="Pendidikan Teknologi Informasi dan Komunikasi (PTIK)">Pendidikan Teknologi Informasi dan Komunikasi (PTIK)</option>
                      <option value="Pendidikan Jasmani Kesehatan dan Rekreasi (PJKR)">Pendidikan Jasmani Kesehatan dan Rekreasi (PJKR)</option>
                      <option value="Pendidikan Matematika (PMTK)">Pendidikan Matematika (PMTK)</option>
                      <option value="Pendidikan Guru Pendidikan Anak Usia Dini (PG-PAUD)">Pendidikan Guru Pendidikan Anak Usia Dini (PG-PAUD)</option>
                      <option value="Pendidikan Guru Sekolah Dasar (PGSD)">Pendidikan Guru Sekolah Dasar (PGSD)</option>
                    </select>
                    @error('ProgramStudi')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                
                  <?php $years = range(1900, strftime("%Y", time())); ?>
                <div class="form-floating mb-2">
                    <div class="col-md-12">
                      <label for="Angkatan">Angkatan</label>
                      <select  name="Angkatan" class="form-control custom-select @error('Angkatan')is-invalid @enderror" id="Angkatan"  required ">
                        @php
                            $tahunSekarang = date('Y');
                            $tahunMulai = $tahunSekarang - 10;
                        @endphp
       
                        <option value="">Pilih Tahun Angkatan</option>
                        @for ($Angkatan = $tahunSekarang; $Angkatan >= $tahunMulai; $Angkatan--)
                        <option value="{{ $Angkatan }}">{{ $Angkatan }}</option>
                        @endfor
                      </select>
                      @error('Angkatan')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                </div>
                <div class="form-floating mb-2">
                    <div class="col-md-12">
                      <label for="No_tlpn">No Telepon</label>
                      <input type="text" name="No_tlpn" class="form-control rounded-top @error('No_tlpn')is-invalid @enderror" id="No_tlpn" placeholder="No Telepon" required value="{{ old('No_tlpn') }}">
                      @error('No_tlpn')
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
