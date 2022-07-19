<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use Illuminate\Http\Request;
use App\Http\Requests\DusunStoreRequest;
use App\Http\Requests\DusunUpdateRequest;

class DusunController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Dusun::class);

        $search = $request->get('search', '');

        $dusuns = Dusun::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.dusuns.index', compact('dusuns', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Dusun::class);

        return view('app.dusuns.create');
    }

    /**
     * @param \App\Http\Requests\DusunStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DusunStoreRequest $request)
    {
        $this->authorize('create', Dusun::class);

        $validated = $request->validated();

        $dusun = Dusun::create($validated);

        return redirect()
            ->route('dusuns.edit', $dusun)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dusun $dusun
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Dusun $dusun)
    {
        $this->authorize('view', $dusun);

        return view('app.dusuns.show', compact('dusun'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dusun $dusun
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Dusun $dusun)
    {
        $this->authorize('update', $dusun);

        return view('app.dusuns.edit', compact('dusun'));
    }

    /**
     * @param \App\Http\Requests\DusunUpdateRequest $request
     * @param \App\Models\Dusun $dusun
     * @return \Illuminate\Http\Response
     */
    public function update(DusunUpdateRequest $request, Dusun $dusun)
    {
        $this->authorize('update', $dusun);

        $validated = $request->validated();

        $dusun->update($validated);

        return redirect()
            ->route('dusuns.edit', $dusun)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dusun $dusun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Dusun $dusun)
    {
        return $dusun;
        $this->authorize('delete', $dusun);

        $dusun->delete();

        return redirect()
            ->route('dusuns.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
