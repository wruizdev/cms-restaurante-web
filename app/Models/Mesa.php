<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $table = 'mesas';

    protected $fillable = [
        'zona', 'estado', 'numero', 'capacidad'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

}
