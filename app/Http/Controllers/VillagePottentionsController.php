<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VillagePottentions;
use Illuminate\Support\Facades\Storage;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_village_pottentions.index',
            compact('allVillagePottentions', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', VillagePottentions::class);

        return view('app.all_village_pottentions.create');
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

        return redirect()
            ->route('all-village-pottentions.edit', $villagePottentions)
            ->withSuccess(__('crud.common.created'));
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

        return view(
            'app.all_village_pottentions.show',
            compact('villagePottentions')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\VillagePottentions $villagePottentions
     * @return \Illuminate\Http\Response
     */
    public function edit(
        Request $request,
        VillagePottentions $villagePottentions
    ) {
        $this->authorize('update', $villagePottentions);

        return view(
            'app.all_village_pottentions.edit',
            compact('villagePottentions')
        );
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

        return redirect()
            ->route('all-village-pottentions.edit', $villagePottentions)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('all-village-pottentions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
