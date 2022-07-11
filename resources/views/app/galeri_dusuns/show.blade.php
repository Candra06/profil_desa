@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('galeri-dusuns.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.galeri_dusuns.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.galeri_dusuns.inputs.dusun_id')</h5>
                    <span
                        >{{ optional($galeriDusun->dusun)->nama_dusun ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.galeri_dusuns.inputs.nama_foto')</h5>
                    <span>{{ $galeriDusun->nama_foto ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.galeri_dusuns.inputs.foto')</h5>
                    <x-partials.thumbnail
                        src="{{ $galeriDusun->foto ? \Storage::url($galeriDusun->foto) : '' }}"
                        size="150"
                    />
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('galeri-dusuns.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\GaleriDusun::class)
                <a
                    href="{{ route('galeri-dusuns.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
