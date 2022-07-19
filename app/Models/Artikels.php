<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikels extends Model
{
    use HasFactory;
    use Searchable;
    protected $table = 'artikels';
    protected $fillable = ['judul', 'konten', 'thumbnail'];

    protected $searchableFields = ['*'];
}
