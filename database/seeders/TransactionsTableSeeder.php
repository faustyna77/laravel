<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;
class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        Transaction::create([
            'registration_id' => 1,
            'transaction_date' => now(),
            'amount' => 50.00,
            'payment_method' => 'Credit Card',
            'status' => 'completed',
        ]);

        Transaction::create([
            'registration_id' => 2,
            'transaction_date' => now(),
            'amount' => 60.00,
            'payment_method' => 'PayPal',
            'status' => 'pending',
        ]);
    }
}
