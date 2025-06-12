<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable =[
        'mesa_id', 'nombre', 'telefono', 'email', 'comensales', 'fecha', 'hora', 'visto'
    ];

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }
}
