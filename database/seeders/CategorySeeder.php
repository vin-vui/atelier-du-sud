<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Category::create([
            'name' => 'photo',
            'status' => 1,
        ]);
        Category::create([
            'name' => 'porcelaine',
            'status' => 1,
        ]);
        Category::create([
            'name' => 'gravure',
            'status' => 1,
        ]);
        Category::create([
            'name' => 'oeuvre numérique',
            'status' => 1,
        ]);
        Category::create([
            'name' => 'sculpture',
            'status' => 1,
        ]);
        Category::create([
            'name' => 'poème',
            'status' => 1,
        ]);
        Category::create([
            'name' => 'théâtre',
            'status' => 1,
        ]);
        Category::create([
            'name' => 'musique',
            'status' => 1,
        ]);
    }
}
