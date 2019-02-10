<?php

use App\Models\Bureau\Bureau;
use Illuminate\Database\Seeder;

class BureauTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bureau::create([
            'name'  => 'Teif Bureau',
            'organisation_id'  => '1',
            'country_id'     => '1',
            'county_id'      => '47',
            'constituency_id'=> '16',
            'ward_id'        => '1',
            ]);
    }
}
