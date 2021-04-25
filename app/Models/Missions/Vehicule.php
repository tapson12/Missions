<?php

namespace App\Models\Missions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $table='vehicules';

    /**
     * Get the typevehicule that owns the Vehicule
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typevehicule()
    {
        return $this->belongsTo(TypeVehicule::class);
    }

    /**
     * Get all of the missioninterne for the Vehicule
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function missioninterne()
    {
        return $this->hasMany(MissionInterne::class);
    }
}
