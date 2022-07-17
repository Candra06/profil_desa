@extends('app.frontend.layouts.app')
@section('content')
    <section>
        <div class="bg-header">
            <div class="container p-5">
                <h1>Dusun <br> <span class="base-blue2">Desa Kertonegoro</span></h1>
            </div>
        </div>
    </section>
    @php
    $i = 0;
    @endphp
    @foreach ($data as $item)
        @if ($i % 2 == 0)
            <section id="sambutan">
                <div class="sambutan">
                    <div class="container">

                        <div class="row d-flex align-items-center justify-content-evenly mt-5">
                            <div class="col-md-6 d-flex justify-content-center">
                                <div id="carouselExampleInterval" class="carousel slide carousel-fade"
                                    data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-inner">
                                            @for ($i = 0; $i < count($item['galeri']); $i++)
                                                <div class="carousel-item active" data-bs-interval="5000">
                                                    <img src="{{asset(str_replace('public','storage',$item['galeri'][$i]['foto']))}}" class="d-block w-100"
                                                        alt="Slide 1">
                                                </div>
                                            @endfor


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-row mb-4 mt-5">

                                    <h1>{{ $item['nama_dusun'] }} <br> <span class="base-blue2">Desa Kertonegoro</span></h1>
                                </div>
                                {!! $item['deskripsi'] !!}
                            </div>
                        </div>
                    </div>
                    <!-- <div class="bg bg-1"></div>
                            <div class="bg bg-2"></div> -->
                </div>
            </section>
        @else
            <section id="profil">
                <div class="profil">
                    <div class="container">

                        <div class="row d-flex align-items-center justify-content-evenly mt-5">

                            <div class="col-md-6">
                                <div class="d-flex flex-row mb-4 mt-5">

                                    <h1>Pemerintahan <br> Desa <span class="base-color-2">Kertonegoro</span></h1>
                                </div>
                                <p>Secara administrasi pemerintahan, DesaKertonegoro merupakan 1 (satu) dari 8 (delapan)
                                    desa di wilayah Kecamatan Jenggawah. Tujuh desa yang lain adalah Desa Wonojati, Desa
                                    Kemuningsarikidul, Desa Sruni, Desa Jatisari, Desa Jatimulyo, Desa Cangkring, Desa
                                    Jenggawah.</p>
                                <p>Batas Desa Kertonegoro adalah :</p>
                                <ul>
                                    <li>Utara : Desa Wonojati dan Desa Kemuningsari Kidul (Kecamatan Jenggawah)</li>
                                    <li>Selatan : Desa Karanganyar (Kecamatan Ambulu)</li>
                                    <li>Timur : Desa SrunidanDesaJatisari (KecamatanJenggawah)</li>
                                    <li>Barat : Desa KemuningsariKidul (KecamatanJenggawah)</li>
                                </ul>
                            </div>
                            <div class="col-md-6 d-flex justify-content-center">
                                <div id="carouselExampleInterval" class="carousel slide carousel-fade"
                                    data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-inner">
                                            @foreach ($item->galeri as $gl)
                                                <div class="carousel-item active" data-bs-interval="5000">
                                                    <img src="asset/images/header.jpeg" class="d-block w-100"
                                                        alt="Slide 1">
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="bg bg-1"></div>
                            <div class="bg bg-2"></div> -->
                </div>
            </section>
        @endif
        @php
            $i++;
        @endphp
    @endforeach
@endsection
