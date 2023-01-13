<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 501; $i++){
            Payment::factory()->create([
                'member_id' => $i,
                'membershiptype_id' => 1,
                'amount' => '1050',
                'payment_time' => now(),
                'payment_date' => now()
            ]);
        }
    }
}
