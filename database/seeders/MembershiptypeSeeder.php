<?php

namespace Database\Seeders;

use App\Models\Membershiptype;
use Illuminate\Database\Seeder;

class MembershiptypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Membershiptype::factory()->create([
            'type_name' => 'Anually',
            'amount' => '1050'
        ]);

        Membershiptype::factory()->create([
            'type_name' => 'Monthly',
            'amount' => '100'
        ]);

        Membershiptype::factory()->create([
            'type_name' => 'PAYG',
            'amount' => '20'
        ]);
    }
}
