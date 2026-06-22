<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MBuilding extends Model
{
    protected $table = 'm_buildings';

    protected $primaryKey = 'building_id';

    protected $fillable = [
        'building_name'
    ];
}