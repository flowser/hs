<?php

use Illuminate\Database\Seeder;
use App\Models\Househelp\Standard\Healthstatus;

class HealthstatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Healthstatus::create(['name'  => 'No issue']);
        Healthstatus::create(['name'  => 'Slight Concerns']);
        Healthstatus::create(['name'  => 'Major Concerns']);
    }
}
