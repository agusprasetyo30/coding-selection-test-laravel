<?php

namespace App\Models\Sales;

use App\Master\Models\Item;
use App\Models\MainModel;
use Illuminate\Database\Eloquent\Model;

class ItemSales extends MainModel
{
    protected $fillable = [
        'item_id', 'quantity', 'total', 'discount'
    ];

    public function items() {
        return $this->belongsTo(Item::class);
    }
}
