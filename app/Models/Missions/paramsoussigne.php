<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paramsoussigne extends Model
{
    use HasFactory;

    protected $table='paramsoussigne';

    
     /**
     * Get all of the comments for the paramsoussigne
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
     
     public function missioninterne()
     {
         return $this->hasMany(MissionInterne::class);
     }
     
}
