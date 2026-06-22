<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MBuilding;

class MRoom extends Model
{
    protected $table = 'm_rooms';

    protected $primaryKey = 'room_id';

    protected $fillable = [
        'room_name',
        'floor',
        'building_id'
    ];

    public function building()
    {
        return $this->belongsTo(
            MBuilding::class,
            'building_id',
            'building_id'
        );
    }
}