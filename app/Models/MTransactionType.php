<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MTransactionType extends Model
{
    protected $table = 'm_transaction_types';
    protected $primaryKey = 'transaction_type_id';

    protected $guarded = [];

    public function inventoryTransactions()
    {
        return $this->hasMany(
            TInventoryTransaction::class,
            'transaction_type_id'
        );
    }
}