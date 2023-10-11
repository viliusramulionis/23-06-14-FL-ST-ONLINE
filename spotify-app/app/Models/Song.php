<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'artist',
        'album',
        'year',
        'file',
        'photo',
        'user_id',
        'playlist_id'
    ];
}
