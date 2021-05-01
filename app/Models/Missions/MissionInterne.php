<?php

namespace App\Models\Missions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionInterne extends Model
{
    use HasFactory;

    protected $table='mission_internes';

    /**
     * The roles that belong to the MissionInterne
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function agent()
    {
        return $this->belongsToMany(Agent::class, 'agents', 'mission_interne_id', 'agent_id');
    }

    /**
     * The roles that belong to the MissionInterne
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lieumission()
    {
        return $this->belongsToMany(LieuMission::class, 'lieu_mission_internes', 'agent_id', 'lieumission_id');
    }

    /**
     * Get the user that owns the MissionInterne
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class, 'vehicule_id');
    }

    public function paramsoussigne(){
        return $this->belongsTo(Paramsoussigne::class, 'paramsoussigne_id');
    }


}
