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

/*     public function structureChild()
    {
        return $this->hasMany(Structure::class);

        return $this->hasMany(Structure::class, 'structure_id', 'structure_id');
    }

    public function allStructures()
    {
        return $this->structureChild()->with('structures');
    } */

    /**
     * Get the user that owns the Structure
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function structure()
    {
        return $this->belongsTo(Structure::class, 'structure_id');
    }



    public function parent()
    {
        // recursively return all parents
        // the with() function call makes it recursive.
        // if you remove with() it only returns the direct parent
        return $this->belongsTo(Structure::class, 'structure_id')->with('parent');
    }

    public function child()
    {
        // recursively return all children
        return $this->HasMany(Structure::class, 'structure_id')->with('child');
    }

    public function allStructures()
    {
        return $this->child()->with('structures');
    } 

    
    public function signature()
    {
        return $this->hasMany(Comment::class);
    }



}
