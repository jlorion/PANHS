<?php

namespace Database\Seeders;

use App\Models\Students;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        for ($i=0; $i < 30; $i++) { 
            Students::factory()->create([
                'first_name'=> fake()->firstName(),
                'last_name' => fake()->lastName(), 
                'img' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAH8AAABxAQMAAADGee4gAAAAA1BMVEUBAgHjiQX5AAAAF0lEQVQ4y2NgGAWjYBSMglEwCkYB3QEAB4EAAbCT7AYAAAAASUVORK5CYII=',
                'class_id' => fake()->numberBetween(1, 3)
    
            ]);
        }
    }
}
