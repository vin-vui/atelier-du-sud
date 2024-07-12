<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Work;
use App\Models\Artist;
use Illuminate\Database\Seeder;




class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Appel du seeder CategorySeeder
        $this->call(CategorySeeder::class);

        // Appel des factories
        // on créé 100 artistes et pour chaque artiste on créé 8 oeuvres
        Artist::factory(100)->has(Work::factory()->count(8))->create();

        // Création d'un utilisateur admin
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@test.fr',
        ]);

        

    }
}