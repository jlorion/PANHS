<?php

namespace Database\Seeders;

use App\Models\Students;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Students::factory()->count(30)->create([
            'name' => fake()->name(),
            'img' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAH8AAABxAQMAAADGee4gAAAAA1BMVEUBAgHjiQX5AAAAF0lEQVQ4y2NgGAWjYBSMglEwCkYB3QEAB4EAAbCT7AYAAAAASUVORK5CYII=',
            'class_id' => null
        ]);
    }
}
