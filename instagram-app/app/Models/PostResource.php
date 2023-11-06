<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostResource extends Model
{
    use HasFactory;

    protected $table = 'posts_resources';

    protected $fillable = [
        'path',
        'type',
        'post_id'
    ];
}
