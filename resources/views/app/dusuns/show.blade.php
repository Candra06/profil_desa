@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('dusuns.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.dusuns.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.dusuns.inputs.nama_dusun')</h5>
                    <span>{{ $dusun->nama_dusun ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.dusuns.inputs.kepala_dusun')</h5>
                    <span>{{ $dusun->kepala_dusun ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.dusuns.inputs.deskripsi')</h5>
                    <span>{{ $dusun->deskripsi ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('dusuns.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Dusun::class)
                <a href="{{ route('dusuns.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
