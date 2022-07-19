<?php

namespace App\Http\Controllers;

use App\Models\Artikels;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ArtikelsStoreRequest;
use App\Http\Requests\ArtikelsUpdateRequest;

class ArtikelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Artikels::class);

        $search = $request->get('search', '');

        $artikels = Artikels::search($search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('app.artikels.index', compact('artikels', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Artikels::class);

        $dusuns = Artikels::pluck('judul', 'id');

        return view('app.artikels.create', compact('dusuns'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtikelsStoreRequest $request)
    {
        $this->authorize('create', Artikels::class);

        $validated = $request->validated();
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('public');
        }

        $artikels = Artikels::create($validated);

        return redirect()
            ->route('artikels.edit', $artikels)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikels  $artikels
     * @return \Illuminate\Http\Response
     */
    public function show(Artikels $artikel)
    {
        $this->authorize('view', $artikel);

        return view('app.artikels.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikels  $artikels
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Artikels $artikel)
    {
        $this->authorize('update', $artikel);


        return view('app.artikels.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikels  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(ArtikelsUpdateRequest $request,
    Artikels $artikel)
    {
        $this->authorize('update', $artikel);

        $validated = $request->validated();
        if ($request->hasFile('thumbnail')) {
            if ($artikel->thumbnail) {
                Storage::delete($artikel->thumbnail);
            }

            $validated['thumbnail'] = $request->file('thumbnail')->store('public');
        }

        $artikel->update($validated);

        return redirect()
            ->route('artikels.edit', $artikel)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikels  $artikels
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikels $artikels)
    {
        return $artikels;
        $this->authorize('delete', $artikels);

        if ($artikels->thumbnail) {
            Storage::delete($artikels->foto);
        }

        $artikels->delete();

        return redirect()
            ->route('artikels.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
