<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Payment;
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
        for($i = 1; $i < 6; $i++){
            Member::factory()->create([
                'member_name' => 'Weak Man'.$i,
                'address' => 'Rio de Janeiro, Brazil',
                'contact' => '2299843886'.$i,
                'email' => 'weakman'.$i.'@gmail.com',
                'age' => fake()->numberBetween(18, 50),
                'gender' => 'male'
            ]);
        }
    }
}
