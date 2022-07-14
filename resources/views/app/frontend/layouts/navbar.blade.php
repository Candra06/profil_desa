<nav class="navbar navbar-expand-md fixed-top p-2 navbar-dark" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="asset/images/logo-light.png" class="img-fluid" id="brand" />
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav ms-auto">
                <a class="nav-link  {{ Request::segment(1) != 'profil' && Request::segment(1) != 'dusun' && Request::segment(1) != 'layanan'  ? 'active' : '' }}" aria-current="page" href="{{url('/')}}">Beranda</a>
                <a class="nav-link {{ Request::segment(1) == 'profil' ? 'active' : '' }}" href="{{url('/profil')}}">Profile</a>
                <a class="nav-link " href="#">Dusun</a>
                <a class="nav-link {{ Request::segment(1) == 'layanan' ? 'active' : '' }}" href="{{url('/layanan')}}">Layanan Administrasi</a>
                <!-- <a class="nav-link" href="profile.html">Profile</a> -->
                <!-- <a class="nav-link" href="program_keahlian.html">Dusun</a> -->
                <!-- <a class="nav-link" href="bkk.html">Layanan Administrasi</a> -->
            </div>
        </div>
    </div>
</nav>
