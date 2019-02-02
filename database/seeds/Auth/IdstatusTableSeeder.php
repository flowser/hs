<?php

use Illuminate\Database\Seeder;
use App\Models\Househelp\Standard\Idstatus;

class IdstatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Idstatus::create(['name'  => 'Has ID',]);
        Idstatus::create(['name'  => 'Has Waiting Card',]);
        Idstatus::create(['name'  => 'Dont Have ID',]);
    }
}
