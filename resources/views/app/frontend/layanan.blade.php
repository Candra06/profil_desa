@extends('app.frontend.layouts.app')
@section('content')
    <section>
        <div class="bg-header">
            <div class="container p-5">
                <h1>Layanan Administrasi <br> <span class="base-blue2">Desa Kertonegoro</span></h1>
            </div>
        </div>
    </section>
    <section id="sambutan" class="mt-5 pt-5">
        <div class="sambutan">
            <div class="container">
                <div class="row">
                    @foreach ($data as $item)
                    <div class="col-lg-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{$item->judul_pelayanan}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Desa Kertonegoro</h6>
                                <a href="{{$item->link_pelayanan}}" target="_blank" class="btn btn-success"><p class="card-text">Menuju Form</p></a>

                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

    </section>
@endsection
