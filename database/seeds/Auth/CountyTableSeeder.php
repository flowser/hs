<?php

use App\Models\Standard\County;
use Illuminate\Database\Seeder;

class CountyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        County::create(['name'  => 'Nairobi',
                         'country_id' =>'1']);
        County::create(['name'  => 'Kisii',
                        'country_id' =>'1']);
    }
}
