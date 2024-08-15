<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Students>
 */
class StudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->name(),
            'img'=> "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAH8AAABxAQMAAADGee4gAAAAA1BMVEUBAgHjiQX5AAAAF0lEQVQ4y2NgGAWjYBSMglEwCkYB3QEAB4EAAbCT7AYAAAAASUVORK5CYII=",
            'class_id'=> null
        ];
    }
}
