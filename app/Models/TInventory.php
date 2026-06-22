<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TInventory extends Model
{
    protected $table = 't_inventory';

    protected $primaryKey = 'inventory_id';

    protected $fillable = [
        'quantity',
        'price',
        'specification',
        'status',
        'foto',
        'description',
        'merk',
        'barcode',
        'expired_date',
        'item_id',
        'inventory_transaction_id'
    ];

    public function item()
    {
        return $this->belongsTo(
            MItem::class,
            'item_id',
            'item_id'
        );
    }
}