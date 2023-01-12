<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'member_name' => fake()->name(),
            'address' => 'Rio de Janeiro, Brazil',
            'contact' => '22998438864',
            'email' => fake()->email(),
            'age' => fake()->numberBetween(18, 50),
            'gender' => 'male'
        ];
    }
}
