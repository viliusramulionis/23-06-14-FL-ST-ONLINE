<?php

//ORM - Object Oriented Modeling

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    //Nurodymas kokie stulpeliai gali būti pildomi į lentelę
    protected $fillable = [
        'name',
        'author',
        'link'
    ];

    //Lentelės priskyrimas
    // protected $table = 'lenteles_pavadinimas';
}
