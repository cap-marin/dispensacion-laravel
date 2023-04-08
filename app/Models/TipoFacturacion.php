<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoFacturacion extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'tipo_facturacion';

    protected $fillable = [
        'descripcion',
    ];

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
}
