<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\VillagePottentions;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\VillagePottentionsResource;
use App\Http\Resources\VillagePottentionsCollection;
use App\Http\Requests\VillagePottentionsStoreRequest;
use App\Http\Requests\VillagePottentionsUpdateRequest;

class VillagePottentionsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', VillagePottentions::class);

        $search = $request->get('search', '');

        $allVillagePottentions = VillagePottentions::search($search)
            ->latest()
            ->paginate();

        return new VillagePottentionsCollection($allVillagePottentions);
    }

    /**
     * @param \App\Http\Requests\VillagePottentionsStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VillagePottentionsStoreRequest $request)
    {
        $this->authorize('create', VillagePottentions::class);

        $validated = $request->validated();
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('public');
        }

        $villagePottentions = VillagePottentions::create($validated);

        return new VillagePottentionsResource($villagePottentions);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\VillagePottentions $villagePottentions
     * @return \Illuminate\Http\Response
     */
    public function show(
        Request $request,
        VillagePottentions $villagePottentions
    ) {
        $this->authorize('view', $villagePottentions);

        return new VillagePottentionsResource($villagePottentions);
    }

    /**
     * @param \App\Http\Requests\VillagePottentionsUpdateRequest $request
     * @param \App\Models\VillagePottentions $villagePottentions
     * @return \Illuminate\Http\Response
     */
    public function update(
        VillagePottentionsUpdateRequest $request,
        VillagePottentions $villagePottentions
    ) {
        $this->authorize('update', $villagePottentions);

        $validated = $request->validated();

        if ($request->hasFile('gambar')) {
            if ($villagePottentions->gambar) {
                Storage::delete($villagePottentions->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('public');
        }

        $villagePottentions->update($validated);

        return new VillagePottentionsResource($villagePottentions);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\VillagePottentions $villagePottentions
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        VillagePottentions $villagePottentions
    ) {
        $this->authorize('delete', $villagePottentions);

        if ($villagePottentions->gambar) {
            Storage::delete($villagePottentions->gambar);
        }

        $villagePottentions->delete();

        return response()->noContent();
    }
}
