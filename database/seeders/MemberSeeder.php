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
        for($j = 1; $j <= 12; $j++){
            for($i = 1; $i <= 50; $i++){
                Member::factory()->create([
                    'member_name' => fake()->name(),
                    'address' => 'Rio de Janeiro, Brazil',
                    'contact' => fake()->phoneNumber(),
                    'email' => fake()->email(),
                    'age' => fake()->numberBetween(18, 50),
                    'gender' => 'male',
                    'created_at' => '2023-0'.$j.'-10'
                ]);
            }
        }
    }
}
