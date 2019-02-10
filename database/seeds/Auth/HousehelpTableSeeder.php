<?php

use Illuminate\Database\Seeder;
use App\Models\Househelp\Househelp;

class HousehelpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Househelp::create([
            'user_id'  => '7',
            'bureau_id'  => '1',
            'search_fee'  => '500',
            ]);
        Househelp::create([
            'user_id'  => '8',
            'bureau_id'  => '1',
            'search_fee'  => '500',
            ]);
    }
}
