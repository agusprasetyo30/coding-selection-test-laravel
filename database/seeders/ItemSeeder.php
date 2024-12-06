<?php

namespace Database\Seeders;

use App\Models\Master\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        echo "-- Item Seeder Starting --";
        echo "\n";
        
        Item::create([
            "name"  => "Sikat Gigi Pepsodent",
            "stock" => 85,
            "price" => 10000,
            "item_category_id" => 1,
            "is_discount" => 0
        ]);

        Item::create([
            "name"  => "Lifebuoy 22g",
            "stock" => 8,
            "price" => 5000,
            "item_category_id" => 6,
            "is_discount" => 1
        ]);
        
        Item::create([
            "name"  => "Beras merk Pipin 5kg",
            "stock" => 7,
            "price" => 55000,
            "item_category_id" => 7,
            "is_discount" => 0
        ]);

        Item::create([
            "name"  => "Permen Kopiko",
            "stock" => 97,
            "price" => 5500,
            "item_category_id" => 7,
            "is_discount" => 0
        ]);
        
        Item::create([
            "name"  => "Royco",
            "stock" => 170,
            "price" => 1200,
            "item_category_id" => 7,
            "is_discount" => 0
        ]);
        
        Item::create([
            "name"  => "Buku Tulis Sidu 30g",
            "stock" => 50,
            "price" => 5600,
            "item_category_id" => 5,
            "is_discount" => 0
        ]);
        
        Item::create([
            "name"  => "Rinso 10g",
            "stock" => 40,
            "price" => 15000,
            "item_category_id" => 1,
            "is_discount" => 1
        ]);

        Item::create([
            "name"  => "Molto 10g",
            "stock" => 90,
            "price" => 5000,
            "item_category_id" => 1,
            "is_discount" => 0
        ]);

        Item::create([
            "name"  => "Pepsodent 90g",
            "stock" => 40,
            "price" => 11000,
            "item_category_id" => 1,
            "is_discount" => 0
        ]);

        echo "-- Item Seeder Finish --";
        echo "\n";
        
    }
}
