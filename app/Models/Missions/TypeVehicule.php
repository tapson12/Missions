<?php

namespace App\Models\Missions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeVehicule extends Model
{
    use HasFactory;

    protected $table='type_vehicules';


    /**
     * Get all of the vehicule for the TypeVehicule
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicule()
    {
        return $this->hasMany(Vehicule::class, 'typevehicule_id');
    }
}
