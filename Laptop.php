<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Laptop extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'marca_id',
        'modelo',
        'memoria_ram',
        'disco',
        'precio_venta',
        'estado'
    ];

    public function marca() {
        return $this->belongsTo(Marca::class);
    }

    protected function precioVenta(): Attribute {
        return Attribute::make(
            get: fn($value) => "S/". number_format($value, 2)
        );
    }
}
