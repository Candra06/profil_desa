@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('pelayanans.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.pelayanans.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.pelayanans.inputs.judul_pelayanan')</h5>
                    <span>{{ $pelayanan->judul_pelayanan ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pelayanans.inputs.link_pelayanan')</h5>
                    <a target="_blank" href="{{ $pelayanan->link_pelayanan }}"
                        >{{ $pelayanan->link_pelayanan ?? '-' }}</a
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('pelayanans.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Pelayanan::class)
                <a
                    href="{{ route('pelayanans.create') }}"
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
