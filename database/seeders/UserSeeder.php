<?php

namespace Database\Seeders;

use app\Models\User;
use Illuminate\Database\Seeder;


//use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Database\Seeders\CategorySeeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(20)->create();

        $this->call([
            'name' => 'user',
            'email' => 'user@test.fr',
            CategorySeeder::class,
            //TagSeeder::class,
            //Postseeder::class,
        ]);
        
    }
}