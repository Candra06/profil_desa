<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use Illuminate\Http\Request;
use App\Http\Requests\PelayananStoreRequest;
use App\Http\Requests\PelayananUpdateRequest;

class PelayananController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Pelayanan::class);

        $search = $request->get('search', '');

        $pelayanans = Pelayanan::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.pelayanans.index', compact('pelayanans', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Pelayanan::class);

        return view('app.pelayanans.create');
    }

    /**
     * @param \App\Http\Requests\PelayananStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PelayananStoreRequest $request)
    {
        $this->authorize('create', Pelayanan::class);

        $validated = $request->validated();

        $pelayanan = Pelayanan::create($validated);

        return redirect()
            ->route('pelayanans.edit', $pelayanan)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pelayanan $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Pelayanan $pelayanan)
    {
        $this->authorize('view', $pelayanan);

        return view('app.pelayanans.show', compact('pelayanan'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pelayanan $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Pelayanan $pelayanan)
    {
        $this->authorize('update', $pelayanan);

        return view('app.pelayanans.edit', compact('pelayanan'));
    }

    /**
     * @param \App\Http\Requests\PelayananUpdateRequest $request
     * @param \App\Models\Pelayanan $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function update(
        PelayananUpdateRequest $request,
        Pelayanan $pelayanan
    ) {
        $this->authorize('update', $pelayanan);

        $validated = $request->validated();

        $pelayanan->update($validated);

        return redirect()
            ->route('pelayanans.edit', $pelayanan)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pelayanan $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Pelayanan $pelayanan)
    {
        $this->authorize('delete', $pelayanan);

        $pelayanan->delete();

        return redirect()
            ->route('pelayanans.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
