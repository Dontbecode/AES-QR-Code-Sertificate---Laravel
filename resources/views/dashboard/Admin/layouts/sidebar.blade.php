<div class="sidebar" data-color="blue" data-image="/style/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
              
                <a href="" class="simple-text">
                  <img src="/style/img/STKIP.png" height="60" width="60" alt="">
                    <h3>Pusat Bahasa STKIP Kuningan</h3>
                </a>
            </div>

            <ul class="nav">
                <li >
                    <a href="/Dashboard/Admin">
                        <i class="pe-7s-graph"></i>
                        <p>Halaman Utama</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('Mahasiswa') }}">
                        <i class="pe-7s-user"></i>
                        <p>Data Mahasiwa</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('Nilai') }}">
                        <i class="pe-7s-note2"></i>
                        <p>Penilaian Toefl</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('DataSertifikat') }}">
                        <i class="pe-7s-news-paper"></i>
                        <p>Data Sertifikat</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>