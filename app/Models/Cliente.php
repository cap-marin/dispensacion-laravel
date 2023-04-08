<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'direccion',
        'correo_electronico',
        'telefono',
        'eps'
    ];

    public function facturas()
{
    return $this->hasMany(Factura::class);
}
}

