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
        for ($j = 1; $j <= 12; $j++) {
            if ($j <= 2) {
                for ($i = 1; $i <= 100; $i++) {
                    Payment::factory()->create([
                        'member_id' => $i,
                        'membershiptype_id' => 1,
                        'amount' => '1050',
                        'payment_time' => now(),
                        'payment_date' => '2023-' . $j . '-10',
                        'created_at' => '2023-' . $j . '-10'
                    ]);
                }
            }

            if ($j > 2 && $j <= 5) {
                for ($i = 1; $i <= 70; $i++) {
                    Payment::factory()->create([
                        'member_id' => $i,
                        'membershiptype_id' => 1,
                        'amount' => '1050',
                        'payment_time' => now(),
                        'payment_date' => '2023-' . $j . '-10',
                        'created_at' => '2023-' . $j . '-10'
                    ]);
                }
            }

            if ($j > 5 && $j <= 8) {
                for ($i = 1; $i <= 40; $i++) {
                    Payment::factory()->create([
                        'member_id' => $i,
                        'membershiptype_id' => 1,
                        'amount' => '1050',
                        'payment_time' => now(),
                        'payment_date' => '2023-' . $j . '-10',
                        'created_at' => '2023-' . $j . '-10'
                    ]);
                }
            }

            if ($j > 8 && $j <= 10) {
                for ($i = 1; $i <= 25; $i++) {
                    Payment::factory()->create([
                        'member_id' => $i,
                        'membershiptype_id' => 1,
                        'amount' => '1050',
                        'payment_time' => now(),
                        'payment_date' => '2023-' . $j . '-10',
                        'created_at' => '2023-' . $j . '-10'
                    ]);
                }
            }

            for ($i = 1; $i <= 10; $i++) {
                Payment::factory()->create([
                    'member_id' => $i,
                    'membershiptype_id' => 1,
                    'amount' => '1050',
                    'payment_time' => now(),
                    'payment_date' => '2023-' . $j . '-10',
                    'created_at' => '2023-' . $j . '-10'
                ]);
            }
        }
    }
}
