<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factulinea extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'factulinea';

    protected $fillable = [
        'id_formula',
        'id_producto',
        'cantidad',
        'precio',
        'total_linea'
    ];

    public function formula()
    {
        return $this->belongsTo(Formulas::class, 'id_formula');
    }

    public function producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto');
    }
}
