@php $editing = isset($artikel) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text name="judul" label="Judul Artikel"
            value="{{ old('judul', $editing ? $artikel->judul : '') }}" maxlength="255"
            placeholder="Judul Artikel" required></x-inputs.text>
    </x-inputs.group>

    <div class="col-md-12">
        <div class="form-group">
            <label for="password">Konten</label>
            <textarea rows="4" required class="form-control @error('konten') is-invalid @enderror" id="summernote" name="konten">{{ old('konten', ($editing ? $artikel->konten : '')) }}</textarea>
            @error('konten')
                <label class="mt-1" style="color: red">{{ $message }}</label>
            @enderror
        </div>
    </div>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $artikel->thumbnail ? \Storage::url($artikel->thumbnail) : '' }}')"
        >
            <x-inputs.partials.label
                name="thumbnail"
                label="Thumbnail"
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
                <input type="file" name="thumbnail" id="thumbnail" @change="fileChosen" />
            </div>

            @error('thumbnail') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <script>
        $(document).ready(function() {
            console.log('summer');
            $('#summernote').summernote();
        });
    </script>
</div>
