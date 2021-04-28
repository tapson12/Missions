<?php

namespace App\Models\Missions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    use HasFactory;
    protected  $table='affectations';


    public function structure()
    {
        return $this->belongsTo(Structure::class, 'structure_id');
    }

    
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    
    public function fonction()
    {
        return $this->belongsTo(Fonction::class, 'fonction_id');
    }

    
    public function responsabilite()
    {
        return $this->belongsTo(Responsabilite::class, 'responsabilite_id');
    }

}
