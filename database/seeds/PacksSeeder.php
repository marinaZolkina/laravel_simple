<?php

use Illuminate\Database\Seeder;
use App\Models\Pack;

class PacksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pack::create([
            'quantity'      => '250',
        ]);

        Pack::create([
            'quantity'      => '500',
        ]);

        Pack::create([
            'quantity'      => '1000',
        ]);

        Pack::create([
            'quantity'      => '2000',
        ]);

        Pack::create([
            'quantity'      => '5000',
        ]);
    }
}
