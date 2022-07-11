<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelayanan extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['judul_pelayanan', 'link_pelayanan'];

    protected $searchableFields = ['*'];
}
