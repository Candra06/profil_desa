<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VillagePottentions extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nama_potensi', 'gambar'];

    protected $searchableFields = ['*'];

    protected $table = 'village_pottentions';
}
