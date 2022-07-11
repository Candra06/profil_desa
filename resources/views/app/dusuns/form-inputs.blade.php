@php $editing = isset($dusun) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nama_dusun"
            label="Nama Dusun"
            value="{{ old('nama_dusun', ($editing ? $dusun->nama_dusun : '')) }}"
            maxlength="255"
            placeholder="Nama Dusun"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="kepala_dusun"
            label="Kepala Dusun"
            value="{{ old('kepala_dusun', ($editing ? $dusun->kepala_dusun : '')) }}"
            maxlength="255"
            placeholder="Kepala Dusun"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="deskripsi"
            label="Deskripsi"
            maxlength="255"
            required
            >{{ old('deskripsi', ($editing ? $dusun->deskripsi : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
