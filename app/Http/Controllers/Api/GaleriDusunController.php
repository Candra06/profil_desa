<?php

namespace App\Http\Controllers\Api;

use App\Models\GaleriDusun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\GaleriDusunResource;
use App\Http\Resources\GaleriDusunCollection;
use App\Http\Requests\GaleriDusunStoreRequest;
use App\Http\Requests\GaleriDusunUpdateRequest;

class GaleriDusunController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', GaleriDusun::class);

        $search = $request->get('search', '');

        $galeriDusuns = GaleriDusun::search($search)
            ->latest()
            ->paginate();

        return new GaleriDusunCollection($galeriDusuns);
    }

    /**
     * @param \App\Http\Requests\GaleriDusunStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GaleriDusunStoreRequest $request)
    {
        $this->authorize('create', GaleriDusun::class);

        $validated = $request->validated();
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('public');
        }

        $galeriDusun = GaleriDusun::create($validated);

        return new GaleriDusunResource($galeriDusun);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\GaleriDusun $galeriDusun
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, GaleriDusun $galeriDusun)
    {
        $this->authorize('view', $galeriDusun);

        return new GaleriDusunResource($galeriDusun);
    }

    /**
     * @param \App\Http\Requests\GaleriDusunUpdateRequest $request
     * @param \App\Models\GaleriDusun $galeriDusun
     * @return \Illuminate\Http\Response
     */
    public function update(
        GaleriDusunUpdateRequest $request,
        GaleriDusun $galeriDusun
    ) {
        $this->authorize('update', $galeriDusun);

        $validated = $request->validated();

        if ($request->hasFile('foto')) {
            if ($galeriDusun->foto) {
                Storage::delete($galeriDusun->foto);
            }

            $validated['foto'] = $request->file('foto')->store('public');
        }

        $galeriDusun->update($validated);

        return new GaleriDusunResource($galeriDusun);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\GaleriDusun $galeriDusun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, GaleriDusun $galeriDusun)
    {
        $this->authorize('delete', $galeriDusun);

        if ($galeriDusun->foto) {
            Storage::delete($galeriDusun->foto);
        }

        $galeriDusun->delete();

        return response()->noContent();
    }
}
