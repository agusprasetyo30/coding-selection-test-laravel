<?php

namespace Database\Seeders;

use App\Models\Master\ItemCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "-- Item Category Seeder Starting --";
        echo "\n";
        
        ItemCategory::create(['name' => 'Peralatan Rumah Tangga']);
        ItemCategory::create(['name' => 'Alat Makan']);
        ItemCategory::create(['name' => 'Alat Dapur']);
        ItemCategory::create(['name' => 'Alat Tulis / ATK']);
        ItemCategory::create(['name' => 'Peralatan Mandi']);
        ItemCategory::create(['name' => 'Bahan Bangunan']);
        ItemCategory::create(['name' => 'Kebutuhan Rumah Tangga']);
        
        echo "-- Item Category Seeder Finish --";
        echo "\n";

    }
}
