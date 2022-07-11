<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GaleriDusun extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['dusun_id', 'nama_foto', 'foto'];

    protected $searchableFields = ['*'];

    protected $table = 'galeri_dusuns';

    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }
}
