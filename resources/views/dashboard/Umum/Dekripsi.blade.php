@extends('dashboard.Umum.layouts.main')

@section('container')
<?php include_once('Aes.php'); ?>

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
                                  
                                  <?php
                                  $key='1234567890123456';
                                  if (isset($_POST['decrypt'])) {
                                   
                                  
                                      if (isset($key)) {
                                          $c = $key;
                                          $hasil3 = $_POST['No_Sertifikat'];
                                          // echo bin2hex($hasil);
                                          $aes = new Aes($c);
                                          $hasil2 = hex2bin($hasil3);
                                  
                                          $d = $aes->decrypt($hasil2);
                                      }
                                      ?>
                                        <form action="/Detail" method="post">
                                          @csrf   
                                          <input type="text" name="No_Sertifikat"  id="No_Sertifikat" style="border: none; width: 385px"  value="<?php if (isset($d)) echo $d ?>" readonly>
                                        <div class=" mb-2 ">
                                          <button class="btn btn-primary w-100 mt-2" type="submit">Detail Data !</button>
                                        </div>
                                      </form>
                                      
                                      <?php
                                  
                                  
                                  }
                                  
                                  ?>
                                   


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