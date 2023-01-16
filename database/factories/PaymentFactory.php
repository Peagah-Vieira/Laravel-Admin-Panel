<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 4,
            'membershiptype_id' => 1,
            'amount' => '1050',
            'payment_time' => now(),
            'payment_date' => now(),
            'created_at' => now(),
        ];
    }
}
