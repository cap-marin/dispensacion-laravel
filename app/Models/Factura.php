<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'formulas';

    protected $fillable = [
        'id_usuario',
        'id_cliente',
        'fecha_venta',
        'id_tipo_facturacion',
        'subtotal',
        'descuento',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function tipoFacturacion()
    {
        return $this->belongsTo(TipoFacturacion::class, 'id_tipo_facturacion');
    }

    public function facturaLineas()
    {
        return $this->hasMany(FactuLinea::class, 'id_formula');
    }
}
