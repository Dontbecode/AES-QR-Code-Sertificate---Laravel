@extends('dashboard.Admin.layouts.main')


@section('container')
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Edit Data Mahasiswa</h4>
            <br>
        </div>
        <form action="/EditMahasiswa/Add/{{ $dtmahasiswa->id }}" method="post">
            @csrf
              <div class="cf-cover">
                <div class="form-floating mb-2">
                    <div class="col-md-12">
                      <label for="No_pesera">No Peserta</label>
                      <input type="text" name="No_peserta" class="form-control rounded-top @error('No_peserta')is-invalid @enderror" id="No_peserta"  placeholder="Masukan No Peserta" required value="{{ $dtmahasiswa->No_peserta }}" readonly>
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
                      <input type="text" name="NIM" class="form-control rounded-top @error('NIM')is-invalid @enderror" id="NIM"   placeholder="Masukan NIM" required value="{{ $dtmahasiswa->NIM }}">
                      @error('NIM')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                </div>
                <div class="form-floating mb-2">
                    <div class="col-md-12">
                      <label for="Nama_peserta">Nama Lengkap</label>
                      <input type="text" name="Nama_mhs" class="form-control rounded-top @error('Nama_peserta')is-invalid @enderror" id="Nama_peserta"  pattern="^[a-zA-Z\s'-/,.]{1,100}$" placeholder="Masukan Nama Lengkap" required value="{{ $dtmahasiswa->Nama_mhs }}">
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
                        <option selected>{{ $dtmahasiswa->J_Kelamin }}</option>
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
                
                  <?php $years = range(2012, strftime("%Y", time())); ?>
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
                      <input type="text" name="No_tlpn" class="form-control rounded-top @error('No_tlpn')is-invalid @enderror" id="No_tlpn" placeholder="No Telepon" required value="{{$dtmahasiswa->No_tlpn}}">
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
                      <input type="email" name="email" class="form-control rounded-top @error('email')is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{$dtmahasiswa->email}}">
                      @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                  <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Yakin data akan di Edit ?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Data yang sebelumnya akan berubah, menjadi data baru yang telah di edit</div>
                            <div class="modal-footer">
                                <a class="btn btn-primary gagal" >Tidak</a>
                                <button class="btn btn-primary" type="submit">Ya</button>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="form-row  row" style="margin-top: 20px; margin-right:1px; ">
                        <div class="col-md-12">
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#EditModal">
                        <button class="btn btn-primary btn-sm btn-fill pull-right edit">Ubah Data</button>
                          </a>
                        </div>
                  </div>
                <br>
             </div>
          </form>
            <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
            <script >
              $('.gagal').click( function(){
                Swal.fire(
                        'Cancelled',
                        'Data Tidak Jadi di Edit',
                        'info'
                      )
                      setTimeout(function() {
                      window.location.href = "/DataMahasiswa";
                         }, 3000); 
              });
            </script>
    </div>
</div>
@endsection
