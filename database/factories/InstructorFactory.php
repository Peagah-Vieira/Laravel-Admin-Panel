<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instructor>
 */
class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'instructor_name' => fake()->name(),
            'email' => fake()->email(),
            'contact' => '22998438864',
            'address' => 'Rio de Janeiro, Brazil',
            'active' => true
        ];
    }
}
