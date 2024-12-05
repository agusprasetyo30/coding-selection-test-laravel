<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainModel extends Model {
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    
    /**
     * Digunakan untuk menghitung total harga
     * 
     * @param mixed $quantity
     * @param mixed $price
     * @return float|int
     */
    public function calculateTotal($quantity, $price) {
        return $quantity * $price;
    }

    /**
     * 
     * 
     * @param mixed $stock
     * @param mixed $quantity
     * @throws \Exception
     * @return bool
     */
    public function validateStock($stock, $quantity) {
        if ($stock < $quantity) {
            return false;
            // throw new \Exception("Stok tidak cukup");
        }

        return true;
    }
}