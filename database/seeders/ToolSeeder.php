<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tool;
use Illuminate\Support\Str;

class ToolSeeder extends Seeder
{
    public function run(): void
    {
        $tools = [
            ['code' => 'ELC-001', 'name' => 'Bor Listrik Makita', 'category_id' => 1, 'stock' => 5, 'available_stock' => 5, 'condition' => 'baik', 'daily_fine' => 10000],
            ['code' => 'ELC-002', 'name' => 'Gergaji Mesin', 'category_id' => 1, 'stock' => 3, 'available_stock' => 3, 'condition' => 'baik', 'daily_fine' => 15000],
            ['code' => 'TND-001', 'name' => 'Obeng Set', 'category_id' => 2, 'stock' => 10, 'available_stock' => 10, 'condition' => 'baik', 'daily_fine' => 5000],
            ['code' => 'TND-002', 'name' => 'Kunci Pas Set', 'category_id' => 2, 'stock' => 8, 'available_stock' => 8, 'condition' => 'baik', 'daily_fine' => 5000],
            ['code' => 'UKR-001', 'name' => 'Multimeter Digital', 'category_id' => 3, 'stock' => 4, 'available_stock' => 4, 'condition' => 'baik', 'daily_fine' => 8000],
            ['code' => 'SFT-001', 'name' => 'Helm Safety', 'category_id' => 4, 'stock' => 20, 'available_stock' => 20, 'condition' => 'baik', 'daily_fine' => 3000],
            ['code' => 'SFT-002', 'name' => 'Sarung Tangan Safety', 'category_id' => 4, 'stock' => 30, 'available_stock' => 30, 'condition' => 'baik', 'daily_fine' => 2000],
            ['code' => 'KMP-001', 'name' => 'Laptop Dell', 'category_id' => 5, 'stock' => 5, 'available_stock' => 5, 'condition' => 'baik', 'daily_fine' => 20000],
            ['code' => 'KMP-002', 'name' => 'Proyektor Epson', 'category_id' => 5, 'stock' => 3, 'available_stock' => 3, 'condition' => 'baik', 'daily_fine' => 25000],
        ];

        foreach ($tools as $tool) {
            Tool::create([
                'code' => $tool['code'],
                'name' => $tool['name'],
                'slug' => Str::slug($tool['name']),
                'category_id' => $tool['category_id'],
                'description' => 'Alat ' . $tool['name'] . ' berkualitas tinggi untuk kebutuhan kerja.',
                'stock' => $tool['stock'],
                'available_stock' => $tool['available_stock'],
                'condition' => $tool['condition'],
                'daily_fine' => $tool['daily_fine'],
                'is_active' => true,
            ]);
        }
    }
}