@extends('dashboard.Admin.layouts.main')


@section('container')
<?php include_once('Aes.php'); ?>
<?php
    $key='1234567890123456';
    if (isset($_POST['submit'])) {
        if (isset($key)) {
            $b = $key;
            $a = $_POST['No_Sertifikat'];
            $aes = new Aes($b);

            // $a2 = hex2bin($a);
            $hasil = bin2hex($aes->encrypt($a));
        }
    }
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Lengkapi Data Nilai</h4>
                    </div>
                    <div class="content">
            <form action="/LengkapiData/Add/{{ $dtnilai->id }}" method="post">
                <div class="row">
                    <div class="col-md-5">
                            @csrf
                            <div class="form-floating ">
                                <div class="col-md-12 mt-2">
                                <input type="hidden" name="No" id="No" class="form-control rounded-top"  required value="No." >
                                </div>
                            </div>
                            <div class="form-floating ">
                                <div class="col-md-12 mt-2">
                                    <label for="id">ID</label>
                                <input type="text" name="id" class="form-control rounded-top @error('id')is-invalid @enderror" id="id"   required value="{{$dtnilai->id}}" readonly>
                                @error('id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-floating ">
                                <div class="col-md-12 mt-2">
                                <label for="No_peserta">No Peserta</label>
                                <input type="text" name="No_peserta" class="form-control rounded-top @error('No_peserta')is-invalid @enderror" id="No_peserta"   required value="{{ $dtnilai->No_peserta }}" readonly>
                                @error('No_peserta')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-floating ">
                                <div class="col-md-12 mt-2">
                                <input type="hidden" name="SP"  id="SP" required value="CERT.TOEP" readonly>
                                </div>
                            </div>
                            <div class="form-floating ">
                                <div class="col-md-12 mt-2">
                                <label for="NIM">NIM</label>
                                <input type="text" name="NIM" class="form-control rounded-top" id="NIM"   required value="{{ $dtnilai->NIM }}" readonly>
                                </div>
                            </div>
                            <div class="form-floating ">
                                <div class="col-md-12 mt-2">
                                <label for="Nama_mhs">Nama</label>
                                <input type="text" name="Nama_mhs" class="form-control rounded-top" id="Nama_mhs"   required value="{{ $dtnilai->Nama_mhs }}" readonly>
                                </div>
                            </div>
                            <div class="form-floating ">
                                <div class="col-md-12 mt-2">
                                <label for="ProgramStudi">Program Studi</label>
                                <input type="text" name="ProgramStudi" class="form-control rounded-top" id="ProgramStudi"   required value="{{ $dtnilai->ProgramStudi }}" readonly>
                                </div>
                            </div>
                            <div class="form-floating ">
                                <div class="col-md-12 mt-2">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control rounded-top @error('tanggal')is-invalid @enderror" id="tanggal"   value="{{ $dtnilai->tanggal }}"  required >
                                @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>
                            </div>
                    </div>
                    <div class="col-md-3">
                        <h4>Nilai</h4>
                        <div class="form-floating">
                          <div class="col-md-12 mt-2">
                            <label for="Listening">Listening</label>
                            <input type="number" name="Listening" class="form-control rounded-top" id="Listening" required oninput="limitInput(this)" value="{{ $dtnilai->Listening }}">
                            <label for="Structure">Structure and Written Expression</label>
                            <input type="number" name="Structure" class="form-control rounded-top" id="Structure" required oninput="limitInput(this)" value="{{ $dtnilai->Structure }}">
                            <label for="Reading">Reading Comprehension</label>
                            <input type="number" name="Reading" class="form-control rounded-top" id="Reading" required oninput="limitInput(this)" value="{{ $dtnilai->Reading }}">
                            <label for="Total">Total Score</label>
                            <input type="number" name="Total" class="form-control rounded-top" id="Total" value="{{ $dtnilai->Total }}">
                          </div>
                        </div>
                        <div class="form-floating">
                          <div class="col-md-12 mt-2">
                            <div class="mb-2">
                              <button type="button" class="btn btn-primary w-100 btn-fill" onclick="calculateTotal()">Hitung</button>
                            </div>
                          </div>
                        </div>
                      </div>

                    <div class="col-md-4">
                        <div class="form-floating ">
                            <div class="col-md-12 mt-2">
                              <label for="No_Sertifikat">No Sertifikat</label>
                              <input class="form-control" id="No_Sertifikat" rows="3" aria-describedby="textHelp" name="No_Sertifikat"  value="{{ $dtnilai->No_Sertifikat }}" readonly required>
                              @error('No_Sertifikat')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>
                          </div>
                          <br>
                          <div class="form-floating ">
                          <div class="col-md-12 mt-2">
                                <div class=" mb-2 ">
                                <button type="submit" name="Generate" class="btn btn-primary w-100 btn-fill" onclick="myFunction()"  >Generete No Sertifikat</button>
                                </div>
                            </div>
                            </div>
                        </form>
                        <br>
                        <div class="form-floating ">
                            <div class="col-md-12 mt-2">
                             <form action="/LengkapiData/Add/{{ $dtnilai->id }}" method="POST">
                              @csrf
                                      <textarea class="form-control" id="No_Sertifikat" rows="3" aria-describedby="textHelp" name="No_Sertifikat" placeholder="Teks" style="height: 100px"  value="{{ $dtnilai->No_Sertifikat }}"
                                      >{{ $dtnilai->No_Sertifikat }}</textarea>
                            <br>
                                        <div class=" mb-2 ">
                                        <input type="submit" name="submit" class="btn btn-primary w-100 mt-2 btn-fill" value="Enkripsi">
                                        </div>
                            </form>
                            <br>
                            </div>
                        </div>
                        <div class="form-floating ">
                            <div class="col-md-12 mt-2">
                                    <form action="/LengkapiData/Enkrip/{{ $dtnilai->id }}"  method="post">
                                          @csrf
                                          <input type="hidden" name="id" class="form-control rounded-top @error('id')is-invalid @enderror" id="id"   required value="{{ $dtnilai->id }}" >
                                          <input type="hidden" name="No_peserta" class="form-control rounded-top @error('No_peserta')is-invalid @enderror" id="No_peserta"   required value="{{ $dtnilai->No_peserta }}" >
                                          <input type="hidden" class="form-control" id="No_Sertifikat" rows="3" aria-describedby="textHelp" name="No_Sertifikat"  value="{{ $dtnilai->No_Sertifikat }}" required >
                                          <input type="hidden" class="form-control" id="Nama_mhs" rows="3" aria-describedby="textHelp" name="Nama_mhs"  value="{{ $dtnilai->Nama_mhs }}" required >
                                          <input type="hidden" name="NIM" class="form-control rounded-top" id="NIM"    value="{{ $dtnilai->NIM }}" readonly >
                                          <input type="hidden" name="Jurusan" class="form-control rounded-top" id="Jurusan"    value="{{ $dtnilai->Jurusan }}" readonly >
                                          <input type="hidden" name="J_Kelamin" class="form-control rounded-top" id="J_Kelamin"    value="{{ $dtnilai->J_Kelamin }}" readonly >
                                          <input type="hidden" name="Angkatan" class="form-control rounded-top" id="Angkatan"    value="{{ $dtnilai->Angkatan }}" readonly >
                                          <input type="hidden" name="No_tlpn" class="form-control rounded-top" id="No_tlpn"    value="{{ $dtnilai->No_tlpn }}" readonly >
                                          <input type="hidden" name="email" class="form-control rounded-top" id="email"    value="{{ $dtnilai->email }}" readonly >
                                          <input type="hidden" name="ProgramStudi" class="form-control rounded-top" id="ProgramStudi"    value="{{ $dtnilai->ProgramStudi }}" readonly >
                                          <input type="hidden" name="tanggal" class="form-control rounded-top" id="tanggal"    value="{{ $dtnilai->tanggal }}" readonly  >
                                          <input type="hidden" name="Listening" class="form-control rounded-top" id="Listening"    value="{{ $dtnilai->Listening }}" readonly  >
                                          <input type="hidden" name="Structure" class="form-control rounded-top" id="Structure"    value="{{ $dtnilai->Structure }}" readonly  >
                                          <input type="hidden" name="Reading" class="form-control rounded-top" id="Reading"    value="{{ $dtnilai->Reading }}" readonly  >
                                          <input type="hidden" name="Total" class="form-control rounded-top" id="Total"    value="{{ $dtnilai->Total }}" readonly  >
                                          <input  class="form-control text-result" id="chipertextResultValue" aria-describedby="chipertextResultHelp" name="Kode_Enkripsi" placeholder="Teks" style="height: 120px"  value='<?php if (isset($hasil)) echo ($hasil) ?>' readonly>
                                          <br>
                                          <button class="btn btn-primary w-100 btn-fill" type="submit">Simpan Data Enkripsi</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
<script type="text/javascript">
 function myFunction(){
               var No = $("#No").val();
               var No_peserta = $("#No_peserta").val();
               var sP = $("#SP").val();
      
               var Tanggal = $("#tanggal").val();
               $('#No_Sertifikat').val(No +No_peserta+"/"+ sP +"/"+Tanggal);
   }
           </script>

<script>

    function limitInput(input) {
                if (input.value.length > 3) {
                    input.value = input.value.slice(0, 3);
                }
        }
    function calculateTotal() {
      var listeningInput = parseInt(document.getElementById('Listening').value) || 0;
      var structureInput = parseInt(document.getElementById('Structure').value) || 0;
      var readingInput = parseInt(document.getElementById('Reading').value) || 0;
  
      

      var total = listeningInput + structureInput + readingInput;

      if (total > 677) {
        total = 677;
            }

      document.getElementById('Total').value = total;
    }
  </script>