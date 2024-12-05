<?php

namespace App\Models\Sales;

use App\Models\MainModel;
use App\Models\Master\Item;
use Illuminate\Database\Eloquent\Model;

class ItemSales extends MainModel
{
    protected $fillable = [
        'item_id', 'quantity', 'total', 'discount'
    ];

    public function item() {
        return $this->belongsTo(Item::class);
    }
}
