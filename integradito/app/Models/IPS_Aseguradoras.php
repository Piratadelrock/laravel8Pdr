<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IPS_Aseguradoras extends Model
{
    use HasFactory;

    protected $table = 'ips_aseguradoras';

    protected $fillable = [
        'ips_id',
        'aseguradora_id',
    ];

    public function ips()
    {
        return $this->belongsTo(IPS::class, 'ips_id');
    }

    public function aseguradoras()
    {
        return $this->belongsTo(Aseguradoras::class, 'aseguradora_id');
    }

    //ignoramos la creacion y actualizacion de timestamps
    public $timestamps = false;
}
