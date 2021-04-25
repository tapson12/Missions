<?php

namespace App\Models\Missions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;

    protected $table='structures';

      /**
     * The agent that belong to the Fonction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function agent()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Get the user that owns the Structure
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typestructure()
    {
        return $this->belongsTo(TypeStructure::class, 'type_structure_id');
    }

    public function structures()
    {
        return $this->hasMany(Structure::class);
    }

    public function childrenStructures()
    {
        return $this->hasMany(Structure::class)->with('structures');
    }


}
