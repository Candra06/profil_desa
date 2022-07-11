@php $editing = isset($galeriDusun) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="dusun_id" label="Dusun" required>
            @php $selected = old('dusun_id', ($editing ? $galeriDusun->dusun_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Dusun</option>
            @foreach($dusuns as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nama_foto"
            label="Nama Foto"
            value="{{ old('nama_foto', ($editing ? $galeriDusun->nama_foto : '')) }}"
            maxlength="255"
            placeholder="Nama Foto"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $galeriDusun->foto ? \Storage::url($galeriDusun->foto) : '' }}')"
        >
            <x-inputs.partials.label
                name="foto"
                label="Foto"
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
                <input type="file" name="foto" id="foto" @change="fileChosen" />
            </div>

            @error('foto') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>
</div>
