<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TInventoryTransaction extends Model
{
    protected $table = 't_inventory_transactions';
    protected $primaryKey = 'inventory_transaction_id';

    protected $guarded = [];

    public function transactionType()
    {
        return $this->belongsTo(
            MTransactionType::class,
            'transaction_type_id'
        );
    }

    public function inventories()
    {
        return $this->hasMany(
            TInventory::class,
            'inventory_transaction_id'
        );
    }
}