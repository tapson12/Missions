<?php

namespace App\Models\Missions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class LieuMission extends Model
{
    use HasFactory;

    protected $table='lieu_missions';

    /**
     * The missioninterne that belong to the LieuMissionInterne
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function missioninterne(): BelongsToMany
    {
        return $this->belongsToMany(MissionInterne::class, 'lieu_mission_internes', 'agent_id', 'lieumission_id');
    }
}
