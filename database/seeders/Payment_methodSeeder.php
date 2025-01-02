<?php

namespace Database\Seeders;

use App\Models\Payment_method;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Payment_methodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment_method::create([
            'name' => 'BCA', 
            'account_number' => '014123456', 
            'image' => 'BCA.png'
        ]);

        Payment_method::create([
            'name' => 'BRI', 
            'account_number' => '002123456', 
            'image' => 'BRI.png'
        ]);

        Payment_method::create([
            'name' => 'Mandiri', 
            'account_number' => '008123456', 
            'image' => 'Mandiri.png'
        ]);
    }
}
