<?php

namespace Database\Seeders;

use App\Models\Instructor;
use Illuminate\Database\Seeder;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 6; $i++){
            Instructor::factory()->create([
                'instructor_name' => 'Mr Muscle'.$i,
                'email' => 'mrmuscle'.$i.'@gmail.com',
                'contact' => '2299843885'.$i,
                'address' => 'Rio de Janeiro, Brazil',
                'active' => true
            ]);
        }
    }
}
