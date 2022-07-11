<?php

namespace App\Http\Controllers\Api;

use App\Models\Dusun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DusunResource;
use App\Http\Resources\DusunCollection;
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
            ->paginate();

        return new DusunCollection($dusuns);
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

        return new DusunResource($dusun);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dusun $dusun
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Dusun $dusun)
    {
        $this->authorize('view', $dusun);

        return new DusunResource($dusun);
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

        return new DusunResource($dusun);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dusun $dusun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Dusun $dusun)
    {
        $this->authorize('delete', $dusun);

        $dusun->delete();

        return response()->noContent();
    }
}
