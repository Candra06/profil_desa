@php $editing = isset($pelayanan) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="judul_pelayanan"
            label="Judul Pelayanan"
            value="{{ old('judul_pelayanan', ($editing ? $pelayanan->judul_pelayanan : '')) }}"
            maxlength="255"
            placeholder="Judul Pelayanan"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.url
            name="link_pelayanan"
            label="Link Pelayanan"
            value="{{ old('link_pelayanan', ($editing ? $pelayanan->link_pelayanan : '')) }}"
            maxlength="255"
            placeholder="Link Pelayanan"
            required
        ></x-inputs.url>
    </x-inputs.group>
</div>
