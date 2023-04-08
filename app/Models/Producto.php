<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'nombre_producto',
        'precio',
        'lote',
        'vencimiento',
        'estado',
    ];

    public function facturaLineas()
    {
        return $this->hasMany(FacturaLinea::class);
    }
}
