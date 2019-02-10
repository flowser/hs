<?php

use Illuminate\Database\Seeder;
use App\Models\Househelp\HousehelpKin;

class HousehelpKinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HousehelpKin::create([
            'user_id'  => '11',
            'househelp_id'  => '1',
            'relationship_id'  => '1',
            ]);
        HousehelpKin::create([
            'user_id'  => '12',
            'househelp_id'  => '2',
            'relationship_id'  => '2',
            ]);
    }
}
