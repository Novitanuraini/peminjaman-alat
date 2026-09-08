<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Alat Listrik', 'description' => 'Alat-alat yang menggunakan listrik', 'icon' => '⚡'],
            ['name' => 'Alat Tangan', 'description' => 'Alat-alat manual/tangan', 'icon' => '🔧'],
            ['name' => 'Alat Ukur', 'description' => 'Alat-alat untuk pengukuran', 'icon' => '📏'],
            ['name' => 'Alat Safety', 'description' => 'Alat keselamatan kerja', 'icon' => '🦺'],
            ['name' => 'Alat Komputer', 'description' => 'Perangkat komputer dan jaringan', 'icon' => '💻'],
        ];

        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat['name'],
                'slug' => Str::slug($cat['name']),
                'description' => $cat['description'],
                'icon' => $cat['icon'],
            ]);
        }
    }
}