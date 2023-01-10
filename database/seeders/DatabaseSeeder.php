<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Member;
use App\Models\Membershiptype;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            InstructorSeeder::class,
            MemberSeeder::class,
            PaymentSeeder::class,
            MembershiptypeSeeder::class
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin1234'),
        ]);

        Member::factory()->create([
            'member_name' => 'Pedro Henrique',
            'address' => 'Narnia',
            'contact' => '22998438864',
            'email' => 'teste@teste.com',
            'age' => '18',
            'gender' => 'Male'
        ]);
    }
}
