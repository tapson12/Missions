<?php

namespace App\Models\Missions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeStructure extends Model
{
    use HasFactory;

    protected $table='typestructures';

    /**
     * Get all of the comments for the TypeStructure
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function structure()
    {
        return $this->hasMany(Comment::class);
    }
}
