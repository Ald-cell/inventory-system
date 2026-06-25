<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TInventoryRoom extends Model
{
    protected $table = 't_inventory_room';

    protected $primaryKey = 'inventory_room_id';

    protected $guarded = [];

    public function inventory()
    {
        return $this->belongsTo(
            TInventory::class,
            'inventory_id'
        );
    }

    public function room()
    {
        return $this->belongsTo(
            MRoom::class,
            'room_id'
        );
    }
}