<?php

namespace App\Models\Missions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table='regions';

    /**
     * Get all of the comments for the Region
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function province(): HasMany
    {
        return $this->hasMany(Region::class);
    }
}
