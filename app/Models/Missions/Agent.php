<?php

namespace App\Models\Missions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $table='agents';

    /**
     * Get the typeagent that owns the Agent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeagent()
    {
        return $this->belongsTo(TypeAgent::class, 'type_agent_id');
    }

    /**
     * The fonction that belong to the Agent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function fonction()
    {
        return $this->belongsToMany(Fonction::class, 'fonction_agents', 'agent_id', 'fonction_id');
    }

    /**
     * The respon that belong to the Agent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function responsabilite()
    {
        return $this->belongsToMany(Responsabilite::class, 'responsabilite_agents', 'agent_id', 'responsabilite_id');
    }

    /**
     * The structure that belong to the Agent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function structure()
    {
        return $this->belongsToMany(Structure::class, 'affectations', 'agent_id', 'structure_id');
    }

    /**
     * The roles that belong to the Agent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function missioninterne()
    {
        return $this->belongsToMany(MissionInterne::class,'mission_interne_id', 'agent_id');
    }
}
