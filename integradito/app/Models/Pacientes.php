<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    protected $fillable = [
        'nombre',
        'fecha_nacimiento',
        'documento_identidad',
        'direccion',
        'telefono',
        'correo_electronico',
        'ips_id',
    ];

    // Relación con el modelo IPS 
    //(paciente "pertenece a" ips)
    public function ips()
    {
        return $this->belongsTo(IPS::class);
    }

    // public $timestamps = false; // Desactiva el uso de timestamps
}
