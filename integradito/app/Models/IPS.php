<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IPS extends Model
{
    use HasFactory;

    protected $table = 'ips';

    protected $fillable = [
        'nombre',
    ];

    //relaciona a muchos pacientes con una ips
    public function pacientes()
    {
        return $this->hasMany(Pacientes::class);
    }

    public function ipsAseguradora()
    {
        return $this->belongsTo(IPS_Aseguradoras::class);
    }

    public function aseguradoras()
    {
        return $this->belongsToMany(Aseguradoras::class, 'IPS_Aseguradoras', 'ips_id', 'aseguradora_id');
    }

    //ignoramos la creacion y actualizacion de timestamps
    public $timestamps = false;
}
