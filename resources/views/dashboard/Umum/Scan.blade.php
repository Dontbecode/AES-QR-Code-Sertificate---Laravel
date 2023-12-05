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
      <h1 class="h1-seo">Scan QR Code</h1>
       
        <center>              
              <div class="col-md-12">
                <div class="hero-images-container-3">
                    <div class="card">
                            <div class="p-5">
                                <div >
                                    <div id="reader" width="300px"></div>
                                   
                                    <form action="/Dekripsi" method="POST">
                                        @csrf   
                                        <input type="hidden" class="form-control" id="No_Sertifikat" rows="3" aria-describedby="textHelp" name="No_Sertifikat"  style="height: 100px"  >
                                    
                                      <div class=" mb-2 ">
                                        <input type="submit" name="decrypt" class="btn btn-primary w-100 mt-2" value="Lihat No Sertifikat!">
                                      </div>
                                    </form>
                                    </div> 
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