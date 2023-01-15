<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($j = 1; $j <= 12; $j++) {
            if ($j <= 2) {
                for ($i = 1; $i <= 100; $i++) {
                    Member::factory()->create([
                        'member_name' => fake()->name(),
                        'address' => 'Rio de Janeiro, Brazil',
                        'contact' => fake()->phoneNumber(),
                        'email' => fake()->email(),
                        'age' => fake()->numberBetween(18, 50),
                        'gender' => 'male',
                        'created_at' => '2023-' . $j . '-10'
                    ]);
                }
            }

            if ($j > 2 && $j <= 5) {
                for ($i = 1; $i <= 70; $i++) {
                    Member::factory()->create([
                        'member_name' => fake()->name(),
                        'address' => 'Rio de Janeiro, Brazil',
                        'contact' => fake()->phoneNumber(),
                        'email' => fake()->email(),
                        'age' => fake()->numberBetween(18, 50),
                        'gender' => 'male',
                        'created_at' => '2023-' . $j . '-10'
                    ]);
                }
            }

            if ($j > 5 && $j <= 8) {
                for ($i = 1; $i <= 40; $i++) {
                    Member::factory()->create([
                        'member_name' => fake()->name(),
                        'address' => 'Rio de Janeiro, Brazil',
                        'contact' => fake()->phoneNumber(),
                        'email' => fake()->email(),
                        'age' => fake()->numberBetween(18, 50),
                        'gender' => 'male',
                        'created_at' => '2023-' . $j . '-10'
                    ]);
                }
            }

            if ($j > 8 && $j <= 10) {
                for ($i = 1; $i <= 25; $i++) {
                    Member::factory()->create([
                        'member_name' => fake()->name(),
                        'address' => 'Rio de Janeiro, Brazil',
                        'contact' => fake()->phoneNumber(),
                        'email' => fake()->email(),
                        'age' => fake()->numberBetween(18, 50),
                        'gender' => 'male',
                        'created_at' => '2023-' . $j . '-10'
                    ]);
                }
            }

            for ($i = 1; $i <= 10; $i++) {
                Member::factory()->create([
                    'member_name' => fake()->name(),
                    'address' => 'Rio de Janeiro, Brazil',
                    'contact' => fake()->phoneNumber(),
                    'email' => fake()->email(),
                    'age' => fake()->numberBetween(18, 50),
                    'gender' => 'male',
                    'created_at' => '2023-' . $j . '-10'
                ]);
            }
        }
    }
}
