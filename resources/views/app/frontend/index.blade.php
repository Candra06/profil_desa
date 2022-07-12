@extends('app.frontend.layouts.app')
@section('content')
    <section>
        <!-- <div class="bg-header"> -->
        <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="5000">
                        <img src="asset/images/header.jpeg" class="d-block w-100" alt="Slide 1">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="asset/images/header2.png" class="d-block w-100" alt="Slide 2">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="asset/images/header3.png" class="d-block w-100" alt="Slide 3">
                    </div>
                </div>
            </div>

            <!-- <div class="container p-5">
                <h1>Selamat Datang di <br> <span class="base-color">Desa Kertonegoro</span></h1>
            </div> -->
            <!-- </div> -->
            <!-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <picture>
                            <source media="(max-width: 768px)" srcset="asset/images/slide1-mobile.jpg" loading="lazy">
                            <img  data-src="asset/images/slide1-desktop.jpg" src="asset/images/slide1-desktop.jpg" class="d-block w-100 lazy" alt="Slide 1" loading="lazy">
                        </picture>



                    </div>

                </div>

            </div> -->
            <!-- <div class="bg bg-1"></div> -->
    </section>

    <section id="sambutan">
        <div class="sambutan">
            <div class="container">

                <div class="row d-flex align-items-center justify-content-evenly mt-5">
                    <div class="col-md-6 d-flex justify-content-center">

                        <img class="lazy" src="asset/images/kades.png" width="400" height="400" />
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex flex-row mb-4 mt-5">

                            <h1>Sambutan <br> Kepala <span class="base-color">Desa</span></h1>
                        </div>
                        <p>
                            Assalamu'alaikum wr.wb. <br>
                            Membangun desa yang aman, tenteram, damai sentosa serta memakmurkan masyarakat adalah Visi
                            dan Misi utama kami dalam menjalankan roda pemerintahan pada kepemimpinan kami sebelumnya,
                            <br>


                        </p>
                        <p>Senin (29/7/2019), Balai Desa Kertonegoro. Kec. Jenggawah, Kab. Jember.</p>
                    </div>
                </div>
            </div>
            <!-- <div class="bg bg-1"></div>
                <div class="bg bg-2"></div> -->
        </div>
    </section>



    <section id="profil">
        <div class="profil">
            <div class="container">

                <div class="row d-flex align-items-center justify-content-evenly mt-5">

                    <div class="col-md-6">
                        <div class="d-flex flex-row mb-4 mt-5">

                            <h1>Video <br> Profil <span class="base-color-2">Desa Kertonegoro</span></h1>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit voluptatibus ratione
                            officiis maiores et repudiandae at nesciunt ipsam consequuntur repellat ullam consequatur
                            sunt eum, pariatur similique enim eius possimus necessitatibus.
                        </p>

                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="embed-responsive embed-responsive-4by3" style="width: 100%;">
                            <iframe class="embed-responsive-item video"  width="560" height="315"
                                src="https://drive.google.com/file/d/1ayBntKwmXNiXPZ6PM8IV-MvJRv4gfCAo/preview"
                                style="width: 100%;" allow="autoplay"></iframe>
                            {{-- <iframe width="560" height="315" src="https://drive.google.com/file/d/1ayBntKwmXNiXPZ6PM8IV-MvJRv4gfCAo/view?usp=drivesdk"
                              style="width: 100%;" frameborder="0"
                                allow="clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe> --}}

                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5 mb-5">
                <a href="https://www.youtube.com/channel/UC13f2ngWKmn9IbdVQR4fblg" class="btn btn-lg base-bg2">Channel
                    Youtube</a>

            </div>
            <!-- <div class="bg bg-1"></div>
                <div class="bg bg-2"></div> -->
        </div>
    </section>

    <section id="galeri">
        <div class="galeri">
            <div class="container mb-5 ">
                <h1 class="text-center">Peta Potensi Desa</h1>
                <h6 class="text-center">Potensi yang ada di desa Kertonegoro</h6>
            </div>
            <div class=" text-center image">
                <img class="lazy" src="asset/images/peta1.png" alt="">
                <img class="lazy" src="asset/images/peta2.png" alt="">
                <img class="lazy" src="asset/images/potensi1.png" alt="">
                <img class="lazy" src="asset/images/potensi2.png" alt="">
            </div>
        </div>
    </section>

    <!-- <section id="why-us">
            <div class="why">
                <div class="container">

                    <div class="row d-flex align-items-center justify-content-evenly mt-5">
                        <div class="col-md-6 d-flex justify-content-center">
                            <img src="asset/images/why-us.jpg" width="400" height="300" />
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-row mb-4 mt-5">

                                <h1>Mengapa Harus <br> Pilih <span class="base-blue">SMKN 1 Tamanan</span></h1>
                            </div>
                            <p>
                                Selain fasilitas belajar yang lengkap dan tenaga pengajar yang kompeten di bidangnya
                                masing-masing, SMK Negeri 1 Tamanan memilik berbagai keunggulan yaitu :
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <img width="50" height="50" src="asset/images/icon-unggulan.svg" alt=""
                                                srcset="">

                                        </div>
                                        <div class="col-md-9">
                                            <h6 class="font-weight-bold">SMK Pusat Unggulan</h6>
                                            <small>Kompetensi yang diajarkan sesuai kebutuhan dunia kerja</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <img width="50" height="50" src="asset/images/icon-teaching.svg" alt=""
                                                srcset="">

                                        </div>
                                        <div class="col-md-9">
                                            <h6 class="font-weight-bold">Teaching Factory</h6>
                                            <small>Kompetensi yang diajarkan sesuai kebutuhan dunia kerja</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <img width="50" height="50" src="asset/images/icon-proyek.svg" alt="" srcset="">

                                        </div>
                                        <div class="col-md-9">
                                            <h6 class="font-weight-bold">Pembelajaran Berbasis Proyek</h6>
                                            <small>Kompetensi yang diajarkan sesuai kebutuhan dunia kerja</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <img width="50" height="50" src="asset/images/icon-dudi.svg" alt="" srcset="">

                                        </div>
                                        <div class="col-md-9">
                                            <h6 class="font-weight-bold">Kerjasama DU/DI</h6>
                                            <small>Kompetensi yang diajarkan sesuai kebutuhan dunia kerja</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="bg bg-1"></div>
                <div class="bg bg-2"></div>
            </div>
        </section> -->

    <section id="lulusan">
        <div class="lulusan">
            <div class="container">
                <h1 class="text-center">Jumlah Warga</h1>
                <h6 class="text-center base-blue">Total Warga Desa Kertonegoro</h6>

                <div class="row mx-auto mt-5">
                    <div class="statistik-2">
                        <h2 class="base-blue2">300</h2>
                        <p>Laki-Laki </p>
                    </div>
                    <div class="statistik-2">
                        <h2 class="base-color">300</h2>
                        <p>Perempuan</p>
                    </div>
                    <div class="statistik-2">
                        <h2 class="base-color-2">300</h2>
                        <p>Anak-Anak</p>
                    </div>
                    <div class="statistik-2">
                        <h2 class="base-blue">300</h2>
                        <p>Lansia</p>
                    </div>
                    <div class="statistik-2">
                        <h2 class="base-color-grey">300</h2>
                        <p>Dewasa</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="galeri">
        <div class="galeri">
            <div class="container mb-5 ">
                <h1 class="text-center">Galeri Foto Aktivitas</h1>
                <h6 class="text-center">Aktivitas Desa Kertonegoro</h6>
            </div>
            <div class=" text-center image">
                <img class="lazy" src="asset/images/potensi1.png" alt="">
                <img class="lazy" src="asset/images/potensi2.png" alt="">
                <img class="lazy" src="asset/images/potensi1.png" alt="">
                <img class="lazy" src="asset/images/potensi2.png" alt="">
            </div>
        </div>
    </section>

    <section id="blog">
        <div class="blog">
            <div class="container mb-5 ">
                <h1 class="">Apa Yang Terbaru? <br> Informasi <span class="base-color">Penting Dan Artikel
                        Baru</span>
                </h1>
                <div class="row">
                    <div class="col-md-7 highlight">
                        <div class="row">
                            <div class="col-md-7">
                                <img class="lazy" src="asset/images/artikel.jpeg" height="90%" width="100%"
                                    alt="">
                            </div>
                            <div class="col-md-5">
                                <p>30 September</p>
                                <h3>Artikel Lorem Ipsum </h3>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut, laborum? Nulla
                                    architecto voluptates deleniti, quam quis veritatis hic assumenda deserunt numquam
                                    in enim, voluptas, voluptatem sed obcaecati eaque? Odio, suscipit.</p>
                                <p><a href="">Read more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 mt-4">
                        <div class="row">
                            <div class="col-md-5">
                                <img class="lazy" src="asset/images/artikel.jpeg" height="80%" width="100%"
                                    alt="">
                            </div>
                            <div class="col-md-7 ">
                                <p>30 September</p>
                                <h4>Get Inovation Training IOT in SMKN 1 Tamanan, Teaching From Japanes & England </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <img class="lazy" src="asset/images/artikel.jpeg" height="80%" width="100%"
                                    alt="">
                            </div>
                            <div class="col-md-7 ">
                                <p>30 September</p>
                                <h4>Get Inovation Training IOT in SMKN 1 Tamanan, Teaching From Japanes & England </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <img class="lazy" src="asset/images/artikel.jpeg" height="80%" width="100%"
                                    alt="">
                            </div>
                            <div class="col-md-7 ">
                                <p>30 September</p>
                                <h4>Get Inovation Training IOT in SMKN 1 Tamanan, Teaching From Japanes & England </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <button class="btn btn-lg base-bg2">Lihat Semua</button>
                </div>
            </div>
        </div>
    </section>

    <section id="agenda">
        <div class="agenda">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="image">
                            <img class="img-bg" src="asset/images/header3.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <h1>Agenda Kegiatan Civitas <br> Akademika <span class="base-color-2">Desa Kertonegoro</span>
                        </h1>
                        <div class="row mt-5">
                            <div class="col-md-2 mr-1">
                                <img width="50" height="50" src="asset/images/agenda1.svg" alt=""
                                    srcset="">
                            </div>
                            <div class="col-md-10">
                                <h6>Sosialisasi Program Anti Perundungan Root</h6>
                                <p>14 Oktober 2021</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-2 mr-1">
                                <img width="50" height="50" src="asset/images/agenda1.svg" alt=""
                                    srcset="">
                            </div>
                            <div class="col-md-10">
                                <h6>Workshop Pertanian</h6>
                                <p>15 Oktober 2021</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section id="testimoni">
            <div class="testimoni">
                <div class="container">

                    <div class="row d-flex align-items-center justify-content-evenly mt-5">
                        <div class="col-md-6 text-center">
                            <img class="lazy" src="asset/images/testimoni.png" width="300" height="400" />
                        </div>
                        <div class="col-md-6">
                            <div class="conten">
                                <div class="d-flex flex-row mb-2 mt-5">
                                    <h2>Catryn Alhamdalah Wati</h2>
                                </div>
                                <div class="qoutes1">
                                    <img src="asset/images/quotes.svg" height="60" alt="" srcset="">
                                </div>
                                <div class="qoutes2">
                                    <img src="asset/images/quotes2.svg" height="60" alt="" srcset="">
                                </div>
                                <p>
                                    "Belajar gak harus dengan teori terus, tapi juga diajarkan dengan praktek langsung
                                    sehingga saya lebih mengerti dalam menangkap pelajaran. Dalam kegiatannya sehari-hari
                                    juga hubungan antar siswa maupun guru, sangat dekat sehingga terasa suasana
                                    kekeluargaannya, Jaya terus SMK Tamanan" (murid smkn tamanan)
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section> -->
@endsection
