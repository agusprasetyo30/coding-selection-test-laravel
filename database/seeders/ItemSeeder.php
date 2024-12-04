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
        Item::create([
            "name"  => "Sikat Gigi Pepsodent",
            "stock" => 10,
            "price" => 10000,
            "item_category_id" => 1
        ]);
    }
}
