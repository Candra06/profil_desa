<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use App\Models\GaleriDusun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\GaleriDusunStoreRequest;
use App\Http\Requests\GaleriDusunUpdateRequest;

use Illuminate\Support\Str;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.galeri_dusuns.index',
            compact('galeriDusuns', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', GaleriDusun::class);

        $dusuns = Dusun::pluck('nama_dusun', 'id');

        return view('app.galeri_dusuns.create', compact('dusuns'));
    }

    /**
     * @param \App\Http\Requests\GaleriDusunStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GaleriDusunStoreRequest $request)
    {
        $this->authorize('create', GaleriDusun::class);
        // return $request;
        $validated = $request->validated();
        // $fileType = $request->file('foto')->extension();
        //     $name = Str::random(8) . '.' . $fileType;
        //     $input['foto'] = Storage::putFileAs('foto', $request->file('foto'), $name);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('public');
        }
        
        $galeriDusun = GaleriDusun::create($validated);

        return redirect()
            ->route('galeri-dusuns.edit', $galeriDusun)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\GaleriDusun $galeriDusun
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, GaleriDusun $galeriDusun)
    {
        $this->authorize('view', $galeriDusun);

        return view('app.galeri_dusuns.show', compact('galeriDusun'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\GaleriDusun $galeriDusun
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, GaleriDusun $galeriDusun)
    {
        $this->authorize('update', $galeriDusun);

        $dusuns = Dusun::pluck('nama_dusun', 'id');

        return view('app.galeri_dusuns.edit', compact('galeriDusun', 'dusuns'));
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

        return redirect()
            ->route('galeri-dusuns.edit', $galeriDusun)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('galeri-dusuns.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
