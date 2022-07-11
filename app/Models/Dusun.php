<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dusun extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nama_dusun', 'kepala_dusun', 'deskripsi'];

    protected $searchableFields = ['*'];

    public function galeriDusuns()
    {
        return $this->hasMany(GaleriDusun::class);
    }
}
