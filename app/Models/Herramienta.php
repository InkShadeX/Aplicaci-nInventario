<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Prestamo;

class Herramienta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'stock',
        'prestado',
        'defectuoso',
    ];

    protected $casts = [
        'stock' => 'integer',
        'prestado' => 'integer',
        'defectuoso' => 'integer',
    ];

    public function prestamos(): HasMany 
    {
        return $this->hasMany(Prestamo::class, 'herramienta_id');
    }
}
