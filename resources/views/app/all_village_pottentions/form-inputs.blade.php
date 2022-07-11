@php $editing = isset($villagePottentions) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nama_potensi"
            label="Nama Potensi"
            value="{{ old('nama_potensi', ($editing ? $villagePottentions->nama_potensi : '')) }}"
            maxlength="255"
            placeholder="Nama Potensi"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $villagePottentions->gambar ? \Storage::url($villagePottentions->gambar) : '' }}')"
        >
            <x-inputs.partials.label
                name="gambar"
                label="Gambar"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="gambar"
                    id="gambar"
                    @change="fileChosen"
                />
            </div>

            @error('gambar') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>
</div>
