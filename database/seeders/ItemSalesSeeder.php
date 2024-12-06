<?php

namespace Database\Seeders;

use App\Models\Sales\ItemSales;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "-- Item Sales Seeder Start --";
        echo "\n";

        ItemSales::create([
            'item_id' => 2,
            'quantity' => 2,
            'total' => 10000,
            'discount' => 0
        ]);

        ItemSales::create([
            'item_id' => 3,
            'quantity' => 1,
            'total' => 55000,
            'discount' => 0
        ]);

        ItemSales::create([
            'item_id' => 1,
            'quantity' => 1,
            'total' => 10000,
            'discount' => 0
        ]);

        ItemSales::create([
            'item_id' => 2,
            'quantity' => 3,
            'total' => 15000,
            'discount' => 0
        ]);

        ItemSales::create([
            'item_id' => 6,
            'quantity' => 7,
            'total' => 39200,
            'discount' => 0
        ]);

        ItemSales::create([
            'item_id' => 4,
            'quantity' => 3,
            'total' => 16500,
            'discount' => 0
        ]);

        ItemSales::create([
            'item_id' => 5,
            'quantity' => 21,
            'total' => 23625,
            'discount' => 10
        ]);

        ItemSales::create([
            'item_id' => 1,
            'quantity' => 5,
            'total' => 50000,
            'discount' => 0
        ]);

        echo "-- Item Sales Seeder Finish --";
        echo "\n";
    }
}
