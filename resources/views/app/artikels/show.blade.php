@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('artikels.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                Detail Artikel
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>Judul Artikel</h5>
                    <span>{{ $artikel->judul ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Konten</h5>
                    <span>{!! $artikel->konten ?? '-' !!}</span>
                </div>
                <div class="mb-4">
                    <h5>Thumbnail</h5>
                    <x-partials.thumbnail
                        src="{{ $artikel->thumbnail ? \Storage::url($artikel->thumbnail) : '' }}"
                        size="400"
                    />
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('artikels.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Dusun::class)
                <a href="{{ route('artikels.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
