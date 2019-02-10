<?php


use Illuminate\Database\Seeder;
use App\Models\Standard\Constituency;

class ConstituencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Constituency::create(['name'  => 'Westlands', 'county_id' =>'47']);
        Constituency::create(['name'  => 'Dagoretti North', 'county_id' =>'47']);
        Constituency::create(['name'  => 'Dagoretti South', 'county_id' =>'47']);
        Constituency::create(['name'  => 'Langata', 'county_id' =>'47']);
        Constituency::create(['name'  => 'Kibra', 'county_id' =>'47']);
        Constituency::create(['name'  => 'Roysambu', 'county_id' =>'47']);
        Constituency::create(['name'  => 'Kasarani', 'county_id' =>'47']);
        Constituency::create(['name'  => 'Ruaraka', 'county_id' =>'47']);
        Constituency::create(['name'  => 'Embakasi South', 'county_id' =>'47']);
        Constituency::create(['name'  => 'Embakasi North', 'county_id' =>'47']);
        Constituency::create(['name'  => 'Embakasi Central', 'county_id' =>'47']);
        Constituency::create(['name'  => 'Embakasi East', 'county_id' =>'47']);
        Constituency::create(['name'  => 'Embakasi West', 'county_id' =>'47']);
        Constituency::create(['name'  => 'Makadara', 'county_id' =>'47']);
        Constituency::create(['name'  => 'Kamukunji', 'county_id' =>'47']);
        Constituency::create(['name'  => 'Starehe', 'county_id' =>'47']);
        Constituency::create(['name'  => 'Mathare', 'county_id' =>'47']);
    }
}
