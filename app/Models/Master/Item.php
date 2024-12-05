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
     * @return bool
     */
    public function reduceStock(int $quantity) {
        // Cek persediaan stock
        if ($this->validateStock($this->stock, $quantity)) {
            $this->stock -= $quantity;
            $this->save();

            return true;
        }

        return false;
    }
}
