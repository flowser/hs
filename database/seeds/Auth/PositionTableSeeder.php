<?php

use Illuminate\Database\Seeder;
use App\Models\Standard\Position;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create(['name'  => 'Director',]);
        Position::create(['name'  => 'Assistant',]);
        Position::create(['name'  => 'Admnin',]);
        Position::create(['name'  => 'Accountant',]);
        Position::create(['name'  => 'ICT Engineer',]);
        Position::create(['name'  => 'Secretary',]);
    }
}
