<?php

namespace App\Models\Missions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAgent extends Model
{
    use HasFactory;

    protected $table='type_agents';

    /**
     * Get all of the agent for the TypeAgent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agent()
    {
        return $this->hasMany(Agent::class);
    }
}
