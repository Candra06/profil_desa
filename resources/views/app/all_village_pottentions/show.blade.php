@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a
                    href="{{ route('all-village-pottentions.index') }}"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_village_pottentions.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_village_pottentions.inputs.nama_potensi')
                    </h5>
                    <span>{{ $villagePottentions->nama_potensi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_village_pottentions.inputs.gambar')</h5>
                    <x-partials.thumbnail
                        src="{{ $villagePottentions->gambar ? \Storage::url($villagePottentions->gambar) : '' }}"
                        size="150"
                    />
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-village-pottentions.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\VillagePottentions::class)
                <a
                    href="{{ route('all-village-pottentions.create') }}"
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
