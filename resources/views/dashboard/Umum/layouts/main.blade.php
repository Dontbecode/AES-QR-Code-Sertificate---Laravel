<!--

=========================================================
* Now UI Kit - v1.3.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-kit
* Copyright 2019 Creative Tim (http://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/now-ui-kit/blob/master/LICENSE.md)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/style/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/style/img/STKIP.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Verifikasi Sertifikat TOEFL STKIP Kuningan
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="/style/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/style/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/style/demo/demo.css" rel="stylesheet" />
</head>

<body class="index-page sidebar-collapse">
        <!-- Navbar -->
        @include('dashboard.Umum.layouts.topbar')
        <!-- End Navbar -->
        <!-- Content -->
        <div class="wrapper">
          <div class="page-header clear-filter" filter-color="orange" id="content">
            <div class="page-header-image" data-parallax="true" style="background-image:url('/style/img/BG.jpg');">
            </div>

        @yield('container')
  
          </div>
        @yield('isi')
</body>
    <footer class="footer" data-background-color="black">
      <div class=" container ">
        <nav>
          <ul>
            <li>
              <a href="">
                Verifikasi
              </a>
            </li>
            <li>
              <a href="">
                Sertifikat
              </a>
            </li>
            <li>
              <a href="">
                Toefl
              </a>
            </li>
          </ul>
        </nav>
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
              <span>Copyright &copy; Pusat Bahasa STKIP Kuningan Website 2023</span>
          </div>
      </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="/style/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="/style/js/core/popper.min.js" type="text/javascript"></script>
  <script src="/style/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="/style/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="/style/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="/style/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
  <script src="/style/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
  <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script>
    $(document).ready(function() {
      // the body of this function is in assets/js/now-ui-kit.js
      nowuiKit.initSliders();
    });

    function scrollToDownload() {

      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  </script>
   <script>
      
            
       
    function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
                
            $('#No_Sertifikat').val(decodedText);
            
            let id = decodedText
            html5QrcodeScanner.clear(1)
            csrf_token = $('meta[name="csrf_token"]').attr('content');
           
            Swal.fire({
                title : 'Succes',
                text : 'Berhasil Terscan',
           
                confirmButtonColor : '#3085d6',
                cancelButtonColor :'#d33',
                confirmButtonText : 'Ok'
            }).then((result)=>{
                
                if(result.value){
                    $.ajax({
                        url : "{{ route('validasi') }}",
                        type :'POST',
                        data : {
                            '_method' : 'POST',
                            '_token'  : "{{ csrf_token() }}",
                            'Kode_Enkripsi' : id
                             
                        },
                        success: function(response){
                        
                        if(response.status_error){
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text:  'Data Sertifikat Tidak Terverifikasi'
                               
                        })
                        setTimeout(function() {
                        window.location.href = "/Scan";
                         }, 3000); 
                        }
                        if(response.berhasil){
                            Swal.fire({
                                icon: 'success',
                                type: 'success',
                                title: 'Success!',
                                text: 'Data Sertifikat Terverifikasi!'
                                
                            });

                        }
                           
                        },
                       
                        })
                    }
                })
            
        }

        function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
        { fps: 90, qrbox: {width: 500, height: 500} },
        /* verbose= */ false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>


</html>