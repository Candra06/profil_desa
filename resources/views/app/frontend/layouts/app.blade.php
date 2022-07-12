<!DOCTYPE html>
<html lang="en">

@include('app.frontend.layouts.header')
<body>
    @include('app.frontend.layouts.navbar')
    @yield('content')
    <section id="location">

        <div class="mt-5">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63168.40288977596!2d113.57683044559525!3d-8.300292571211703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd69afa7cbd817d%3A0x63e1f0ca4ffdb776!2sKertonegoro%2C%20Kec.%20Jenggawah%2C%20Kabupaten%20Jember%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1657468106898!5m2!1sid!2sid"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

        </div>

    </section>

    <section id="contact">
        <div class="contact">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-4">
                        <img src="asset/images/logo.png" alt="" srcset="">
                    </div>
                    <div class="col-md-4">
                        <h6>SITEMAP</h6>
                        <p><a style="text-decoration: none; color: black;" href="index.html">Beranda</a></p>
                        <p><a style="text-decoration: none; color: black;" href="#">Profil</a></p>
                        <p><a style="text-decoration: none; color: black;" href="#">Dusun</a></p>
                        <p><a style="text-decoration: none; color: black;" href="#">Layanan Administrasi</a></p>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <hr>
    @include('app.frontend.layouts.footer')
</body>

</html>
