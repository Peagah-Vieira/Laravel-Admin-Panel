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
            'contact' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'email' => fake()->unique()->safeEmail(),
            'active' => 0,
        ];
    }
}
