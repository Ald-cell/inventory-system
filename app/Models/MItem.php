<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MItem extends Model
{
    protected $table = 'm_items';

    protected $primaryKey = 'item_id';

    protected $fillable = [
        'item_name',
        'unit',
        'item_type_id'
    ];

    public function itemType()
    {
        return $this->belongsTo(
            MItemType::class,
            'item_type_id',
            'item_type_id'
        );
    }
}