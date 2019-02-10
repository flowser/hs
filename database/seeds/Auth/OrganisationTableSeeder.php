<?php

use Illuminate\Database\Seeder;
use App\Models\Organisation\Organisation;

class OrganisationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organisation::create([
            'name'           => 'Teif Foundation',
            'country_id'     => '1',
            'county_id'      => '47',
            'constituency_id'=> '16',
            'ward_id'        => '1',
            'active'        => true,
            ]);
    }
}
