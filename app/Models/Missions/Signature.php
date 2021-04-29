<?php

namespace App\Models\Missions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    use HasFactory;
    protected $table='signatures';

 
    public function structure()
    {
        return $this->belongsTo(Structure::class, 'structure_id');
    }
    
}
