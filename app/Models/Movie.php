<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'original_title',
        'overview',
        'original_language',
        'adult',
        'backdrop_path',
        'poster_path',
        'popularity',
        'release_date',
        'video',
        'vote_average',
        'vote_count'
    ];

}
