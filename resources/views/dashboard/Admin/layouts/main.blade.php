<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="/style/img/favicon.ico">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Pusat Bahasa STKIP KUNINGAN</title>
	    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="/style/css/bootstrapss.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="/style/css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="/style/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/style/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="/style/css/pe-icon-7-stroke.css" rel="stylesheet" />
   <style>
                .center {
            display: flex;
            justify-content: center;
            }

            #data-summary {
                display: flex;
                justify-content: space-between;
            }
            
            #data-item {
                flex-basis: 30%;
                background-color: #a8e7f7;
                padding: 20px;
                border-radius: 5px;
            }
            
            #data-item h3 {
                font-size: 18px;
                margin-bottom: 10px;
                font-weight: bold;
            }
            
            #data-item p {
                font-size: 24px;
                font-weight: bold;
            }
            #data-item1 {
                flex-basis: 30%;
                background-color: #dcf5ae;
                padding: 20px;
                border-radius: 5px;
            }
            
            #data-item1 h3 {
                font-size: 18px;
                margin-bottom: 10px;
                font-weight: bold;
            }
            
            #data-item1 p {
                font-size: 24px;
                font-weight: bold;
            }
            #data-item2 {
                flex-basis: 30%;
                background-color: #ffb3b3;
                padding: 20px;
                border-radius: 5px;
            }
            
            #data-item2 h3 {
                font-size: 18px;
                margin-bottom: 10px;
                font-weight: bold;
            }
            
            #data-item2 p {
                font-size: 24px;
                font-weight: bold;
            }


   </style>
</head>
<body>
<div class="wrapper">
      @include('dashboard.Admin.layouts.sidebar')
    <div class="main-panel">
        @include('dashboard.Admin.layouts.topbar')
        <div class="content">
          @yield('container')
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright text-center">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="">Pusat Bahasa</a>, STKIP Kuningan
                </p>
            </div>
        </footer>
    </div>
</div>
</body>
    <!--   Core JS Files   -->
    <script src="/style/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="/style/js/bootstrap.min.js" type="text/javascript"></script>
	<!--  Charts Plugin -->
	<script src="/style/js/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="/style/js/bootstrap-notify.js"></script>
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="/style/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="/style/js/demo.js"></script>
	{{-- <script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-user',
            	message: "Selamat datang, di pengelolaan data mahasiswa toefl STKIP Kuningan."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</html>
