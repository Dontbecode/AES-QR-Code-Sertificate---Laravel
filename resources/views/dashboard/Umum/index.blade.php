@extends('dashboard.Umum.layouts.main')

@section('container')
  <!-- Content -->


  <div class="wrapper">
    <div class="page-header clear-filter" filter-color="orange">
      <div class="page-header-image" data-parallax="true" style="background-image:url('/style/img/BG.jpg');">
      </div>
      <div class="container">
        <div class="content-center brand">
          <img class="n-logo" src="/style/img/STKIP.png" alt="">
          <h1 class="h1-seo">Pusat Bahasa STKIP Kuningan</h1>
          <h3>Verifikasi Sertifikat TOEFL</h3>
          <form class="d-flex" role="search">
            <a href="{{ route('Scan') }}" class="btn btn-black btn-user btn-block">
                Scan QR Code
            </a>
          </form>
        </div>
      </div>
    </div>
  <!-- Content -->
 

  

</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

  @endsection
     