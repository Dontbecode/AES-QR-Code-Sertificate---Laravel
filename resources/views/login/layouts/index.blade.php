<!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/style/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/style/img/STKIP.png">
  <title>
    Login Admin Pusat Bahasa STKIP Kuningan
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="/style/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/style/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="/style/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="bg-gray-200">
  
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://img.freepik.com/free-vector/white-abstract-background_23-2148810113.jpg?w=1380&t=st=1678785372~exp=1678785972~hmac=28c3f4e5f903d6427c3d280190ae403e6f785e23ce6bce9b22d3c0d6dd12e167');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">

       
                <center>
                <div class="mb-6">
                  <img class="n-logo mb-2" src="/style/img/STKIP.png" height="150" width="150">
                  <h4 class="h4-seo">Pusat Bahasa STKIP Kuningan</h4>
                </div>
                </center>
       


        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Login Admin</h4>
                 
                </div>
              </div>
              
              <div class="card-body">
                  @if(session('error'))
                  <div class="alert alert-danger">
                      {{session('error')}}
                  </div>
                  @endif
                <form  action="/login/actionlogin" method="POST" role="form" class="text-start">
                   {{-- method="post" --}}
                  @csrf
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                  </div>
               
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Masuk</button>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="/style/js/core/popper.min.js"></script>
  <script src="/style/js/core/bootstrap.min.js"></script>
  <script src="/style/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/style/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/style/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>