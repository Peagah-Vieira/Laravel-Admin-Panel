<?php

namespace Database\Seeders;

use App\Models\Membershiptype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Membershiptype::factory(0)->create();
    }
}
