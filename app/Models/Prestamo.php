<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\User;
use App\Models\Herramienta;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'herramienta_id',
        'evento',
        'prestado',
        'estado',
    ];

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function herramienta(): BelongsTo 
    {
        return $this->belongsTo(Herramienta::class, 'herramienta_id');
    }
}
