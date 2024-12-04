<?php

namespace App\Models\Master;

use App\Models\MainModel;
use Illuminate\Database\Eloquent\Model;

class Item extends MainModel
{
    protected $fillable = [
        'name', 'stock', 'price', 'item_category_id'
    ];

    public function itemCategory() {
        return $this->belongsTo(ItemCategory::class);
    }

    /**
     * Digunakan untuk mengurangi stock barang
     * 
     * @param int $quantity
     * @return void
     */
    public function reduceStock(int $quantity) {
        $this->validateStock($this->stock, $quantity); // Cek persediaan stock
        $this->stock -= $quantity;
        $this->save();
    }
}
