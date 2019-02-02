<?php

use App\Models\Standard\Town;
use Illuminate\Database\Seeder;

class TownTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Town::create(['name'  => 'Nairobi',
                       'county_id' =>'1']);
        Town::create(['name'  => 'Kisii',
                      'county_id' =>'1']);
    }
}
