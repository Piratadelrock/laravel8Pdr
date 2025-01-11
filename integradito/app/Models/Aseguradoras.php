<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aseguradoras extends Model
{
    use HasFactory;
    protected $table = 'aseguradoras';

    protected $fillable = [
        'nombre',
    ];

    public function ips()
    {
        return $this->belongsToMany(IPS::class, 'IPS_Aseguradoras', 'aseguradora_id', 'ips_id');
    }
    //ignoramos la creacion y actualizacion de timestamps
    public $timestamps = false;
}
