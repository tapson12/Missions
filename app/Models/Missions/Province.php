<?php

namespace App\Models\Missions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table='provinces';

    /**
     * Get the user that owns the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    /**
     * Get all of the comments for the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commune()
    {
        return $this->hasMany(Commune::class);
    }
    
}
