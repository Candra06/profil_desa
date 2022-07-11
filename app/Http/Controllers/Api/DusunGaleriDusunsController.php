<?php

namespace App\Http\Controllers\Api;

use App\Models\Dusun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\GaleriDusunResource;
use App\Http\Resources\GaleriDusunCollection;

class DusunGaleriDusunsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dusun $dusun
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Dusun $dusun)
    {
        $this->authorize('view', $dusun);

        $search = $request->get('search', '');

        $galeriDusuns = $dusun
            ->galeriDusuns()
            ->search($search)
            ->latest()
            ->paginate();

        return new GaleriDusunCollection($galeriDusuns);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dusun $dusun
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Dusun $dusun)
    {
        $this->authorize('create', GaleriDusun::class);

        $validated = $request->validate([
            'nama_foto' => ['required', 'max:255', 'string'],
            'foto' => ['image', 'max:1024', 'required'],
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('public');
        }

        $galeriDusun = $dusun->galeriDusuns()->create($validated);

        return new GaleriDusunResource($galeriDusun);
    }
}
