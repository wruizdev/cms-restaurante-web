<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['titulo', 'resumen', 'cuerpo', 'foto_post'];
}
