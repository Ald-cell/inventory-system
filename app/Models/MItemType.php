<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MItemType extends Model
{
    protected $table = 'm_item_types';

    protected $primaryKey = 'item_type_id';

    protected $fillable = [
        'item_type_name',
        'description'
    ];
}