<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'order_number' => '1',
            'customer_id' => '1',
            'book_id' => '1',
            'total_amount' => '200000',
            'status' => 'completed',
        ]);

        Order::create([
            'order_number' => '2',
            'customer_id' => '2',
            'book_id' => '2',
            'total_amount' => '400000',
            'status' => 'processing',
        ]);

        Order::create([
            'order_number' => '3',
            'customer_id' => '3',
            'book_id' => '3',
            'total_amount' => '300000',
            'status' => 'canceled',
        ]);
    }
}
