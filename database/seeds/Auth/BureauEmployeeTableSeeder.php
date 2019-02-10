<?php

use Illuminate\Database\Seeder;
use App\Models\Bureau\BureauEmployee;

class BureauEmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BureauEmployee::create([
            'user_id'  => '4',
            'bureau_id'  => '1',
            'position_id'  => '5',
            'gender_id'  => '2',
            'country_id'     => '1',
            'county_id'      => '47',
            'constituency_id'=> '16',
            'ward_id'        => '1',
            ]);
        BureauEmployee::create([
            'user_id'  => '5',
            'bureau_id'  => '1',
            'position_id'  => '3',//admin
            'gender_id'  => '2',
            'country_id'     => '1',
            'county_id'      => '47',
            'constituency_id'=> '16',
            'ward_id'        => '1',
            ]);
        BureauEmployee::create([
            'user_id'  => '6',
            'bureau_id'  => '1',
            'position_id'  => '4',//accountant
            'gender_id'  => '2',
            'country_id'     => '1',
            'county_id'      => '47',
            'constituency_id'=> '16',
            'ward_id'        => '1',
            ]);
    }
}
