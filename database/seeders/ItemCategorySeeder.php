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
        ItemCategory::create(['name' => 'Peralatan Rumah Tangga']);
    }
}
